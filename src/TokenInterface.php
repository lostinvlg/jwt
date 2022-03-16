<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

interface TokenInterface
{
    /**
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function getClaim(string $key, mixed $default = null): mixed;

    /**
     * @param bool $asArray
     * @return object|array
     */
    public function getPayload(bool $asArray = false): object|array;
}
