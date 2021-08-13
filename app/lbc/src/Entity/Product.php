<?php

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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=ProductCategory::class, inversedBy="product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCategory;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryOption::class, inversedBy="products")
     */
    private $option1;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryOption::class, inversedBy="products")
     */
    private $option2;



    public function __construct()
    {
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getProductCategory(): ?ProductCategory
    {
        return $this->productCategory;
    }

    public function setProductCategory(?ProductCategory $productCategory): self
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getOption1(): ?CategoryOption
    {
        return $this->option1;
    }

    public function setOption1(?CategoryOption $option1): self
    {
        $this->option1 = $option1;

        return $this;
    }

    public function getOption2(): ?CategoryOption
    {
        return $this->option2;
    }

    public function setOption2(?CategoryOption $option2): self
    {
        $this->option2 = $option2;

        return $this;
    }


    public function createJson(): array
    {
        // Organize options array
        // $options = $this->organizeOption();

        $option1 = null;
        $option2 = null;

        if($this->getOption1() !== null) $option1 = ["option1_id" => $this->getOption1()->getId(), "option1_name" => $this->getOption1()->getName()];
        if($this->getOption2() !== null) $option2 = ["option2_id" => $this->getOption2()->getId(), "option2_name" => $this->getOption2()->getName()];

        return
            [
                "id" => $this->getId(),
                "title" => $this->getTitle(),
                "category" => ["category_id" => $this->getProductCategory()->getId(), "category_name" => $this->getProductCategory()->getName()],
                "options1" => $option1,
                "options2" => $option2,
                "content" => $this->getContent()
            ];
    }

    static public function createJsonAll(array $product): array
    {

        foreach ($product as $key => $value) {
            $productArray[] = $value->createJson();
        }

        return $productArray;
    }
}
