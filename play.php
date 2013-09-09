<?php

require_once __DIR__.'/app/bootstrap.php.cache';
require_once __DIR__.'/app/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;


$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

// setup is done

use Yoda\MainBundle\Entity\Product;



$em = $container->get('doctrine')->getManager();
$user=$em->getRepository('UserBundle:User')
->findOneBy(array('name' => 'bolek'));
echo ("done\n");
$orders = $user->getOrders();
var_dump ($orders[1]);
//var_dump(count($user->getOrders()));
echo ("\n");




