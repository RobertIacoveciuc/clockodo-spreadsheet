<?php

namespace App\Service\Spreadsheet;

use App\Dto\Spreadsheet\SpreadsheetDataDto;
use App\Helper\File;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class WriteToSpreadsheetService
{
    public function __construct(
        private readonly SpreadsheetDataDto $dto
    ) {
    }

    public function write(
        Spreadsheet $spreadSheet,
        array $clockodoEntriesData,
        array $clockodoAbsenceData // TODO Implement your own logic where and how to display absence time
    )
    {

        $spreadSheet->getActiveSheet()->setCellValue('B3', date('Y'));
        $spreadSheet->getActiveSheet()->setCellValue('C3', date('m'));
        $spreadSheet->getActiveSheet()->setCellValue('B5', ucfirst($this->dto->getFirstName()));
        $spreadSheet->getActiveSheet()->setCellValue('C5', ucfirst($this->dto->getLastName()));
        $spreadSheet->getActiveSheet()->setCellValue('B7', $this->dto->getEmail());

        $row = 13; // Starting row for data

        foreach ($clockodoEntriesData as $date => $text) {
            $spreadSheet->getActiveSheet()->setCellValue('A' . $row, $date);
            $spreadSheet->getActiveSheet()->setCellValue('B' . $row, $text);
            $row++;
        }

        $writer = IOFactory::createWriter($spreadSheet, 'Xlsx');

        $writer->save(File::setNewFileNamePath(
            $this->dto->getFileName()
        ));
    }

}