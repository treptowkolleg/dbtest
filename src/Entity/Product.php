<?php

namespace App\Entity;

use TreptowKolleg\ORM\Model\Repository;
use TreptowKolleg\ORM\ORM;
use TreptowKolleg\ORM\ORM\Types;

class Product
{
    #[ORM\Id]
    #[ORM\AutoGenerated]
    #[ORM\Column(type: Types::Integer)]
    private ?int $id = null;

    #[ORM\Column(type: Types::String)]
    private string $label;

    #[ORM\Column(type: Types::Integer, nullable: true)]
    #[ORM\ManyToOne(Category::class, "id")]
    private ?int $categoryId = null;

    private ?Category $category = null;

    public function __construct()
    {
        if($this->categoryId)
            $this->category = Repository::new(Category::class)->find($this->categoryId);
    }

    public function __toString(): string
    {
        return $this->getLabel();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): void
    {
        $this->categoryId = $category->getId();
        $this->category = $category;
    }

}