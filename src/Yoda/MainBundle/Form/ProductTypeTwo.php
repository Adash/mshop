<?php

namespace Yoda\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductTypeTwo extends AbstractType
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
            //->add('inStock', 'checkbox', array('label' => 'Is in stock?','required' => false))
            ->add('price')
            ->add('file', 'file', array('label' => 'Main Photo','required' => true))
            ->add('fileA', 'file', array('label' => 'Additional Photo','required' => false))
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
        return 'horizontal_form';
    }
}
