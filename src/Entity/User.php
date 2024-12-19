<?php

namespace App\Entity;

use TreptowKolleg\ORM\Field;
use TreptowKolleg\ORM\Util\PasswordUtil;

class User
{
    use Field\IdField;
    use Field\UserIdentifierField;
    use Field\UserRoleField;
    use Field\PersonField;
    use Field\EmailField;
    use Field\AddressField;
    use Field\StateField;
    use Field\CreatedAndUpdatedField;
    use Field\DeletedField;

    public function setPassword(string $password): void
    {
        $this->password = PasswordUtil::hashPassword($password);
    }

}