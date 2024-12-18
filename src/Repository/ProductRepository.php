<?php

namespace App\Repository;

use App\Entity\Product;
use TreptowKolleg\ORM\Model\Repository;

/**
 * @extends Repository<Product>
 */
class ProductRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(Product::class);
    }

}