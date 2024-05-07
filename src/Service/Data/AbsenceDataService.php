<?php

namespace App\Service\Data;

use App\Dto\Absences\DeserializedAbsencesDto;
use App\Helper\HolidayTypes;

class AbsenceDataService
{
    public function getData($absenceDeserializeData): array
    {
        $data = [];

        if ($absenceDeserializeData instanceof DeserializedAbsencesDto)
        {
            $absences = $absenceDeserializeData->getAbsences();

            foreach ($absences as $absence)
            {
                $startDate = strtotime($absence['date_since']);
                $endDate = strtotime($absence['date_until']);
                $currentDate = $startDate;

                while ($currentDate <= $endDate)
                {
                    $absenceMonth = date('m', $currentDate);
                    $absenceYear = date('Y', $currentDate);
                    $currentMonth = date('m');
                    $currentYear = date('Y');

                    if ($absenceMonth === $currentMonth && $absenceYear === $currentYear) {
                        $date = date('d.m.y', $currentDate);
                        $typeKey = $absence['type'];
                        $type = HolidayTypes::getHolidayTypes()[$typeKey] ?? null;
                        $data[$date] = $type;
                    }
                    $currentDate = strtotime('+1 day', $currentDate);
                }
            }
        }

        return $data;
    }
}