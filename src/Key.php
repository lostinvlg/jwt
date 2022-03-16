<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

use DomainException;

use function in_array;

final class Key
{
    public function __construct(private string $secretKey, private string $algorithm = Algorithm::HS256)
    {
        if (!in_array($this->algorithm, Algorithm::SUPPORTED_ALG, true)) {
            throw new DomainException('Algorithm not supported.');
        }
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }
}
