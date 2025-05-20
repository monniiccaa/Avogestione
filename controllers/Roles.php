<?php

enum Roles: string
{
    case USER = "user";
    case ADMIN = "admin";

    public function getName(): string
    {
        return match ($this) {
            Roles::USER => "user",
            Roles::ADMIN => "admin"
        };

    }
}
