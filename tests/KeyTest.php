<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

use PHPUnit\Framework\TestCase;

final class KeyTest extends TestCase
{
    public function testFailedCreateKeyWithUnsupportedAlg(): void
    {
        $this->expectException(\DomainException::class);
        new Key('test_secret_key_string', 'UnsupportedAlgorithm');
    }

    public function testSuccessCreateAlg(): void
    {
        $key = new Key('test_secret_key_string', Algorithm::HS512);
        $this->assertSame('test_secret_key_string', $key->getSecretKey());
        $this->assertSame(Algorithm::HS512, $key->getAlgorithm());
    }
}
