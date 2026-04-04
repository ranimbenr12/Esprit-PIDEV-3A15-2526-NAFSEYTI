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
                'label' => 'Test associé',
                'attr' => ['class' => 'form-control']
            ])
            ->add('texte', TextareaType::class, [
                'label' => 'Texte de la question',
                'attr' => ['class' => 'form-control', 'rows' => 4]
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
                'attr' => ['class' => 'form-control']
            ])
            ->add('reponsesPossibles', TextareaType::class, [
                'label' => 'Réponses possibles',
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3]
            ])
            ->add('points', IntegerType::class, [
                'label' => 'Points',
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('ordre', IntegerType::class, [
                'label' => 'Ordre',
                'required' => false,
                'attr' => ['class' => 'form-control']
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