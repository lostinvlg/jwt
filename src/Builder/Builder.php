<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt\Builder;

use BadMethodCallException;
use Firebase\JWT\JWT;
use Lostinvlg\Jwt\Key;
use Lostinvlg\Jwt\Token;
use Lostinvlg\Jwt\TokenInterface;
use RuntimeException;
use stdClass;
use Throwable;

use function in_array;

final class Builder implements BuilderInterface
{
    private stdClass $payload;

    private ?Key $key;

    public function __construct()
    {
        $this->payload = new stdClass();
        $this->key = null;
    }

    /**
     * {@inheritDoc}
     */
    public function setKey(Key $key): BuilderInterface
    {
        $this->key = $key;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setIssuedBy(string $iss): BuilderInterface
    {
        $this->payload->iss = $iss;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setAudience(string $aud): BuilderInterface
    {
        $this->payload->aud = $aud;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setIssuedAt(int $iat): BuilderInterface
    {
        $this->payload->iat = $iat;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setNotBefore(int $nbf): BuilderInterface
    {
        $this->payload->nbf = $nbf;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setExpiresAt(int $exp): BuilderInterface
    {
        $this->payload->exp = $exp;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdentifiedBy(string $jty): BuilderInterface
    {
        $this->payload->jty = $jty;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setClaim(string $key, mixed $value): BuilderInterface
    {
        $this->payload->{$key} = $value;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getToken(): TokenInterface
    {
        if ($this->key === null) {
            throw new BadMethodCallException('Key must be defined.');
        }
        try {
            $jwt = JWT::encode(
                (array) $this->payload,
                $this->key->getSecretKey(),
                $this->key->getAlgorithm(),
                $this->payload->jty ?? null
            );
            return new Token($jwt, $this->payload);
        } catch (Throwable $e) {
            throw new RuntimeException($e->getMessage());
        }
    }
}
