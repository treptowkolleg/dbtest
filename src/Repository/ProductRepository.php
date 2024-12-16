<?php

namespace App\Repository;

use App\Entity\Product;
use TreptowKolleg\ORM\Model\Repository;

class ProductRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(Product::class);
    }

    public function findOneLike(array $criteria): ?Product
    {
        $qm = $this->queryBuilder()->selectOrm();
        foreach ($criteria as $key => $value) {
            $key = $qm->generateSnakeTailString($key);

            $qm->andWhere("$key LIKE :$key");
            $qm->setParameter($key, "%$value%");
        }
        return $qm->getQuery()->getOneOrNullResult() ?: null;
    }

}