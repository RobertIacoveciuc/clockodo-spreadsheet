<?php

namespace App\Spreadsheet;

use App\Helper\File;
use App\Service\Spreadsheet\WriteToSpreadsheetService;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MainSpreadsheet
{
    public function __construct(
        private readonly WriteToSpreadsheetService $writeToSpreadsheetService
    ) {
    }

    public function generateFile(
        array $clockodoEntriesData,
        array $clockodoAbsenceData
    ): void
    {
        $file = File::getFilePath();
        $spreadsheet = IOFactory::load($file);
        $this->writeToSpreadsheetService->write(
            $spreadsheet,
            $clockodoEntriesData,
            $clockodoAbsenceData
        );
    }
}