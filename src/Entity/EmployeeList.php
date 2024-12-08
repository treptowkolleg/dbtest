<?php

namespace App\Entity;

use TreptowKolleg\ORM\Model\Repository;
use TreptowKolleg\ORM\ORM;

class EmployeeList
{

    #[ORM\Id]
    #[ORM\AutoGenerated]
    #[ORM\Column(type: ORM\Types::Integer)]
    private int $id;

    #[ORM\Column(type: ORM\Types::Integer)]
    #[ORM\ManyToOne(Teacher::class, "id")]
    private int $teacher;
    private Teacher $teacherObject;

    #[ORM\Column(type: ORM\Types::Date)]
    private string $startDate;

    #[ORM\Column(type: ORM\Types::Date, nullable: true)]
    private ?string $endDate = null;

    public function __construct()
    {
        if(isset($this->teacher)){
            $this->teacherObject = (new Repository(Teacher::class))->find($this->teacher);
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacherObject;
    }

    public function setTeacher(Teacher $teacher): void
    {
        $this->teacher = $teacher->getId();
        $this->teacherObject = $teacher;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat("Y-m-d",$this->startDate);
    }

    public function setStartDate(\DateTimeImmutable $startDate): void
    {
        $this->startDate = $startDate->format("Y-m-d");
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat("Y-m-d",$this->endDate);
    }

    public function setEndDate(\DateTimeImmutable $endDate): void
    {
        $this->endDate = $endDate->format("Y-m-d");
    }

}