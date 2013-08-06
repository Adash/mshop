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

$product = new Product();
$product->setName('Crystal mala with Amethyst');
$product->setMainMaterial('Crystal');
$product->setGuruBeadMaterial('Amethyst');
$product->setString('Blue');
$product->setKnot('Mahakala');
$product->setLength('108');
$product->setDescription('Beautiful crystal mala with aber guru bead');
$product->setImageName('crystal_amber001.jpg');
$product->setInStock(true);

$em = $container->get('doctrine')->getManager();
$em->persist($product);
$em->flush();
echo ("done");





