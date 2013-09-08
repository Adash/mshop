<?php

namespace Yoda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Yoda\UserBundle\Entity\User;
use Yoda\UserBundle\Form\RegisterFormType;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\SecurityContext;


Class RegisterController extends Controller
{


    /**
    * @Route("/register", name="register")
    * @Template
    */
    public function registerAction(Request $request)
    {
        //var_dump($request);

        //$session = $request->getSession();

        //$lastUsername = $session->get(SecurityContext::LAST_USERNAME);

        //var_dump($lastUsername);

        //$defaultUser = new User();
        //$defaultUser->setUsername('username');

        $form = $this->createForm(new RegisterFormType());

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()){
                //var_dump($form->getData());
                $user = $form->getData();

            $user->setPassword($this->encodePassword($user, $user->getPlainPassword()));

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()
                ->getFlashbag()
                ->add('congrats','Registration completed!')
            ;

            $this->authenticateUser($user);

            $url = $this->generateUrl('home');

            return $this->redirect($url);
        }
        //if (isset($data)){
        //var_dump($data);
        //}
        }
        return array(
            'form' => $form->createView(), 
            );
    }

    private function encodePassword($user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

    private function authenticateUser(UserInterface $user)
    {
        $providerKey = 'secured_area'; //firewall name
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());

        $this->container->get('security.context')->setToken($token);
    }
}


 