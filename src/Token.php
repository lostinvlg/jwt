<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

final class Token implements TokenInterface
{
    public function __construct(private string $jwt, private object $payload)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getClaim(string $key, mixed $default = null): mixed
    {
        return $this->payload->{$key} ?? $default;
    }

    /**
     * {@inheritDoc}
     */
    public function getPayload(bool $asArray = false): object|array
    {
        return $asArray ? (array) $this->payload : $this->payload;
    }

    public function __toString(): string
    {
        return $this->jwt;
    }
}
