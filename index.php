<?php

require 'vendor/autoload.php';

use App\Repository\CategoryRepository;

/*
 * Repositories enthalten allgemeine oder spezielle Methoden zum Finden von Datensätzen
 * nach bestimmten Kriterien.
 */
$repository = new CategoryRepository();

/*
 * Hole Datensatz der ID 6 oder NULL
 */
$category = $repository->find(6);

/*
 * Wenn $category nicht NULL, gib alle Produkte aus, die mit dieser Kategorie verknüpft sind.
 */
if($category){
    echo "Kategorie $category enthält:\n";

    foreach ($category->getProducts() as $product) {
        echo "$product\n";
    }
}

/*
 * Ausgabe:
 * * * * * * * * * * * * * * *
 * Kategorie Bildung enthält:
 * Malset
 * Konstruktionsspielzeug
 *
 */

