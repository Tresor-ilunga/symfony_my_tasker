<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('projectName', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter project name',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                    new Assert\Length(min: 1, max: 50),
                ]
            ])
            ->add('projectLead', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter project lead',
                ],
                'constraints' => [
                    new Assert\NotNull(),
                    new Assert\Length(min: 1, max: 50),
                ]
            ])
            ->add('team', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter team',
                ],
            ])
            ->add('progress', RangeType::class, [
                'label' => 'Progress (%)',
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
