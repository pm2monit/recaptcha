<?php
namespace Recaptcha;

enum CaptchaType: string
{
    case TEXT = 'text';
    case NUMBER = 'number';
}

interface RecaptchaInterface
{
    /**
     * Set captcha text.
     *
     * @param int $length panjang captcha
     * @return string
     */
    public static function setCaptcha(int $length): void;
    
    /**
     * Get captcha set property text or number.
     *
     * @param CaptchaType $type Tipe captcha yang diinginkan (CaptchaType::TEXT atau CaptchaType::NUMBER)
     * @return string
     */
    public static function getCaptcha(CaptchaType $type): string;

        /**
     * Generator captcha image.
     *
     * @param string $captcha hasil dari get captcha
     * @return void
     */
    public static function captchaImage(string $captcha): void;
    
    /**
     * Mencocokan hasil captcha
     * 
     * @param string $inputan  inputan user
     * @return boolean
     */
    public static function verifyCaptcha(string $inputan): bool;
}
