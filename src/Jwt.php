<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

use Lostinvlg\Jwt\Builder\Builder;
use Lostinvlg\Jwt\Builder\BuilderInterface;
use Lostinvlg\Jwt\Parser\Parser;
use Lostinvlg\Jwt\Parser\ParserInterface;

final class Jwt implements JwtInterface
{
    /**
     * {@inheritDoc}
     */
    public function getBuilder(): BuilderInterface
    {
        return new Builder();
    }

    /**
     * {@inheritDoc}
     */
    public function getParser(Key $key): ParserInterface
    {
        return new Parser($key);
    }
}
