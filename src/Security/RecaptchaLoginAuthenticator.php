<?php

namespace App\Security;

use App\Security\LoginSuccessHandler;
use App\Service\RecaptchaService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class RecaptchaLoginAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(
        private RecaptchaService $recaptchaService,
        private LoginSuccessHandler $loginSuccessHandler
    ) {}

    public function authenticate(Request $request): Passport
    {
        // Verify reCAPTCHA first
        $recaptchaToken = $request->request->get('g-recaptcha-response');
        if (!$recaptchaToken) {
            throw new CustomUserMessageAuthenticationException('Veuillez vérifier le reCAPTCHA avant de continuer.');
        }

        $recaptchaResult = $this->recaptchaService->verify($recaptchaToken);
        if (!$recaptchaResult['success']) {
            throw new CustomUserMessageAuthenticationException('La vérification reCAPTCHA a échoué. Veuillez réessayer.');
        }

        $email = $request->request->get('email', '');
        $request->getSession()->set('_security.last_username', $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    public function supports(Request $request): bool
    {
        return $request->isMethod('POST') && $request->attributes->get('_route') === self::LOGIN_ROUTE;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new \Symfony\Component\HttpFoundation\RedirectResponse($targetPath);
        }

        return $this->loginSuccessHandler->onAuthenticationSuccess($request, $token);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $request->getBaseUrl() . '/login';
    }
}

