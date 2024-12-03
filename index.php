<?php


use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use TreptowKolleg\ORM\Model\Database;
use TreptowKolleg\ORM\Model\Repository;

require 'vendor/autoload.php';

################
# Ohne Mapping #
################

$db = (new Database())->getConnection();
$statement = $db->prepare("SELECT id, firstname, lastname FROM teacher WHERE firstname = :firstname");
$statement->bindValue(':firstname', 'Klaus');
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
if($result) {
    echo "{$result["firstname"]} {$result["lastname"]} \n";
}

###############
# Mit Mapping #
###############

// Mapping auf Teacher-Klasse
$repository = new Repository(Teacher::class);

// Sucht Datensatz in Tabelle 'teacher', wo
// 'firstname' = 'Klaus' und erzeugt neues Teacher-Objekt:
$teacher = $repository->findOneBy(['firstname' => 'Klaus']);
echo $teacher ?: "Kein Datensatz gefunden";

// benutzerdefiniertes Teacher-Repository
$teacherRepository = new TeacherRepository();
$teacher2 = $teacherRepository->findOneLike(['firstname' => 'en', 'lastname' => 'agn']);


echo PHP_EOL;
echo $teacher2 ?: "Kein Datensatz gefunden";
echo PHP_EOL;