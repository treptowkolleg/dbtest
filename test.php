<?php

use App\Entity\User;
use App\Repository\UserRepository;
use TreptowKolleg\ORM\Exception\OrderByFormatException;
use TreptowKolleg\ORM\Exception\TypeNotSupportedException;
use TreptowKolleg\ORM\Model\EntityManager;

require 'vendor/autoload.php';

$em = new EntityManager();


$em->createTable(User::class);

$userRepository = new UserRepository();
$user = null;
try {
    $user = $userRepository->findOneByLike(['username' => 'agn']);
    if($user) {
        echo $user->getCreated()->format("d.m.Y") . PHP_EOL;
    }
    print_r($user);
} catch (OrderByFormatException|TypeNotSupportedException $e) {
 echo $e->getMessage();
}



