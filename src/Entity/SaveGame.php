<?php

namespace App\Entity;

use App\Repository\UserRepository;
use TreptowKolleg\ORM\Field\CreatedAndUpdatedField;
use TreptowKolleg\ORM\Field\DeletedField;
use TreptowKolleg\ORM\Field\IdField;
use TreptowKolleg\ORM\Field\SnapshotField;

use TreptowKolleg\ORM\Attribute as DB;

/**
 * Klasse für die Speicherung von Spielständen.
 *
 * Diese Klasse stellt die grundlegenden Felder eines Spielstands zur Verfügung, wie:
 * - `id` (über das Trait `IdField`),
 * - `snapshot` (über das Trait `SnapshotField`),
 * - Zeitstempel für Erstellungs- und Aktualisierungsdaten (über das Trait `CreatedAndUpdatedField`),
 * - und einen Löschzeitstempel (über das Trait `DeletedField`).
 *
 * Zusätzlich speichert sie die Benutzer-ID und lädt den zugehörigen Benutzer über das Repository.
 */
class SaveGame
{
    use IdField;
    use SnapshotField;
    use CreatedAndUpdatedField;
    use DeletedField;

    /**
     * @var int|null $userId
     *
     * Die ID des Benutzers, der mit diesem Spielstand verknüpft ist.
     * Diese ID wird verwendet, um den Benutzer aus der Datenbank zu laden.
     */
    #[DB\Column(type: DB\Type::Integer)]
    #[DB\ManyToOne(User::class)]
    private ?int $userId = null;

    /**
     * @var User|null $user
     *
     * Das Benutzerobjekt, das mit diesem Spielstand verknüpft ist.
     * Dieses wird über die Benutzer-ID geladen, wenn es noch nicht gesetzt wurde.
     */
    private ?User $user = null;

    /**
     * @var UserRepository $userRepository
     *
     * Das UserRepository, das für das Laden des Benutzers basierend auf der `userId` verantwortlich ist.
     * Dieses Repository wird über Dependency Injection bereitgestellt.
     */
    private UserRepository $userRepository;

    /**
     * Konstruktor für die Klasse `SaveGame`.
     *
     * Dieser Konstruktor injiziert das `UserRepository`, das für das Laden des Benutzers
     * verantwortlich ist, der mit diesem Spielstand verknüpft ist.
     *
     * @param UserRepository $userRepository Das Repository, das zum Laden von Benutzern verwendet wird.
     */
    public function __construct(UserRepository $userRepository = new UserRepository())
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Gibt das Benutzerobjekt zurück, das mit diesem Spielstand verknüpft ist.
     * Wenn der Benutzer noch nicht geladen wurde, wird er anhand der `userId` aus der Datenbank geladen.
     *
     * @return User Das Benutzerobjekt.
     */
    public function getUser(): User
    {
        if ($this->user === null && $this->userId !== null) {
            $this->user = $this->userRepository->find($this->userId);
        }
        return $this->user;
    }

    /**
     * Setzt den Benutzer für diesen Spielstand.
     * Dabei wird die Benutzer-ID gesetzt, die den Benutzer eindeutig identifiziert.
     *
     * @param User $user Das Benutzerobjekt, das mit diesem Spielstand verknüpft wird.
     */
    public function setUser(User $user): void
    {
        $this->userId = $user->getId();
        $this->user = $user;
    }

}
