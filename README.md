## reCaptcha

Google reCaptcha 2.0 for PHP

## Installation

```bash
composer require skillaug/reCaptcha "1.0.0"
```
## Usage

```php
$secret = 'YOUR_SECRET';

$reCaptcha = new \skillaug\reCaptcha( $secret );

$response = $reCaptcha->verifyResponse(@$_POST["g-recaptcha-response"]);

if ( empty( $response ) || $response->success === false ) {
    die('invalid captcha');
}
```
