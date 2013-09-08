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
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $pathA;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $pathB;

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file; 

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $fileA; 

    /**
     * @Assert\File(maxSize="6000000")
     */
    public $fileB; 

    private $temp;


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
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


/**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

//Uploading second file -- temporary solution
//
//--------------------------------

    /**
     * Set path
     *
     * @param string $path
     * @return Product
     */
    public function setPathA($pathA)
    {
        $this->pathA = $pathA;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPathA()
    {
        return $this->pathA;
    }

    public function getAbsolutePathA()
    {
        return null === $this->pathA
            ? null
            : $this->getUploadRootDir().'/'.$this->pathA;
    }

    public function getWebPathA()
    {
        return null === $this->pathA
            ? null
            : $this->getUploadDir().'/'.$this->pathA;
    }


    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileA()
    {
        return $this->fileA;
    }


/**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileA(UploadedFile $fileA = null)
    {
        $this->fileA = $fileA;
        // check if we have an old image path
        if (isset($this->pathA)) {
            // store the old name to delete after the update
            $this->temp = $this->pathA;
            $this->pathA = null;
        } else {
            $this->pathA = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadA()
    {
        if (null !== $this->getFileA()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->pathA = $filename.'.'.$this->getFileA()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function uploadA()
    {
        if (null === $this->getFileA()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFileA()->move($this->getUploadRootDir(), $this->pathA);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->fileA = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUploadA()
    {
        if ($fileA = $this->getAbsolutePath()) {
            unlink($fileA);
        }
    }

//endof Uploading second file -- temporary solution



}

