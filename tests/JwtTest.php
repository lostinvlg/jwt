<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

use Lostinvlg\Jwt\Builder\Builder;
use Lostinvlg\Jwt\Parser\Parser;
use PHPUnit\Framework\TestCase;

final class JwtTest extends TestCase
{
    public function testJwtFactory(): void
    {
        $jwt = new Jwt();
        $this->assertInstanceOf(Builder::class, $jwt->getBuilder());
        $this->assertInstanceOf(Parser::class, $jwt->getParser(new Key('key')));
    }
}
