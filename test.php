<?php

use App\Entity\SaveGame;
use App\Entity\User;
use App\Repository\UserRepository;
use TreptowKolleg\ORM\Model\EntityManager;

require 'vendor/autoload.php';

// const DEBUG = true;

$em = new EntityManager();
$em->createTableIfNotExists(User::class);
$em->createTableIfNotExists(SaveGame::class);

//$ben = new User();
//$ben->setUsername('bwagner');
//$ben->setPassword('bigben123');
//$ben->setEmail('bwagner@wagnerpictures.com');
//$ben->setFirstname('Benjamin');
//$ben->setLastname('Wagner');
//$ben->setStreet('Gülzower Straße');
//$ben->setStreetNr(92);
//$ben->setPostalCode(12619);
//$ben->setCity('Berlin');
//$ben->setCountry('Deutschland');

$userRepository = new UserRepository();
$user = $userRepository->findOneByUsername('bwagner');
if($user) {
    $user->restore();
    if($user->isDeleted()) echo "User is deleted\n";
    if(!$user->isActive()) echo "User is deactivated\n";
    print_r($user);
    $em->persist($user);
    $em->flush();
}







