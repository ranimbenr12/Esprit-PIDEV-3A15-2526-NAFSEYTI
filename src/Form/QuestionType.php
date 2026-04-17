<?php

namespace App\Form;

use App\Entity\Question;
use App\Entity\Test;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('test', EntityType::class, [
                'class' => Test::class,
                'choice_label' => 'titre',
                'label' => 'Test associé *',
                'attr' => ['class' => 'form-control'],
                'placeholder' => 'Sélectionnez un test'
            ])
            ->add('texte', TextareaType::class, [
                'label' => 'Texte de la question *',
                'attr' => [
                    'class' => 'form-control', 
                    'rows' => 4,
                    'placeholder' => 'Entrez votre question ici...'
                ]
            ])
            ->add('typeQuestion', ChoiceType::class, [
                'label' => 'Type de question *',
                'choices' => [
                    ' Texte libre (réponse ouverte)' => 'texte_libre',
                    ' Numérique (nombre)' => 'numerique',
                    ' QCM - Choix unique' => 'qcm_unique',
                    ' QCM - Choix multiple' => 'qcm_multiple',
                   
                ],
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'question_type'
                ]
            ])
            ->add('reponsesPossibles', TextareaType::class, [
                'label' => 'Options de réponse (pour QCM)',
                'required' => false,
                'attr' => [
                    'class' => 'form-control', 
                    'rows' => 3,
                    'id' => 'question_reponses',
                    'placeholder' => 'Option 1, Option 2, Option 3, ...'
                ],
                'help' => 'Séparez les options par des virgules. Exemple: "Très satisfait, Satisfait, Neutre, Insatisfait, Très insatisfait"'
            ])
            ->add('points', IntegerType::class, [
                'label' => 'Points',
                'required' => false,
                'attr' => ['class' => 'form-control', 'min' => 1, 'max' => 100],
                'help' => 'Nombre de points pour cette question (1-100)'
            ])
            ->add('ordre', IntegerType::class, [
                'label' => 'Ordre d\'affichage',
                'required' => false,
                'attr' => ['class' => 'form-control', 'min' => 0, 'placeholder' => '1'],
                'help' => 'Position de la question dans le test (ordre croissant)'
            ])
            ->add('obligatoire', CheckboxType::class, [
                'label' => 'Question obligatoire',
                'required' => false,
                'attr' => ['class' => 'custom-control-input']
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
            'data_class' => Question::class,
        ]);
    }
}