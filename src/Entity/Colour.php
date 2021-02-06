<?php
/**
 * Colour Entity.
 */
namespace App\Entity;

use App\Repository\ColourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColourRepository::class)
 */
class Colour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="colour")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity=ProductDetail::class, mappedBy="colour", orphanRemoval=true)
     */
    private $productDetails;

    /**
     * @ORM\OneToMany(targetEntity=OrderItem::class, mappedBy="colour", orphanRemoval=true)
     */
    private $orderItems;



    /**
     * Colour constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->productDetails = new ArrayCollection();
        $this->orderItems = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addColour($this);
        }

        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeColour($this);
        }

        return $this;
    }


    /**
     * Generates the magic method.
     */
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }

    /**
     * @return Collection|ProductDetail[]
     */
    public function getProductDetails(): Collection
    {
        return $this->productDetails;
    }

    public function addProductDetail(ProductDetail $productDetail): self
    {
        if (!$this->productDetails->contains($productDetail)) {
            $this->productDetails[] = $productDetail;
            $productDetail->setColour($this);
        }

        return $this;
    }

    public function removeProductDetail(ProductDetail $productDetail): self
    {
        if ($this->productDetails->removeElement($productDetail)) {
            // set the owning side to null (unless already changed)
            if ($productDetail->getColour() === $this) {
                $productDetail->setColour(null);
            }
        }

        return $this;
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
            $orderItem->setColour($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getColour() === $this) {
                $orderItem->setColour(null);
            }
        }

        return $this;
    }


}
