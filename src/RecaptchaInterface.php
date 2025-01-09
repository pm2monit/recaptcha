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
     * @param int $length
     * @return string
     */
    public static function setCaptcha(int $length): void;
    
    /**
     * Get captcha text or number.
     *
     * @param CaptchaType $type Tipe captcha yang diinginkan (CaptchaType::TEXT atau CaptchaType::NUMBER)
     * @return string
     */
    public static function getCaptcha(CaptchaType $type): string;

        /**
     * Get captcha text or number.
     *
     * @param string
     * @return string
     */
    public static function captchaImage(string $captcha): void;
    
    /**
     * Mencocokan hasil captcha
     * 
     * string $inputText
     * @param string $inputan  inputan user
     * @return boolean
     */
    public static function verifyCaptcha(string $inputan): bool;
}
