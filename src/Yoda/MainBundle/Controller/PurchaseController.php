<?php

namespace Yoda\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Yoda\MainBundle\Entity\Product;
use Yoda\UserBundle\Entity\Orders;
use Yoda\UserBundle\Entity\User;
use Yoda\MainBundle\Form\ProductType;


class PurchaseController extends Controller
{
    /**
     * @Route("/purchase/{slug}", name="purchase")
     *
     * @Template("MainBundle:Default:purchase.html.twig") 
     */
    public function purchaseAction($slug)
    {

        $user = $this->get('security.context')->getToken()->getUser();

        $purchasedItem = $this->getPurchasedItem($slug);

        $purchasedItemName = $this->getPurchasedItem($slug)->getName();

        $this->createOrder($user, $purchasedItem);


        return array(
            'user' => $user,
            'purchasedItemName' => $purchasedItemName
            );
    }

    public function getPurchasedItem($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MainBundle:Product')->findOneBy(array('slug' => $slug));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        return $entity;
    }

    public function createOrder($user, $product)
    {
        $order = new Orders();
        $order->setBuyer($user);
        $order->setItem($product);
     //   $order->setDateOrdered('today');
        $order->setAddress('test');

        $em = $this->getDoctrine()->getManager();
        $em->persist($order);
        $em->flush();

        return new Response('Created order Id '.$order->getId());
    }

}