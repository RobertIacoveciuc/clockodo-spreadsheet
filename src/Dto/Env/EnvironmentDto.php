<?php

namespace App\Dto\Env;

class EnvironmentDto
{
    private string $email;
    private string $apiKey;

    public function __construct(
        string $email,
        string $apiKey,
    )
    {
        $this->email = $email;
        $this->apiKey = $apiKey;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}