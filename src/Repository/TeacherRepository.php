<?php

namespace App\Repository;

use App\Entity\Teacher;
use TreptowKolleg\ORM\Model\Repository;

class TeacherRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(Teacher::class);
    }

    public function findOneLike(array $criteria): ?Teacher
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