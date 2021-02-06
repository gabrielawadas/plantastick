<?php
/**
 * Product Entity.
 */
namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
     * @ORM\Column(type="string", length=255)
     */
    private $imageSource;


    /**
     * @ORM\ManyToMany(targetEntity=Colour::class, inversedBy="products")
     */
    private $colour;

    /**
     * @ORM\ManyToMany(targetEntity=Height::class, inversedBy="products")
     */
    private $height;

    /**
     * @ORM\ManyToMany(targetEntity=Price::class, inversedBy="products")
     */
    private $price;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\OneToMany(targetEntity=ProductDetail::class, mappedBy="name", orphanRemoval=true)
     */
    private $productDetails;

    /**
     * @ORM\OneToMany(targetEntity=OrderItem::class, mappedBy="height", orphanRemoval=true)
     */
    private $orderItems;






    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->price = new ArrayCollection();
        $this->colour = new ArrayCollection();
        $this->height = new ArrayCollection();
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
     * @return string|null
     */
    public function getImageSource(): ?string
    {
        return $this->imageSource;
    }

    /**
     * @param string $imageSource
     * @return $this
     */
    public function setImageSource(string $imageSource): self
    {
        $this->imageSource = $imageSource;

        return $this;
    }


    /**
     * @return Collection|Colour[]
     */
    public function getColour(): Collection
    {
        return $this->colour;
    }

    /**
     * @param Colour $colour
     * @return $this
     */
    public function addColour(Colour $colour): self
    {
        if (!$this->colour->contains($colour)) {
            $this->colour[] = $colour;
        }

        return $this;
    }

    /**
     * @param Colour $colour
     * @return $this
     */
    public function removeColour(Colour $colour): self
    {
        $this->colour->removeElement($colour);

        return $this;
    }

    /**
     * @return Collection|Height[]
     */
    public function getHeight(): Collection
    {
        return $this->height;
    }

    /**
     * @param Height $height
     * @return $this
     */
    public function addHeight(Height $height): self
    {
        if (!$this->height->contains($height)) {
            $this->height[] = $height;
        }

        return $this;
    }

    /**
     * @param Height $height
     * @return $this
     */
    public function removeHeight(Height $height): self
    {
        $this->height->removeElement($height);

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
     * @return Collection|Price[]
     */
    public function getPrice(): Collection
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return $this
     */
    public function addPrice(Price $price): self
    {
        if (!$this->price->contains($price)) {
            $this->price[] = $price;
        }

        return $this;
    }

    /**
     * @param Price $price
     * @return $this
     */
    public function removePrice(Price $price): self
    {
        $this->price->removeElement($price);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAbout(): ?string
    {
        return $this->about;
    }

    /**
     * @param string|null $about
     * @return $this
     */
    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
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
            $productDetail->setName($this);
        }

        return $this;
    }

    public function removeProductDetail(ProductDetail $productDetail): self
    {
        if ($this->productDetails->removeElement($productDetail)) {
            // set the owning side to null (unless already changed)
            if ($productDetail->getName() === $this) {
                $productDetail->setName(null);
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
            $orderItem->setHeight($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getHeight() === $this) {
                $orderItem->setHeight(null);
            }
        }

        return $this;
    }




}
