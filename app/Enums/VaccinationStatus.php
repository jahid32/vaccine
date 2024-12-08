<?php

namespace App\Enums;

enum VaccinationStatus: string
{
    case NotScheduled = 'Not Scheduled';
    case Scheduled = 'Scheduled';
    case Vaccinated = 'Vaccinated';
}

