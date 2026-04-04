<?php

namespace App\Form;

use App\Entity\Test;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du test',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex: Test de personnalité']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 4]
            ])
            ->add('categorie', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => [
                    'Personnalité' => 'personnalite',
                    'Intelligence' => 'intelligence',
                    'Compétences' => 'competences',
                    'Aptitudes' => 'aptitudes',
                    'Comportement' => 'comportement',
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('niveau', ChoiceType::class, [
                'label' => 'Niveau',
                'choices' => [
                    'Débutant' => 'debutant',
                    'Intermédiaire' => 'intermediaire',
                    'Avancé' => 'avance',
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée (minutes)',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('scoreMax', IntegerType::class, [
                'label' => 'Score maximum',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'Actif' => 'actif',
                    'Inactif' => 'inactif',
                ],
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Test::class,
        ]);
    }
}