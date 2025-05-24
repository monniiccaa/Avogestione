<?php

enum Roles: string
{
    case STUDENTE = "Studente";
    case ORGANIZZATORE = "Organizzatore";

    public function getName(): string
    {
        return match ($this) {
            Roles::STUDENTE => "Studente",
            Roles::ORGANIZZATORE => "Organizzatore"
        };

    }
}
