<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Recaptcha\Recaptcha;

final class RecaptchaTest extends TestCase
{
    private $length = 10;
    private ?Recaptcha $obj;

    protected function setUp(): void
    {
        $this->obj = new Recaptcha($this->length);
    }

    protected function tearDown(): void
    {
        $this->obj = null;
    }

    public function testVerifyCaptcha(): void
    {        
        $captcha = $this->obj->getCaptcha('text');
        $result = $this->obj->verifyCaptcha($captcha, 'text');

        $this->assertTrue($result);
    }
    
    public function testCaptchaTextLength(): void
    {
        $captcha = $this->obj->getCaptcha('text');

        $this->assertEquals($this->length, strlen($captcha));
    }

    public function testCaptchaTextIsString(): void
    {
        $captcha = $this->obj->getCaptcha('text');

        $this->assertIsString($captcha);
    }

    public function testCaptchaNumberIsString(): void
    {
        $captcha = $this->obj->getCaptcha('number');

        $this->assertIsString($captcha);
    }
}