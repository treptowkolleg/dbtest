<?php

require 'vendor/autoload.php';

use App\Entity\Product;
use App\Entity\StoreLocation;
use TreptowKolleg\ORM\Model\EntityManager;
use TreptowKolleg\ORM\Model\Repository;

$em = new EntityManager();

$em->createTable(StoreLocation::class);

$sl = new StoreLocation();
$sl->setLabel("Bremen");
$em->persist($sl);
$em->flush();

$products = Repository::new(Product::class)->findAll(["label" => "asc"]);

foreach ($products as $product) {
    /**
     * @var Product $product
     */
   echo "{$product} in {$product->getCategory()}\n";
}