<?php

namespace Yoda\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/{page}", requirements={"page" = "\d+"}, defaults={"page" = 1}) 
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('MainBundle:Product');

        $product1 = $repo->findOneBy(array(
                'id' => 1,
            ));
        $product2 = $repo->findOneBy(array(
                'id' => 2,
            ));        
        $product3 = $repo->findOneBy(array(
                'id' => 3,
            ));


        return $this->render('MainBundle:Default:product.html.twig', array(
            'page' => $page,
            'mala1' => $product1,
            'mala2' => $product2,
            'mala3' => $product3,
            ));
    }
}