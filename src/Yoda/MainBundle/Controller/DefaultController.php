<?php

namespace Yoda\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     *
     * @Template("MainBundle:Default:index.html.twig") 
     */
    public function indexAction()
    {
       $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MainBundle:Product')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * @Route("/collection", name="collection")
     *
     * @Template("MainBundle:Default:collection.html.twig") 
     */
    public function collectionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MainBundle:Product')->findAll();

        return array(
            'entities' => $entities,
        );
    }
}
