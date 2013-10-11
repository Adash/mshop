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
use Yoda\UserBundle\Form\OrderedType;


class PurchaseController extends Controller
{
    /*
     * @Route("/purchase/{slug}", name="purchase")
     *
     * @Template("MainBundle:Default:purchase.html.twig") 
     *
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
    */

    /**
     * @Route("/purchase/{slug}", name="purchase")
     *
     * @Template("MainBundle:Default:purchase.html.twig") 
     */
    public function purchaseAction(Request $request, $slug)
    {

        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.context')->getToken()->getUser();

        $purchasedItem = $this->getPurchasedItem($slug);

        $purchasedItemName = $this->getPurchasedItem($slug)->getName();

        $orderId = $this->createOrder($user, $purchasedItem);

        $entity = $em->getRepository('UserBundle:Orders')->findOneBy(array('id' => $orderId));


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createForm(new OrderedType(), $entity);
        $editForm->bind($request);


        return array(
            'orderId'     => $orderId,
            'purchase'    => True,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );


    }


    /**
     * @Route("/purchased/{orderId}", name="purchased")
     *
     * @Template("MainBundle:Default:purchase.html.twig") 
     */
    public function purchasedAction(Request $request, $orderId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:Orders')->findOneBy(array('id' => $orderId));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createForm(new OrderedType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'confirmed', array(
                            'orderId' => $orderId, 
                            'purchase' => True
                )));
        }

        return array(
            'purchase'    => True,
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        );
    }

    /**
     * @Route("/confirmed/{orderId}", name="confirmed")
     *
     * @Template("MainBundle:Default:purchase.html.twig") 
     */
    public function confirmedAction($orderId)
    {

        $user = $this->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:Orders')->findOneBy(array('id' => $orderId));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }


        return array(
            'order' => $entity,
            'purchased' => True,
            'user' => $user,
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

        return $order->getId();
        //return new Response('Created order Id '.$order->getId());
    }

}