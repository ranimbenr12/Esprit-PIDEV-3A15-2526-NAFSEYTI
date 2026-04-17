<?php

namespace App\Form;

use App\Entity\RendezVou;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       $builder
            ->add('medecin', EntityType::class, [
            'class' => User::class,
            'choice_label' => fn(User $u) => 'Dr. '.$u->getFirstname().' '.$u->getLastname(),
            'label' => 'Médecin',
            'query_builder' => function (UserRepository $er) {
                return $er->createQueryBuilder('u')
                    ->where('u.role LIKE :psychologue OR u.role LIKE :coach')
                    ->setParameter('psychologue', '%psychologue%')
                    ->setParameter('coach', '%coach_vie%');
            },
        ])
            ->add('dateRendezVous', ChoiceType::class, [
                'choices' => [
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi',
                    'Samedi' => 'Samedi',
                ],
                'label' => 'Jour du rendez-vous',
                'placeholder' => 'Choisir un jour',
            ])
            ->add('heureDebut',     null, ['widget' => 'single_text'])
            ->add('heureFin',       null, ['widget' => 'single_text'])
            ->add('typeSeance', ChoiceType::class, [
                'choices' => [
                    'Présentiel' => 'Présentiel',
                    'En ligne'   => 'en_ligne',
                ],
            ])
           ->add('statut', ChoiceType::class, [
                'choices' => [
                    'Confirmé'        => 'Confirmé',
                    'Pas encore pris' => 'Pas encore pris',
                ],
                'data' => 'Pas encore pris',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => RendezVou::class]);
    }
}