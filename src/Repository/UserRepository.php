<?php

namespace App\Repository;

use App\Entity\User;
use TreptowKolleg\ORM\Exception\TypeNotSupportedException;
use TreptowKolleg\ORM\Model\Repository;

/**
 * @extends Repository<User>
 */
class UserRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(User::class);
    }

    /**
     * Find a user by their email address.
     *
     * @param string $email
     * @return null|User
     * @throws TypeNotSupportedException
     */
    public function findOneByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    /**
     * Find a user by their username.
     *
     * @param string $username
     * @return null|User
     * @throws TypeNotSupportedException
     */
    public function findOneByUsername(string $username): ?User
    {
        return $this->findOneBy(['username' => $username]);
    }

}