<?php

require 'vendor/autoload.php';

use App\Entity\Product;
use TreptowKolleg\ORM\Model\Repository;

$products = Repository::new(Product::class)->findAll(["label" => "asc"]);

foreach ($products as $product) {
    /**
     * @var Product $product
     */
    echo "{$product} in {$product->getCategory()}\n";
}