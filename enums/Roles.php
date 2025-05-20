<?php

enum Roles: string
{
    case STUDENTE = "studente";
    case ORGANIZZATORE = "organizzatore";

    public function getName(): string
    {
        return match ($this) {
            Roles::STUDENTE => "studente",
            Roles::ORGANIZZATORE => "organizzatore"
        };

    }
}
