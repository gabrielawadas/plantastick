<?php
/**
 * OrderItem Entity.
 */
namespace App\Entity;

use App\Repository\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemRepository", repositoryClass=OrderItemRepository::class)
 */
class OrderItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderRef;
    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(1)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orderItem")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productColour;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $height;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $price;


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Order|null
     */
    public function getOrderRef(): ?Order
    {
        return $this->orderRef;
    }

    /**
     * @param Order|null $orderRef
     * @return $this
     */
    public function setOrderRef(?Order $orderRef): self
    {
        $this->orderRef = $orderRef;

        return $this;
    }

    /**
     * Tests if the given item given corresponds to the same order item.
     *
     * @param OrderItem $item
     *
     * @return bool
     */
    public function equals(OrderItem $item): bool
    {
        return $this->getProduct()->getId() === $item->getProduct()->getId();
    }
    /**
     * Calculates the item total.
     *
     * @return float|int
     */
    public function getTotal(): float
    {
        return $this->getProduct()->getPrice() * $this->getQuantity();
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Product|string
     */
    public function getProductColour(): ?Product
    {
        return $this->colour;
    }

    /**
     * @param Product|null $colour
     * @return $this
     */
    public function setProductColour(?Product $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    public function getHeight(): ?Product
    {
        return $this->height;
    }

    public function setHeight(?Product $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getPrice(): ?Product
    {
        return $this->price;
    }

    public function setPrice(?Product $price): self
    {
        $this->price = $price;

        return $this;
    }
    public function __toString() {
        return "some string representation of your object";
}
}