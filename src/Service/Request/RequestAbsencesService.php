<?php

namespace App\Service\Request;

use App\Client\ClockodoApiClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

readonly class RequestAbsencesService
{
    public function __construct(
        private ClockodoApiClient $client
    ) {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function makeRequestAbsences(int $userId): string
    {
        $client = $this->client->createClient();

        $response = $client->request(
            'GET',
            'https://my.clockodo.com/api/absences?users_id=' . $userId . '&year=2024');

        return $response->getContent();
    }
}