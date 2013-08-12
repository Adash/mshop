<?php

namespace Yoda\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @var integer
     *
     * @ORM\Column(name="length", type="integer", length=25)
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1024)
     */
    private $description;


    /**
     * @var boolean
     *
     * @ORM\Column(name="inStock", type="boolean")
     */
    private $inStock;


    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", length=25)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;


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
     * @return integer 
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

    /**
     * Set price
     *
     * @param integer $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Product
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'bundles/main/img';
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

public function upload()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
    $this->getFile()->move(
        $this->getUploadRootDir(),
        $this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->path = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->file = null;
}

}