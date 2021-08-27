<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //TODO:
        // -  resolve issue with startDate: has to be posterior to today, but not when edited
        $builder
            ->add('name', TextType::class)
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'required' => false,
                ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                ])
            ->add('ratePerHour', NumberType::class)
            ->add('currency', CurrencyType::class, [
                'preferred_choices' => ['EUR', 'GBP', 'USD'],
            ])
            ->add('hoursEstimated', NumberType::class)
            ->add('totalHours', NumberType::class, [
                'required'=> false,
            ])
            ->add('ratePerHour', NumberType::class)
            ->add('projectOwner', TextType::class, [
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'required'=> false
            ])
            ->add('telephone', TelType::class, [
                'required'=> false
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'pending' => 'pending',
                    'in progess' => 'in progress',
                    'submitted' => 'submitted',
                    'invoiced' => 'invoiced',
                    'completed' => 'completed'
                ]
            ])
            ->add('priceReduction', NumberType::class, [
                'required'=> false
            ])
            ->add('additionalCost', NumberType::class, [
                'required'=> false
            ])
            // ->add('createdAt' , DateType::class, [
            //     'input'  => 'datetime_immutable',
            //     'required'=> false
            //     ])
            // ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
