<?php

namespace Yoda\MainBundle\Entity;

use Sylius\Bundle\CartBundle\Entity\CartItem as BaseCartItem;

class CartItem extends BaseCartItem
{
    private $product;

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
    }
}