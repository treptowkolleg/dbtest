<?php

namespace App\Entity;

use TreptowKolleg\ORM\Field;

class User
{
    use Field\IdField;
    use Field\PersonField;
    use Field\EmailField;
    use Field\AddressField;
    use Field\CreatedAndUpdatedField;
    use Field\DeletedField;
}