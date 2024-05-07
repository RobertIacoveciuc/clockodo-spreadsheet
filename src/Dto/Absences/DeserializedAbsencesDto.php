<?php

namespace App\Dto\Absences;

class DeserializedAbsencesDto
{
    public array|AbsencesDto $absences;

    public function getAbsences(): array
    {
        return $this->absences;
    }
}