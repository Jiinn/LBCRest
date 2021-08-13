<?php

namespace App\Entity;

use App\Repository\CategoryOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryOptionRepository::class)
 */
class CategoryOption 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parentOption;

    /**
     * @ORM\ManyToOne(targetEntity=ProductCategory::class, inversedBy="categoryOptions")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="option1")
     */
    private $products;


    public function __construct()
    {
        $this->productCategories = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParentOption(): ?int
    {
        return $this->parentOption;
    }

    public function setParentOption(?int $parentOption): self
    {
        $this->parentOption = $parentOption;

        return $this;
    }

    public function getCategory(): ?ProductCategory
    {
        return $this->category;
    }

    public function setCategory(?ProductCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|ProductCategory[]
     */
    public function getProductCategories(): Collection
    {
        return $this->productCategories;
    }

    public function addProductCategory(ProductCategory $productCategory): self
    {
        if (!$this->productCategories->contains($productCategory)) {
            $this->productCategories[] = $productCategory;
            $productCategory->addOption($this);
        }

        return $this;
    }

    public function removeProductCategory(ProductCategory $productCategory): self
    {
        if ($this->productCategories->removeElement($productCategory)) {
            $productCategory->removeOption($this);
        }

        return $this;
    }


    static public function createJsonAll(Array $options): array
    {
        
        foreach ($options as $key => $value) {
            $optionsArray[] = [
                "option_id" => $value->getId(),
                "option_name" => $value->getName(),
                "parent_option_id" => $value->getParentOption()
            ];
        }

        return $optionsArray;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setOption1($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getOption1() === $this) {
                $product->setOption1(null);
            }
        }

        return $this;
    }

    
}
