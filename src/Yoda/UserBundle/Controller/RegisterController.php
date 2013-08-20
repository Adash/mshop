<?php

namespace Yoda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Yoda\UserBundle\Entity\User;

Class RegisterController extends Controller
{


    /**
    * @Route("/register", name="register")
    * @Template
    */
    public function registerAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('username', 'text')
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('email', 'email')
            ->add('password', 'repeated', array(
                    'type'=>'password'
                ))
            ->getForm()
        ;

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()){
                //var_dump($form->getData());
                $data = $form->getData();
            }

            $user = new User();
            $user->setUsername($data['username']); 
            $user->setEmail($data['email']);
            $user->setName($data['name']);
            $user->setSurname($data['surname']);
            $user->setPassword($this->encodePassword($user, $data['password']));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $url = $this->generateUrl('home');

            return $this->redirect($url);
        }
        //if (isset($data)){
        //var_dump($data);
        //}

        return array('form' => $form->createView());
    }

    private function encodePassword($user, $plainPassword) 
    {
        $encoder = $this->container->get('security.encoder_factory')
        ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}


 