<?php

namespace App\Dto\Entries;

class DeserializedEntriesDto
{
    public PagingDto $paging;
    public $filter;
    public array|EntriesDto $entries;

    public function getEntries(): array
    {
        return $this->entries;
    }

}