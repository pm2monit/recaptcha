<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Recaptcha\Recaptcha;

final class RecaptchaTest extends TestCase
{
    public function testVerifyCaptcha(): void
    {
        $obj = new Recaptcha(20);
        $captcha = $obj->getCaptcha('text');
        $result = $obj->verifyCaptcha($captcha, 'text');
        $this->assertIsBool($result);
    }
}