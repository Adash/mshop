<?php

namespace Yoda\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @ORM\Column(name="name", type="string", unique=true, length=255)
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
     * @Gedmo\Slug(fields={"name"}, updatable=false )
     * @ORM\Column(length=255, unique=true)
     */
    private $slug;


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

    public function setSlug($slug)
    {
        $this->slug = $slug;
     
    }

    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPaths()
    {
        return array($this->path, $this->pathA);
    }

    public function getAbsolutePaths($pathX)
    {
        return null === $this->$pathX
            ? null
            : $this->getUploadRootDir().'/'.$this->$pathX;
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
    public function getFiles()
    {
        return array($this->file, $this->fileA);
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
    public function preUpload()
    {
        $getFilesZ = $this->getFiles();
        if (null !== $getFilesZ[0]) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$getFilesZ[0]->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        $getFilesZ = $this->getFiles();
        if (null === $getFilesZ[0]) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $getFilesZ[0]->move($this->getUploadRootDir(), $this->path);

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
        if ($file = $this->getAbsolutePaths('path')) {
            unlink($file);
        }

        if ($fileA = $this->getAbsolutePaths('pathA')) {
            unlink($fileA);
        }
    }

//Uploading second file -- temporary solution
//
//--------------------------------


    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUploadA()
    {
        $getFilesZ = $this->getFiles();
        if (null !== $getFilesZ[1]) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->pathA = $filename.'.'.$getFilesZ[1]->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function uploadA()
    {
        $getFilesZ = $this->getFiles();
        if (null === $getFilesZ[1]) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $getFilesZ[1]->move($this->getUploadRootDir(), $this->pathA);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->fileA = null;
    }


//endof Uploading second file -- temporary solution

/* There is no use for these at the moment

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

        public function getWebPathA()
    {
        return null === $this->pathA
            ? null
            : $this->getUploadDir().'/'.$this->pathA;
    }
*/

}

