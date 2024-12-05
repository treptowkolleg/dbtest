<?php


use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use TreptowKolleg\ORM\Model\EntityManager;
use TreptowKolleg\ORM\Model\Repository;

require 'vendor/autoload.php';



// Mapping auf Teacher-Klasse
$repository = new Repository(Teacher::class);

// Sucht Datensatz in Tabelle 'teacher', wo
// 'firstname' = 'Klaus' und erzeugt neues Teacher-Objekt:
$teacher = $repository->findOneBy(['firstname' => 'Klaus']);
echo $teacher ?: "Kein Datensatz gefunden";
echo PHP_EOL;
echo PHP_EOL;

// benutzerdefiniertes Teacher-Repository
$teacherRepository = new TeacherRepository();
$teacher2 = $teacherRepository->findOneLike(['firstname' => 'en', 'lastname' => 'ag']);
if($teacher2) {
    foreach ($teacher2->getEmployeeList() as $entry) {
        echo "Angestellt seit {$entry->getStartDate()->format("d.m.Y")}\n";
    }
    $em = new EntityManager();
    $teacher2->setLastname('Wagner');
    $em->persist($teacher2);
    $em->flush();
}