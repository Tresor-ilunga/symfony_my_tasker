<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => 'Titre de la tâche'
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Description de la tâche'
                ]
            ])
            ->add('priorities', ChoiceType::class, [
                'choices' => [
                    'Haute' => 'high',
                    'Moyenne' => 'medium',
                    'Basse' => 'low'
                ],
                'attr' => [
                    'placeholder' => 'Priorité de la tâche'
                ]
            ])
            ->add('state', ChoiceType::class, [
                'choices' => [
                    'A faire' => 'todo',
                    'En cours' => 'inprogress',
                    'Terminée' => 'done'
                ],
                'attr' => [
                    'placeholder' => 'Etat de la tâche'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
