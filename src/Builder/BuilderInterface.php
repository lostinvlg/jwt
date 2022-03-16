<?php

declare(strict_types=1);

namespace Lostinvlg\Jwt\Builder;

use Lostinvlg\Jwt\Key;
use Lostinvlg\Jwt\TokenInterface;

interface BuilderInterface
{
    /**
     * @param Key $key
     * @return $this
     */
    public function setKey(Key $key): self;

    /**
     * @param string $iss
     * @return BuilderInterface
     */
    public function setIssuedBy(string $iss): self;

    /**
     * @param string $aud
     * @return BuilderInterface
     */
    public function setAudience(string $aud): self;

    /**
     * @param int $iat
     * @return BuilderInterface
     */
    public function setIssuedAt(int $iat): self;

    /**
     * @param int $nbf
     * @return BuilderInterface
     */
    public function setNotBefore(int $nbf): self;

    /**
     * @param int $exp
     * @return BuilderInterface
     */
    public function setExpiresAt(int $exp): self;

    /**
     * @param string $jty
     * @return BuilderInterface
     */
    public function setIdentifiedBy(string $jty): self;

    /**
     * @param string $key
     * @param mixed $value
     * @return BuilderInterface
     */
    public function setClaim(string $key, mixed $value): self;

    /**
     * @return TokenInterface
     */
    public function getToken(): TokenInterface;
}
