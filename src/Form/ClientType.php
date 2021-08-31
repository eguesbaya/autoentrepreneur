<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'organisation' => 'organisation',
                    'individual' => 'individual',
                    'other'=>'other'
                ],
                'multiple' => false,
                'expanded' => true
            ])
            ->add('comment', TextType::class)
            ->add('photo')
            ->add('photoFile', VichFileType::class, [
                        'required'      => false,
                        'allow_delete'  => true, // not mandatory, default is true
                        'download_uri' => true, // not mandatory, default is true
                        'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
