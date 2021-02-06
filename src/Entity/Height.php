<?php
/**
 * Height Entity.
 */
namespace App\Entity;

use App\Repository\HeightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HeightRepository::class)
 */
class Height
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $number;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="height")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity=ProductDetail::class, mappedBy="height", orphanRemoval=true)
     */
    private $productDetails;



    /**
     * Height constructor.
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->productDetails = new ArrayCollection();
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
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

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
            $product->addHeight($this);
        }

        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function removeProduct(Product $product): self
    {
        if ($this -> products -> removeElement ( $product )) {
            $product -> removeHeight ( $this );
        }

        return $this;
    }


    /**
     * Generates the magic method.
     */
    public function __toString()
    {
        // to show the name of the Category in the select
        return $this->number;
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
            $productDetail->setHeight($this);
        }

        return $this;
    }

    public function removeProductDetail(ProductDetail $productDetail): self
    {
        if ($this->productDetails->removeElement($productDetail)) {
            // set the owning side to null (unless already changed)
            if ($productDetail->getHeight() === $this) {
                $productDetail->setHeight(null);
            }
        }

        return $this;
    }




}
