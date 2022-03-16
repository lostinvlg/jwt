<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

use PHPUnit\Framework\TestCase;

final class TokenTest extends TestCase
{
    public function testCreateToken(): void
    {
        $jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0IiwiYXVkIjoiaHR0cDovL2xvY2FsaG9zdCIsImlhdCI6MTY0NzM1NzYwMCwibmJmIjoxNjQ3MzU3NjAxLCJleHAiOjE2NDczNTc2NjAsImp0aSI6Ik9HbGxNMlpPVVU1RFJWb3pRVTVVWDFScE5FVnljakU1YkdGUkxYaGxZbTB4TmpRMyIsInVpZCI6NDN9.K1igfmg71bviypgOJBUa_EKarCb8-C-M2ShN100x8hw';
        $payload = new \stdClass();
        $payload->key1 = 'test1';
        $payload->key2 = 'test2';
        $token = new Token($jwt, $payload);

        $this->assertSame($payload, $token->getPayload());
        $this->assertIsArray($token->getPayload(true));
        $this->assertSame($jwt, (string) $token);
        $this->assertSame($payload->key1, $token->getClaim('key1'));
        $this->assertSame($payload->key2, $token->getClaim('key2'));
        $this->assertNull($token->getClaim('unknown'));
        $this->assertEquals('test3', $token->getClaim('key3', 'test3'));
    }
}
