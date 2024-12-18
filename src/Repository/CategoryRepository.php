<?php

namespace App\Repository;

use App\Entity\Category;
use TreptowKolleg\ORM\Model\Repository;

/**
 * @extends Repository<Category>
 */
class CategoryRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(Category::class);
    }


}