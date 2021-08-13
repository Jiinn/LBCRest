<?php

namespace App\Entity;

use App\Repository\ProductCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCategoryRepository::class)
 */
class ProductCategory
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
     * @ORM\OneToMany(targetEntity=CategoryOption::class, mappedBy="category")
     */
    private $categoryOptions;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="productCategory")
     */
    private $product;

    public function __construct()
    {
        $this->categoryOptions = new ArrayCollection();
        $this->product = new ArrayCollection();
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

    /**
     * @return Collection|CategoryOption[]
     */
    public function getCategoryOptions(): Collection
    {
        return $this->categoryOptions;
    }

    public function addCategoryOption(CategoryOption $categoryOption): self
    {
        if (!$this->categoryOptions->contains($categoryOption)) {
            $this->categoryOptions[] = $categoryOption;
            $categoryOption->setCategory($this);
        }

        return $this;
    }

    public function removeCategoryOption(CategoryOption $categoryOption): self
    {
        if ($this->categoryOptions->removeElement($categoryOption)) {
            // set the owning side to null (unless already changed)
            if ($categoryOption->getCategory() === $this) {
                $categoryOption->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setProductCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProductCategory() === $this) {
                $product->setProductCategory(null);
            }
        }

        return $this;
    }



    static public function createJsonAll(Array $category): array
    {
        
        foreach ($category as $key => $value) {
            $categoryArray[] = [
                "category_id" => $value->getId(),
                "category_name" => $value->getName()
            ];
        }

        return $categoryArray;
    }
    
}
