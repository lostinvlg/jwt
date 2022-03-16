<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt\Parser;

use Lostinvlg\Jwt\Algorithm;
use Lostinvlg\Jwt\Jwt;
use Lostinvlg\Jwt\Key;
use Lostinvlg\Jwt\Token;
use PHPUnit\Framework\TestCase;

final class ParserTest extends TestCase
{
    public function testFailedParseJwt(): void
    {
        $parser = new Parser(new Key('test_secret_key'));
        $this->assertNull($parser->parse('not_a_jwt_string', false));
        $this->expectException(\Throwable::class);
        $parser->parse('not_a_jwt_string');
    }

    public function testFailedParseExpiredJwt(): void
    {
        $time = time();
        $key = new Key('test_secret_key', Algorithm::HS256);
        $jwt = new Jwt();
        $token = $jwt
            ->getBuilder()
            ->setKey($key)
            ->setIssuedBy('https://example.com')
            ->setAudience('https://example.com')
            ->setIssuedAt($time)
            ->setExpiresAt($time - 1)
            ->getToken();
        $encoded = (string) $token;

        $parser = $jwt->getParser($key);
        $this->assertNull($parser->parse($encoded, false));
        $this->expectException(\Throwable::class);
        $parser->parse($encoded);
    }

    public function testSuccessParseToken(): void
    {
        $time = time();
        $key = new Key('test_secret_key', Algorithm::HS256);
        $jwt = new Jwt();
        $token = $jwt
            ->getBuilder()
            ->setKey($key)
            ->setIssuedBy('https://example.com')
            ->setAudience('https://example.com')
            ->setIssuedAt($time)
            ->setExpiresAt($time + 3600)
            ->setClaim('test_key', 'test_value')
            ->getToken();
        $encoded = (string) $token;

        $parser = $jwt->getParser($key);
        $token = $parser->parse($encoded, false);
        $this->assertInstanceOf(Token::class, $token);
        $this->assertSame('test_value', $token->getClaim('test_key'));
    }
}
