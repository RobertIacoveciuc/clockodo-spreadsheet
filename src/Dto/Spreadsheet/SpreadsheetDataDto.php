<?php

namespace App\Dto\Spreadsheet;

use App\Dto\Env\EnvironmentDto;

class SpreadsheetDataDto
{
    public function __construct(
        private readonly EnvironmentDto $environmentService
    ) {
    }

    public function getFileName(): string
    {
        return strtoupper(date('F')) . '_' .
            date('Y') . '_' .
            strtoupper($this->getFirstName()) . '_' .
            strtoupper($this->getLastName())
        ;
    }

    public function getFirstName(): string
    {
        $parts = explode('@', $this->environmentService->getEmail());
        $namePart = $parts[0];
        $nameParts = explode('.', $namePart);
        return $nameParts[0];
    }

    public function getLastName(): string
    {
        $parts = explode('@', $this->environmentService->getEmail());
        $namePart = $parts[0];
        $nameParts = explode('.', $namePart);
        return end($nameParts);
    }

    public function getEmail(): string
    {
        return $this->environmentService->getEmail();
    }
}