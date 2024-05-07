<?php

declare(strict_types=1);

namespace App\Dto\Entries;

class EntriesDto
{
    public $id;
    public $customersId;
    public $projectsId;
    public $usersId;
    public $billable;
    public $textsId;
    public $text;
    public $timeSince;
    public $timeUntil;
    public $timeInsert;
    public $timeLastChange;
    public $testData;
    public $type;
    public $servicesId;
    public $duration;
    public $timeLastChangeWorkTime;
    public $timeClockedSince;
    public $clocked;
    public $clockedOffline;
}
