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
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;


//
//
//    /**
//     * @ORM\ManyToMany(targetEntity=Height::class, inversedBy="products")
//     * @ORM\JoinTable(name="product_height")
//     */
//    private $height;



    /**
     * @ORM\OneToMany(targetEntity=OrderItem::class, mappedBy="product", orphanRemoval=true)
     */
    private $orderItem;



//    /**
//     * @ORM\ManyToMany(targetEntity=Price::class, inversedBy="products")
//     */
//    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="ProductColour", inversedBy="product")
     */
    private $productColour;



    /**
     * Product constructor.
     */
    public function __construct()
    {

//        $this->height = new ArrayCollection();
        $this->orderItem = new ArrayCollection();
        $this->orderItems = new ArrayCollection();
//        $this->price = new ArrayCollection();

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
     * @return Collection|OrderItem[]
     */
    public function getOrderItem(): Collection
    {
        return $this->orderItem;
    }

    public function addOrderItem(OrderItem $orderItem): self
    {
        if (!$this->orderItem->contains($orderItem)) {
            $this->orderItem[] = $orderItem;
            $orderItem->setProduct($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItem->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getProduct() === $this) {
                $orderItem->setProduct(null);
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

//    /**
//     * @return Collection|Price[]
//     */
//    public function getPrice(): Collection
//    {
//        return $this->price;
//    }
//
//    public function addPrice(Price $price): self
//    {
//        if (!$this->price->contains($price)) {
//            $this->price[] = $price;
//        }
//
//        return $this;
//    }
//
//    public function removePrice(Price $price): self
//    {
//        $this->price->removeElement($price);
//
//        return $this;
//    }
    /**
     * @return mixed
     */
    public function getProductColour()
    {
        return $this -> productColour;
    }

    /**
     * @param mixed $productColour
     */
    public function setProductColour($productColour): void
    {
        $this -> productColour = $productColour;
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



}
