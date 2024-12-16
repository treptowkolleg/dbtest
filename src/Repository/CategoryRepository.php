<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Product;
use TreptowKolleg\ORM\Model\Repository;

class CategoryRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(Category::class);
    }

    /**
     * @param int|null $id
     * @return Product[]|null
     */
    public function findProducts(?int $id): ?array
    {
        $result = [];
        if(!is_null($id)) {
            $this->changeEntityClass(Product::class);
            $result = $this->findBy(["categoryId" => $id]);
            $this->changeEntityClass(Category::class);
        }
        return $result;
    }


}