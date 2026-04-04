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
use Symfony\Component\Validator\Constraints as Assert;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('test', EntityType::class, [
                'label' => 'Test associé',
                'class' => Test::class,
                'choice_label' => 'titre',
                'constraints' => [
                    new Assert\NotNull(['message' => 'Veuillez sélectionner un test'])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('texte', TextareaType::class, [
                'label' => 'Texte de la question',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le texte de la question est obligatoire']),
                    new Assert\Length([
                        'min' => 5,
                        'max' => 5000,
                        'minMessage' => 'Le texte doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le texte ne doit pas dépasser {{ limit }} caractères'
                    ])
                ],
                'attr' => ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Votre question ici...']
            ])
            ->add('typeQuestion', ChoiceType::class, [
                'label' => 'Type de question',
                'choices' => [
                    'QCM (Choix unique)' => 'qcm_unique',
                    'QCM (Choix multiple)' => 'qcm_multiple',
                    'Texte libre' => 'texte_libre',
                    'Échelle de Likert' => 'likert',
                    'Numérique' => 'numerique'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le type de question est obligatoire'])
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('reponsesPossibles', TextareaType::class, [
                'label' => 'Réponses possibles',
                'required' => false,
                'help' => 'Pour les QCM, séparez les options par des virgules. Ex: "Option 1, Option 2, Option 3"',
                'constraints' => [
                    new Assert\Length([
                        'max' => 5000,
                        'maxMessage' => 'Les réponses possibles ne doivent pas dépasser {{ limit }} caractères'
                    ])
                ],
                'attr' => ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Option 1, Option 2, Option 3']
            ])
            ->add('points', IntegerType::class, [
                'label' => 'Points',
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'Les points doivent être un nombre positif']),
                    new Assert\LessThanOrEqual([
                        'value' => 100,
                        'message' => 'Les points ne doivent pas dépasser {{ compared_value }}'
                    ])
                ],
                'attr' => ['class' => 'form-control', 'min' => 1, 'max' => 100, 'value' => 1]
            ])
            ->add('ordre', IntegerType::class, [
                'label' => 'Ordre d\'affichage',
                'required' => false,
                'constraints' => [
                    new Assert\Positive(['message' => 'L\'ordre doit être un nombre positif'])
                ],
                'attr' => ['class' => 'form-control', 'min' => 1, 'placeholder' => '1']
            ])
            ->add('obligatoire', CheckboxType::class, [
                'label' => 'Question obligatoire',
                'required' => false,
                'attr' => ['class' => 'form-check-input']
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
            'csrf_protection' => true,
        ]);
    }
}