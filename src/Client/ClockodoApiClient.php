<?php

namespace App\Client;

use App\Dto\Env\EnvironmentDto;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

readonly class ClockodoApiClient
{
    public function __construct(
        private EnvironmentDto $environmentService
    ) {
    }

    public function createClient(): HttpClientInterface
    {
        return HttpClient::create([
            'headers' => [
                'Authorization' => 'Basic ' .
                    base64_encode($this->environmentService->getEmail() .
                        ':' .
                        $this->environmentService->getApiKey()
                    ),
                'X-Clockodo-External-Application' => 'YourApplicationName;' . $this->environmentService->getEmail(),
            ],
        ]);
    }
}