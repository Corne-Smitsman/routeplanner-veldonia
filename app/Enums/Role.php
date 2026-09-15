<?php

namespace App\Enums;

enum Role: int
{
    case ADMIN = 0;
    case USER = 1;

    public function label(): string
    {
        return match($this) {
            Role::ADMIN => 'Beheerder',
            Role::USER => 'Gebruiker',
        };
    }
}
