<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt\Builder;

use DomainException;
use BadMethodCallException;
use Lostinvlg\Jwt\Algorithm;
use Lostinvlg\Jwt\Key;
use PHPUnit\Framework\TestCase;

use function time;

final class BuilderTest extends TestCase
{
    public function testFailedCreateTokenWithoutSecretKey(): void
    {
        $builder = new Builder();
        $this->expectException(BadMethodCallException::class);
        $builder->getToken();
    }

    public function testSuccessCreateTokenWithEmptyPayload(): void
    {
        $expectedJwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W10.ar690186CvQB9T314f-lPsMRsXtqFnrVdIyX3cbofIo';
        $builder = new Builder();
        $token = $builder->setKey(new Key('test_secret_key'))->getToken();
        $this->assertSame($expectedJwt, (string) $token);
        $this->assertIsObject($token);
        $this->assertEmpty($token->getPayload(true));
    }

    public function testSuccessCreateToken(): void
    {
        $time = time();
        $jwtId = 'testJWTId';
        $builder = new Builder();
        $token = $builder
            ->setKey(new Key('test_secret_key'))
            ->setIssuedBy('https://example.com')
            ->setAudience('https://example.com')
            ->setIssuedAt($time)
            ->setNotBefore($time + 1)
            ->setExpiresAt($time + 10800)
            ->setIdentifiedBy($jwtId)
            ->setClaim('test_key1', 1)
            ->setClaim('test_key2', 'test')
            ->setClaim('test_key3', ['foo' => 'bar'])
            ->getToken();

        $this->assertSame(1, $token->getClaim('test_key1'));
        $this->assertSame('test', $token->getClaim('test_key2'));
        $this->assertIsArray($token->getClaim('test_key3'));
    }
}
