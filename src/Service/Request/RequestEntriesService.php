<?php

namespace App\Service\Request;

use App\Client\ClockodoApiClient;
use App\Helper\Date;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

readonly class RequestEntriesService
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
    public function makeRequestEntries(): string
    {
        $client = $this->client->createClient();

        // $testEndpoint =
        // TODO NiceToHave: from and until should be custom instead of Date::getCurrentMonthEntriesDateFormat()
            'https://my.clockodo.com/api/v2/entries?time_since=2024-04-01T00:00:00Z&time_until=2024-05-01T00:00:00Z';

        $endpoint = 'https://my.clockodo.com/api/v2/entries?' . Date::getCurrentMonthEntriesDateFormat();


        $response = $client->request(
            'GET',
            $endpoint,
        );

        return $response->getContent();
    }
}