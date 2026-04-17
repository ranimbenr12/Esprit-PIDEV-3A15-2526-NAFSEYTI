<?php
namespace App\Form;

use App\Entity\FicheConsultation;
use App\Entity\RendezVou;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class FicheConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rendezVous', EntityType::class, [
                'class'        => RendezVou::class,
                'choice_label' => fn(RendezVou $r) => $r->getDateRendezVous()
                    . ' — Dr. ' . $r->getMedecin()->getFirstname() . ' ' . $r->getMedecin()->getLastname(),
                'label'       => 'Rendez-vous lié',
                'placeholder' => '-- Choisir un rendez-vous --',
                'required'    => false,
            ])
            ->add('probleme_principal', TextareaType::class, [
                'label'       => 'Problème principal',
                'required'    => false,
                'attr'        => ['rows' => 3],
                'constraints' => [new Assert\NotBlank(message: 'Le problème principal est obligatoire.')],
            ])
            ->add('diagnostic', TextareaType::class, [
                'label'    => 'Diagnostic',
                'required' => false,
                'attr'     => ['rows' => 3],
            ])
            ->add('traitement', TextareaType::class, [
                'label'    => 'Traitement',
                'required' => false,
                'attr'     => ['rows' => 3],
            ])
            ->add('recommandations', TextareaType::class, [
                'label'    => 'Recommandations',
                'required' => false,
                'attr'     => ['rows' => 3],
            ])
            ->add('notes', TextareaType::class, [
                'label'    => 'Notes',
                'required' => false,
                'attr'     => ['rows' => 3],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => FicheConsultation::class]);
    }
}