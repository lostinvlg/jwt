<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt;

abstract class Algorithm
{
    public const ES384 = 'ES384';

    public const ES256 = 'ES256';

    public const HS256 = 'HS256';

    public const HS384 = 'HS384';

    public const HS512 = 'HS512';

    public const RS256 = 'RS256';

    public const RS384 = 'RS384';

    public const RS512 = 'RS512';

    public const EDDSA = 'EdDSA';

    public const SUPPORTED_ALG = [
        self::ES384,
        self::ES256,
        self::HS256,
        self::HS384,
        self::HS512,
        self::RS256,
        self::RS384,
        self::RS512,
        self::EDDSA,
    ];
}
