<?php

declare(strict_types=1);

namespace App\Dto\Absences;

class AbsencesDto
{
    public $id;
    public $usersId;
    public $dateSince;
    public $dateUntil;
    public $status;
    public $countDays;
    public $type;
    public $sickNote;
    public $note;
    public $countHours;
    public $dateEnquired;
    public $dateApproved;
    public $approvedBy;
}