<?php


namespace App\Services;


class JwtService
{
	public static function generateJWTToken(array $payload, string $secretKey, int $expiryTime = 3600, string $algorithm = 'sha256'): string
	{
	    // Create the header
	    $header = [
	        'typ' => 'JWT',
	        'alg' => $algorithm,
	    ];

	    // Create the payload
	    $payload['exp'] = time() + $expiryTime;

	    // Create the base64url encoded header and payload
	    $headerEncoded = self::base64UrlEncode(json_encode($header));
	    $payloadEncoded = self::base64UrlEncode(json_encode($payload));

	    // Create the signature
	    $signature = hash_hmac($algorithm, $headerEncoded . '.' . $payloadEncoded, $secretKey, true);
	    $signatureEncoded = self::base64UrlEncode($signature);

	    // Create the JSON Web Token
	    $token = $headerEncoded . '.' . $payloadEncoded . '.' . $signatureEncoded;

	    return $token;
	}

	// Function to verify JWT token
	public static function verifyJWTToken(string $token, string $secretKey): bool
	{
	    // Split the token into three parts
	    $header = self::base64UrlDecode(explode('.', $token)[0]);
	    $payload = self::base64UrlDecode(explode('.', $token)[1]);
	    $signature = explode('.', $token)[2];

	    // Verify the signature
	    $expectedSignature = hash_hmac($secretKey, $header . '.' . $payload, true);
	    return hash_equals($signature, $expectedSignature);
	}

	// Function to extract information from JWT token
	public static function getJWTPayload(string $token): array
	{
	    // Split the token into three parts
	    $header = self::base64UrlDecode(explode('.', $token)[0]);
	    $payload = self::base64UrlDecode(explode('.', $token)[1]);

	    // Decode the payload
	    return json_decode($payload, true);
	}

    private static function base64UrlEncode($string) {
        return str_replace(['+','/','='], ['-','_',''], base64_encode($string));
    }

    private static function base64UrlDecode($string) {
        return base64_decode(str_replace(['-','_'], ['+','/'], $string));
    }
}

/* Example usage:

$secretKey = 'my-secret-key';
$payload = [
    'user_id' => 1,
    'username' => 'johndoe',
];

$token = JwtService::generateToken($payload, $secretKey);

The token can now be used to authenticate
*/
