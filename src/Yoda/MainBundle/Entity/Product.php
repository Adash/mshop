<?php

namespace Yoda\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Yoda\MainBundle\Entity\ProductRepository")
 */
class Product
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mainMaterial", type="string", length=255)
     */
    private $mainMaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="guruBeadMaterial", type="string", length=255)
     */
    private $guruBeadMaterial;

    /**
     * @var string
     *
     * @ORM\Column(name="string", type="string", length=255)
     */
    private $string;

    /**
     * @var string
     *
     * @ORM\Column(name="knot", type="string", length=255)
     */
    private $knot;

    /**
     * @var string
     *
     * @ORM\Column(name="length", type="string", length=255)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1024)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", length=255)
     */
    private $imageName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inStock", type="boolean")
     */
    private $inStock;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set mainMaterial
     *
     * @param string $mainMaterial
     * @return Product
     */
    public function setMainMaterial($mainMaterial)
    {
        $this->mainMaterial = $mainMaterial;
    
        return $this;
    }

    /**
     * Get mainMaterial
     *
     * @return string 
     */
    public function getMainMaterial()
    {
        return $this->mainMaterial;
    }

    /**
     * Set guruBeadMaterial
     *
     * @param string $guruBeadMaterial
     * @return Product
     */
    public function setGuruBeadMaterial($guruBeadMaterial)
    {
        $this->guruBeadMaterial = $guruBeadMaterial;
    
        return $this;
    }

    /**
     * Get guruBeadMaterial
     *
     * @return string 
     */
    public function getGuruBeadMaterial()
    {
        return $this->guruBeadMaterial;
    }

    /**
     * Set string
     *
     * @param string $string
     * @return Product
     */
    public function setString($string)
    {
        $this->string = $string;
    
        return $this;
    }

    /**
     * Get string
     *
     * @return string 
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * Set knot
     *
     * @param string $knot
     * @return Product
     */
    public function setKnot($knot)
    {
        $this->knot = $knot;
    
        return $this;
    }

    /**
     * Get knot
     *
     * @return string 
     */
    public function getKnot()
    {
        return $this->knot;
    }

    /**
     * Set length
     *
     * @param string $length
     * @return Product
     */
    public function setLength($length)
    {
        $this->length = $length;
    
        return $this;
    }

    /**
     * Get length
     *
     * @return string 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    
        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set inStock
     *
     * @param boolean $inStock
     * @return Product
     */
    public function setInStock($inStock)
    {
        $this->inStock = $inStock;
    
        return $this;
    }

    /**
     * Get inStock
     *
     * @return boolean 
     */
    public function getInStock()
    {
        return $this->inStock;
    }
}
