PHP JWT
=======
A simple library to encode and decode [JWT](https://jwt.io/) tokens in PHP (conforming to [RFC 7519](https://datatracker.ietf.org/doc/html/rfc7519))

Dependencies
------------
- PHP 8.0+
- OpenSSL Extension
- [firebase/php-jwt](https://github.com/firebase/php-jwt)

Installation
------------
```bash
composer require lostinvlg/jwt
```

Creating jwt
------------
```php
use Lostinvlg\Jwt\Algorithm;
use Lostinvlg\Jwt\Jwt;
use Lostinvlg\Jwt\Key;

$jwtId = '1dA8dDQ5lE';
$time = time();
$jwt = new Jwt();

$token = $jwt
    ->getBuilder()
    ->setKey(new Key('YOUR_SECRET_KEY_STRING', Algorithm::HS256))
    ->setIssuedBy('https://example.com')
    ->setAudience('https://example.com')
    ->setIssuedAt($time)
    ->setNotBefore($time + 10)
    ->setExpiresAt($time + 3600)
    ->setIdentifiedBy($jwtId)
    ->setClaim('user_id', 1)
    ->setClaim('role_id', 'admin')
    ->getToken();

$encoded = (string) $token; // contains jwt encoded string

$token->getClaim('user_id'); // equals 1
$token->getClaim('role_id'); // equals "admin"
$token->getClaim('exp'); // returns expires timestamp
```

Parsing from string
-------------------
```php
use Lostinvlg\Jwt\Algorithm;
use Lostinvlg\Jwt\Jwt;
use Lostinvlg\Jwt\Key;

$jwt = new Jwt();
$token = $jwt->getParser(new Key('YOUR_SECRET_KEY_STRING', Algorithm::HS256))->parse($encoded);

$token->getClaim('user_id'); // equals 1
$token->getClaim('role_id'); // equals "admin"
$token->getClaim('exp'); // returns expires timestamp
```

License
-------
[MIT](https://opensource.org/licenses/MIT)