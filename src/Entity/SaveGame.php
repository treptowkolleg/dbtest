<?php

namespace App\Entity;

use TreptowKolleg\ORM\ORM;
class SaveGame
{

    #[ORM\Id]
    #[ORM\AutoGenerated]
    #[ORM\Column(type: ORM\Types::Integer)]
    private ?int $id = null;

    #[ORM\Column(type: ORM\Types::Json)]
    private ?string $data = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?object
    {
        return unserialize(json_decode($this->data));
    }

    public function setData(object $data): static
    {
        $this->data = json_encode(serialize($data));
        return $this;
    }

}