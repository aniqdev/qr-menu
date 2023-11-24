<?php


namespace App\Services;


class RecaptchaService
{
	public static function validate()
	{
        $response = \Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('app.recaotcha_secret'),
            'response' => request('g-recaptcha-response'),
            'ip' => request()->ip(),
        ]);

        return $response->json()['success'] ?? null;
	}
}