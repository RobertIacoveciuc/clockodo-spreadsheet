<?php

namespace App\Service\Data;

use App\Dto\Entries\DeserializedEntriesDto;

class EntriesDataService
{
    public function getData($entriesDeserializeData): array
    {
        $data = [];

        if ($entriesDeserializeData instanceof DeserializedEntriesDto)
        {
            $entries = $entriesDeserializeData->getEntries();

            foreach ($entries as $entry)
            {
                $date = date('d.m.y', strtotime($entry['time_since']));
                $text = preg_replace('/\s+/', '', $entry['text']);

                $data['userId'] = $entry['users_id'];
                $data[$date] = $text;
            }
        }

        return $data;
    }
}