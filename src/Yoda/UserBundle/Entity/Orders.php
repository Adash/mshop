<?php

namespace Yoda\UserBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Serializable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Orders
 *
 * @ORM\Table(name="Orders")
 * @ORM\Entity(repositoryClass="Yoda\UserBundle\Entity\OrdersRepository")
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Yoda\UserBundle\Entity\User", inversedBy="orders")
     */
    private $buyer;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Yoda\MainBundle\Entity\Product")
     */
    private $item;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="dateOrdered", type="datetime", nullable=true)
     */
    private $dateOrdered;

    /**
     * @var \DateTime
     * @ORM\Column(name="datePayed", type="datetime", nullable=true)
     */
    private $datePayed;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="dateUpdated", type="datetime", nullable=true)
     */
    private $dateUpdated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDispatched", type="datetime", nullable=true)
     */
    private $dateDispatched;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setBuyer(User $buyer)
    {
        $this->buyer = $buyer;
    
        return $this;
    }

    public function getBuyer()
    {
        return $this->buyer;
    }

    public function setItem($item)
    {
        $this->item = $item;
    
        return $this;
    }

    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set dateOrdered
     *
     * @param \DateTime $dateOrdered
     * @return Orders
     */
    public function setDateOrdered($dateOrdered)
    {
        $this->dateOrdered = $dateOrdered;
    
        return $this;
    }

    /**
     * Get dateOrdered
     *
     * @return \DateTime 
     */
    public function getDateOrdered()
    {
        return $this->dateOrdered;
    }

        /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Orders
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    
        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set datePayed
     *
     * @param \DateTime $datePayed
     * @return Orders
     */
    public function setDatePayed($datePayed)
    {
        $this->datePayed = $datePayed;
    
        return $this;
    }

    /**
     * Get datePayed
     *
     * @return \DateTime 
     */
    public function getDatePayed()
    {
        return $this->datePayed;
    }

    /**
     * Set dateDispatched
     *
     * @param \DateTime $dateDispatched
     * @return Orders
     */
    public function setDateDispatched($dateDispatched)
    {
        $this->dateDispatched = $dateDispatched;
    
        return $this;
    }

    /**
     * Get dateDispatched
     *
     * @return \DateTime 
     */
    public function getDateDispatched()
    {
        return $this->dateDispatched;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Orders
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
}