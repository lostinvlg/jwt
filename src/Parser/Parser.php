<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt\Parser;

use Firebase\JWT\JWT;
use Firebase\JWT\Key as FirebaseKey;
use Lostinvlg\Jwt\Key;
use Lostinvlg\Jwt\Token;
use Lostinvlg\Jwt\TokenInterface;
use Throwable;

final class Parser implements ParserInterface
{
    public function __construct(private Key $key)
    {
    }

    /**
     * {@inheritDoc}
     * @throws Throwable
     */
    public function parse(string $jwt, bool $throwException = true): ?TokenInterface
    {
        try {
            $decoded = JWT::decode($jwt, new FirebaseKey($this->key->getSecretKey(), $this->key->getAlgorithm()));
            return new Token($jwt, $decoded);
        } catch (Throwable $e) {
            if ($throwException) {
                throw $e;
            }
            return null;
        }
    }
}
