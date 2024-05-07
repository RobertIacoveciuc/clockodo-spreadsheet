<?php

namespace App\Controller;

use App\Dto\Absences\DeserializedAbsencesDto;
use App\Dto\Entries\DeserializedEntriesDto;
use App\Helper\File;
use App\Service\Data\AbsenceDataService;
use App\Service\Data\EntriesDataService;
use App\Service\Request\RequestAbsencesService;
use App\Service\Request\RequestEntriesService;
use App\Spreadsheet\MainSpreadsheet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GenerateSheetController extends AbstractController
{
    public function __construct(
        private readonly RequestEntriesService  $entriesService,
        private readonly RequestAbsencesService $absencesService,

        private readonly EntriesDataService $entriesDataService,
        private readonly AbsenceDataService $absenceDataService,

        private readonly MainSpreadsheet $spreadsheet
    ) {
    }

    #[Route('/generate', name: 'app_generate_sheet')]
    public function index(SerializerInterface $serializer): JsonResponse
    {
        $clockodoEntries = $this->entriesService->makeRequestEntries();
        $entriesDeserializeData =
            $serializer->deserialize($clockodoEntries, DeserializedEntriesDto::class, 'json');
        $clockodoEntriesData = $this->entriesDataService->getData($entriesDeserializeData);

        $clockodoAbsences = $this->absencesService->makeRequestAbsences($clockodoEntriesData['userId']);
        $absencesDeserializeData =
            $serializer->deserialize($clockodoAbsences, DeserializedAbsencesDto::class, 'json');
        $clockodoAbsencesData = $this->absenceDataService->getData($absencesDeserializeData);

        unset($clockodoEntriesData['userId']); // We only need the userId for the Absences Query

        $this->spreadsheet->generateFile(
            $clockodoEntriesData,
            $clockodoAbsencesData
        );


        return $this->json([
            'message' => 'Success. Your file is available here: ' . File::getFilePath(),
            'path' => 'src/Controller/GenerateSheetController.php',
        ]);
    }
}
