<?php

namespace Yoda\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegisterFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text')
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array(
                    'type'=>'password'))
            //->add('Register', 'submit') inquire later...
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\UserBundle\Entity\User'
            ));
    }

    public function getName() 
    {
        return 'register';
    }
}