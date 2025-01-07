<?php 
namespace Recaptcha;

enum CaptchaType: string
{
    case TEXT = 'text';
    case NUMBER = 'number';
}

class Recaptcha
{
    private $captchaText;
    private $captchaNumber;
    private const CAPTCHA_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    public function __construct(int $length)
    {
        $this->captchaText = $this->generateCaptchaText($length);
        $this->captchaNumber = $this->generateCaptchaNumber($length);
    }


    private function generateCaptchaText(int $length): string
    {
        $characters = self::CAPTCHA_CHARACTERS;
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

    /**
     * Membuat image captcha
     * 
     * @param string $captcha
     * @return void
     */
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

    /**
     * Mencocokan hasil captcha
     * 
     * string $inputText
     * @param CaptchaType $type Tipe captcha yang diinginkan (CaptchaType::TEXT atau CaptchaType::NUMBER)
     * @return boolean
     */
    public function verifyCaptcha(string $inputText, CaptchaType $type): bool
    {
        if ($type === CaptchaType::TEXT) {
            return strtolower($inputText) === strtolower($this->captchaText);
        }

        if ($type === CaptchaType::NUMBER) {
            return $inputText === $_SESSION['captcha_code'];
        }

        return false;
    }

    /**
     * Mendapatkan captcha berdasarkan tipe
     * 
     * @param CaptchaType $type Tipe captcha yang diinginkan (CaptchaType::TEXT atau CaptchaType::NUMBER)
     * @return string
     */
    public function getCaptcha(CaptchaType $type): string
    {
        if ($type === CaptchaType::TEXT) {
            return $this->captchaText;
        }

        if ($type === CaptchaType::NUMBER) {
            return $this->captchaNumber;
        }

        return '';
    }
}
