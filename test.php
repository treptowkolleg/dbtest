<?php

use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use TreptowKolleg\ORM\Exception\TypeNotSupportedException;
use TreptowKolleg\ORM\Model\EntityManager;

require 'vendor/autoload.php';

$em = new EntityManager();
$em->createTableIfNotExists(User::class);

$userRepository = new UserRepository();
$user = $userRepository->findOneByLike(['username' => 'agn']);

if($user) {
    echo $user->getCreated()->format("d.m.Y") . PHP_EOL;
    print_r($user);
}


$categoryRepository = new CategoryRepository();

try {
    $cat = $categoryRepository->findOneBy(['label' => 'Kleinkinder']);

    if($cat) {
        echo $cat . PHP_EOL;
        foreach ($cat->getProducts() as $product) {
            echo $product . PHP_EOL;
        }
    }

} catch (TypeNotSupportedException $e) {

}






