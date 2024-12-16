<?php

namespace App\Enums;

enum VaccinationStatus: string
{
    case NotScheduled = 'Not Scheduled';
    case Scheduled = 'Scheduled';
    case Vaccinated = 'Vaccinated';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}

