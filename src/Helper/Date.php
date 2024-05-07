<?php

namespace App\Helper;

class Date
{
    public static function getCurrentMonthEntriesDateFormat(): string
    {
        $firstDayOfMonth = new \DateTime('first day of this month');

        $firstDayOfNextMonth = new \DateTime('first day of next month');

        $timeSince = $firstDayOfMonth->format('Y-m-d\TH:i:s\Z');
        $timeUntil = $firstDayOfNextMonth->format('Y-m-d\TH:i:s\Z');

        return "time_since={$timeSince}&time_until={$timeUntil}";
    }
}