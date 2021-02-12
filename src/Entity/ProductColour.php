<?php
/**
 * ProductColour Entity.
 */
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_colour")
 */
class ProductColour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="productColour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;


    /**
     * @ORM\ManyToOne(targetEntity="Colour", inversedBy="productColour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $colour;
    /**
     * @var string
     */
    private $name;

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this -> name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this -> name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this -> id;
    }


    /**
     * @return string
     */
    public function getProduct()
    {
        return $this -> product;
    }

    /**
     * @param string $product
     */
    public function setProduct($product): void
    {
        $this -> product = $product;
    }

    /**
     * @return mixed
     */
    public function getColour()
    {
        return $this -> colour;
    }

    /**
     * @param mixed $colour
     */
    public function setColour($colour): void
    {
        $this -> colour = $colour;
    }
    /**
     * Generates the magic method.
     */
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->colour;
        // to show the id of the Category in the select
        // return $this->id;
    }

}