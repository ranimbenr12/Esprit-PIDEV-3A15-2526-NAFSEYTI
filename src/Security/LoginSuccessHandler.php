<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function __construct(private RouterInterface $router) {}

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): RedirectResponse
    {
        $user = $token->getUser();
        $role = $user->getRole(); // le champ role dans ta base

        if ($role === 'administrateur') {
            return new RedirectResponse(
                $this->router->generate('admin_dashboard')
            );
        }

        if ($role === 'psychologue' || $role === 'coach_vie') {
            return new RedirectResponse(
                $this->router->generate('app_home')
            );
        }

        if ($role === 'etudiant') {
            return new RedirectResponse(
                $this->router->generate('app_home')
            );
        }

        return new RedirectResponse(
            $this->router->generate('app_home')
        );
    }
}