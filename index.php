<?php

require 'vendor/autoload.php';

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;

/*
 * Zuerst 'composer require treptowkolleg/orm' ausführen, um die Magic zu importieren. ;-)
 */

###########################################################
# Tabellen anlegen

/*
 * Entity-Manager instantiieren zum Anlegen von Tabellen sowie speichern und aktualisieren von Datensätzen.
 */
$em = new \TreptowKolleg\ORM\Model\EntityManager();

/*
 * Dann Tabellen analog zu unseren Entity-Klassen anlegen.
 */
$em->createTable(Category::class);
$em->createTable(Product::class);
// usw.

/*
 * Neues Produkt erzeugen
 */
$myProduct = new Product();
$myProduct->setLabel("Spielekonsole");

/*
 * Produkt persistent machen (festschreiben)
 */
$em->persist($myProduct);

/*
 * Alle bis hierher persistierten Objekte nun tatsächlich in die DB schreiben.
 */
$em->flush();


###########################################################
# Daten abrufen (Siehe auch src/Entity bzw. src/Repository)

/*
 * Repositories enthalten allgemeine oder spezielle Methoden zum Finden von Datensätzen
 * nach bestimmten Kriterien.
 */
$repository = new CategoryRepository();

/*
 * Hole Datensatz mit der ID 6 (falls vorhanden, ansonsten NULL).
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
