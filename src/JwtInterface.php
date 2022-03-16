<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

use Lostinvlg\Jwt\Builder\BuilderInterface;
use Lostinvlg\Jwt\Parser\ParserInterface;

interface JwtInterface
{
    /**
     * @param Key $key
     * @return ParserInterface
     */
    public function getParser(Key $key): ParserInterface;

    /**
     * @return BuilderInterface
     */
    public function getBuilder(): BuilderInterface;
}
