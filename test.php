<?php

use App\Entity\User;
use TreptowKolleg\ORM\Model\EntityManager;
use TreptowKolleg\ORM\Model\Repository;

require 'vendor/autoload.php';

$em = new EntityManager();

$em->createTable(User::class);


$user = Repository::new(User::class)->find(1);
$user->setLastname("Wagner");
echo $user->getUpdated("d.m.Y H:s")->format("d.m.Y H:s");
$em->persist($user);
$em->flush();