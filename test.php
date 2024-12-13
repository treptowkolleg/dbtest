<?php

use App\Entity\SaveGame;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use TreptowKolleg\ORM\Exception\TypeNotSupportedException;
use TreptowKolleg\ORM\Model\EntityManager;

require 'vendor/autoload.php';

$em = new EntityManager();
$em->createTableIfNotExists(User::class);
$em->createTableIfNotExists(SaveGame::class);

$userRepository = new UserRepository();

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






