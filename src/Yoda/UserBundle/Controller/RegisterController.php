<?php

namespace Yoda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Yoda\UserBundle\Entity\User;
use Yoda\UserBundle\Form\RegisterFormType;


Class RegisterController extends Controller
{


    /**
    * @Route("/register", name="register")
    * @Template
    */
    public function registerAction(Request $request)
    {
        $defaultUser = new User();
        $defaultUser->setUsername('username');

        $form = $this->createForm(new RegisterFormType(), $defaultUser);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()){
                //var_dump($form->getData());
                $user = $form->getData();

            $user->setPassword($this->encodePassword($user, $user->getPlainPassword()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $url = $this->generateUrl('home');

            return $this->redirect($url);
        }
        //if (isset($data)){
        //var_dump($data);
        //}
        }
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


 