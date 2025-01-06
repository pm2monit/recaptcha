<?php 
namespace Recaptcha;

class Recaptcha
{
    private $captchaText;
    private $captchaNumber;

    public function __construct(int $length)
    {
        $this->captchaText = $this->generateCaptchaText($length);
        $this->captchaNumber = $this->generateCaptchaNumber($length);
    }


    private function generateCaptchaText(int $length): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $captchaText = '';

        for ($i = 0; $i < $length; $i++) {
            $captchaText .= $characters[rand(0, strlen($characters) - 1)];
        }

        // $this->generateCaptchaImage($captchaText);

        return $captchaText;
    }

    private function generateCaptchaNumber(int $length): string
    {
        session_start();  

        $captcha = '';
        for ($i = 0; $i < $length; $i++) {
            $captcha .= rand(0, 9);
        }

        $_SESSION['captcha_code'] = $captcha;

        // $this->generateCaptchaImage($captcha);

        return $captcha;
    }

    private function generateCaptchaImage(string $captcha): void
    {
        header('Content-Type: image/png');
        $image = imagecreatetruecolor(100, 50);


        $bgColor = imagecolorallocate($image, 255, 255, 255);  // White background
        imagefill($image, 0, 0, $bgColor);

        $textColor = imagecolorallocate($image, 0, 0, 0);  // Black text

        $font = 5;  
        imagestring($image, $font, 10, 15, $captcha, $textColor);

        imagepng($image);
        imagedestroy($image);
    }

    public function verifyCaptcha(string $inputText, string $type): bool
    {
        if ($type === 'text') {
            return strtolower($inputText) === strtolower($this->captchaText);
        }

        if ($type === 'number') {
            return $inputText === $_SESSION['captcha_code'];
        }

        return false;
    }

    public function getCaptcha(string $type): string
    {
        if ($type === 'text') {
            return $this->captchaText;
        }

        if ($type === 'number') {
            return $this->captchaNumber;
        }

        return '';
    }
}
