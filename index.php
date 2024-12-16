<?php

require 'vendor/autoload.php';

use App\Repository\CategoryRepository;

$repository = new CategoryRepository();
$category = $repository->find(6);

if($category){
    echo "Kategorie $category enthält:\n";

    foreach ($category->getProducts() as $product) {
        echo "- $product\n";
    }
}


