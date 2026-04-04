<?php

namespace App\Form;

use App\Entity\Test;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du test',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le titre est obligatoire']),
                    new Assert\Length([
                        'min' => 3,
                        'max' => 255,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le titre ne doit pas dépasser {{ limit }} caractères'
                    ])
                ],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: Test de personnalité']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'max' => 1000,
                        'maxMessage' => 'La description ne doit pas dépasser {{ limit }} caractères'
                    ])
                ],
                'attr' => ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Description du test...']
            ])
            ->add('categorie', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => [
                    'Personnalité' => 'personnalite',
                    'Intelligence' => 'intelligence',
                    'Compétences' => 'competences',
                    'Aptitudes' => 'aptitudes',
                    'Comportement' => 'comportement',
                    'Autre' => 'autre'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La catégorie est obligatoire'])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('niveau', ChoiceType::class, [
                'label' => 'Niveau',
                'choices' => [
                    'Débutant' => 'debutant',
                    'Intermédiaire' => 'intermediaire',
                    'Avancé' => 'avance',
                    'Expert' => 'expert'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le niveau est obligatoire'])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée (en minutes)',
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'La durée doit être un nombre positif'])
                ],
                'attr' => ['class' => 'form-control', 'min' => 1, 'placeholder' => '30']
            ])
            ->add('scoreMax', IntegerType::class, [
                'label' => 'Score maximum',
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'Le score maximum doit être un nombre positif'])
                ],
                'attr' => ['class' => 'form-control', 'min' => 1, 'placeholder' => '100']
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'Actif' => 'actif',
                    'Inactif' => 'inactif'
                ],
                'attr' => ['class' => 'form-control']
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
            'csrf_protection' => true,
        ]);
    }
}