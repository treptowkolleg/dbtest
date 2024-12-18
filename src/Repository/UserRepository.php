<?php

namespace App\Repository;

use App\Entity\User;
use DateTime;
use TreptowKolleg\ORM\Exception\OrderByFormatException;
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
     */
    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    /**
     * Find a user by their username.
     *
     * @param string $username
     * @return null|User
     */
    public function findByUsername(string $username): ?User
    {
        return $this->findOneBy(['username' => $username]);
    }

    /**
     * Find users who registered within a specific date range.
     *
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @return User[]
     * @throws OrderByFormatException
     * @throws TypeNotSupportedException
     */
    public function findByRegistrationDateRange(DateTime $startDate, DateTime $endDate): array
    {
        // Format the dates to match the database format (Y-m-d)
        $startDateFormatted = $startDate->format("Y-m-d");
        $endDateFormatted = $endDate->format("Y-m-d");

        return $this->findBy([
            'registration_date' => ['gte' => $startDateFormatted, 'lte' => $endDateFormatted]
        ]);
    }



}