<?php
/**
 * ProductColour Entity.
 */
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="Colour", mappedBy="productColour")
     * @ORM\JoinColumn(nullable=false)
     */
    private $colour;


    /**
     * @ORM\ManyToMany(targetEntity=OrderItem::class, mappedBy="productColour")
     */
    private $orderItems;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
    }

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

    /**
     * @return Collection|OrderItem[]
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItem $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->addProductColour($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItems->removeElement($orderItem)) {
            $orderItem->removeProductColour($this);
        }

        return $this;
    }

}