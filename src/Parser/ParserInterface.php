<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt\Parser;

use Lostinvlg\Jwt\TokenInterface;

interface ParserInterface
{
    /**
     * @param string $jwt
     * @return TokenInterface|null
     */
    public function parse(string $jwt): ?TokenInterface;
}
