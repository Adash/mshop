<?php

namespace Yoda\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('mainMaterial')
            ->add('guruBeadMaterial')
            ->add('string')
            ->add('knot')
            ->add('length')
            ->add('description')
            ->add('imageName')
            ->add('inStock')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\MainBundle\Entity\Product'
        ));
    }

    public function getName()
    {
        return 'yoda_mainbundle_producttype';
    }
}
