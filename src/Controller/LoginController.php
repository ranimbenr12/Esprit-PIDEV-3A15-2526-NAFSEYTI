<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\RecaptchaLoginAuthenticator;
use App\Service\RecaptchaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(
        AuthenticationUtils $authenticationUtils,
        #[Autowire(env: 'RECAPTCHA_SITE_KEY')] string $recaptchaSiteKey
    ): Response {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'recaptcha_site_key' => $recaptchaSiteKey,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void {}

    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserAuthenticatorInterface $userAuthenticator,
        RecaptchaLoginAuthenticator $authenticator,
        ValidatorInterface $validator,
        UserRepository $userRepository,
        RecaptchaService $recaptchaService,
        #[Autowire(env: 'RECAPTCHA_SITE_KEY')] string $recaptchaSiteKey
    ): Response {
        $errors = [];

        if ($request->isMethod('POST')) {
            // Verify reCAPTCHA
            $recaptchaToken = $request->request->get('g-recaptcha-response');
            if (!$recaptchaToken) {
                $errors['recaptcha'] = 'Veuillez cocher la case reCAPTCHA.';
            } else {
                $recaptchaResult = $recaptchaService->verify($recaptchaToken);
                if (!$recaptchaResult['success']) {
                    $errors['recaptcha'] = 'Vérification reCAPTCHA échouée. Veuillez réessayer.';
                }
            }

            // Skip form validation if reCAPTCHA failed
            if (empty($errors)) {
                $firstname = trim($request->request->get('firstname'));
                $lastname = trim($request->request->get('lastname'));
                $email = trim($request->request->get('email'));
                $password = $request->request->get('password');
                $phone = trim($request->request->get('phone_number'));
                $address = trim($request->request->get('address'));

                // Define constraints
                $constraints = new Assert\Collection([
                    'firstname' => [
                        new Assert\NotBlank(message: 'Le prénom est obligatoire.'),
                        new Assert\Length(
                            min: 2, max: 20,
                            minMessage: 'Le prénom doit contenir au moins {{ limit }} caractères.',
                            maxMessage: 'Le prénom ne peut pas dépasser {{ limit }} caractères.'
                        ),
                        new Assert\Regex(
                            pattern: '/^[a-zA-ZÀ-ÿ\s]+$/',
                            message: 'Le prénom ne peut contenir que des lettres.'
                        ),
                    ],
                    'lastname' => [
                        new Assert\NotBlank(message: 'Le nom est obligatoire.'),
                        new Assert\Length(
                            min: 2, max: 20,
                            minMessage: 'Le nom doit contenir au moins {{ limit }} caractères.',
                            maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères.'
                        ),
                        new Assert\Regex(
                            pattern: '/^[a-zA-ZÀ-ÿ\s]+$/',
                            message: 'Le nom ne peut contenir que des lettres.'
                        ),
                    ],
                    'email' => [
                        new Assert\NotBlank(message: 'L\'email est obligatoire.'),
                        new Assert\Email(message: 'L\'adresse email n\'est pas valide.'),
                    ],
                    'password' => [
                        new Assert\NotBlank(message: 'Le mot de passe est obligatoire.'),
                        new Assert\Length(
                            min: 6,
                            minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères.'
                        ),
                    ],
                    'phone_number' => new Assert\Optional([
                        new Assert\Regex(
                            pattern: '/^[0-9]+$/',
                            message: 'Le numéro de téléphone ne peut contenir que des chiffres.'
                        ),
                        new Assert\Length(
                            min: 8,
                            minMessage: 'Le numéro de téléphone doit contenir au moins {{ limit }} chiffres.'
                        ),
                    ]),
                    'address' => new Assert\Optional([
                        new Assert\Length(
                            max: 30,
                            maxMessage: 'L\'adresse ne peut pas dépasser {{ limit }} caractères.'
                        ),
                    ]),
                ]);

                // Data to validate
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $password,
                    'phone_number' => $phone,
                    'address' => $address,
                ];

                // Run validation
                $violations = $validator->validate($data, $constraints);

                // Check if email already exists
                $existingUser = $userRepository->findOneBy(['email' => $email]);
                if ($existingUser) {
                    $errors['email'] = 'Cet email est déjà utilisé.';
                }

                // Collect all violations into errors array
                foreach ($violations as $violation) {
                    $field = str_replace(['[', ']'], '', $violation->getPropertyPath());
                    if (!isset($errors[$field])) {
                        $errors[$field] = $violation->getMessage();
                    }
                }

                // Only save if no errors
                if (empty($errors)) {
                    $user = new User();
                    $user->setFirstname($firstname);
                    $user->setLastname($lastname);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setPhone_number($phone ?: null);
                    $user->setAddress($address ?: null);
                    $user->setRole('etudiant');
                    $user->setStatus('actif');
                    $user->setCreated_at(new \DateTime());

                    $em->persist($user);
                    $em->flush();

                    return $userAuthenticator->authenticateUser($user, $authenticator, $request);
                }
            }
        }

        return $this->render('security/register.html.twig', [
            'errors' => $errors ?? [],
            'old' => $request->request->all(),
            'recaptcha_site_key' => $recaptchaSiteKey,
        ]);
    }
}