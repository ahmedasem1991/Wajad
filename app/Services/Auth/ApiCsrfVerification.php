<?php

namespace App\Services\Auth;

use App\ApiToken;
use App\Exceptions\Api\ApiException;
use phpseclib\Crypt\RSA;

class ApiCsrfVerification
{
    public static function tokenIsValid(array $token)
    {
        $apiCsrfVerification = new static;

        $token = $apiCsrfVerification->tokenBodyValidation($token);

        $rsa = new RSA;

        $privateKey = file_get_contents(storage_path('app/keys/privateKey.pem'));

        $rsa->loadKey($privateKey);

        try {
            return $rsa->decrypt(base64_decode($token['cipherText'])) == $token['plainText'] ? ApiToken::create([
                'token' => $token['plainText']
            ]) : false;
        } catch (\Throwable $ex) {
            throw new ApiException(trans("auth.token_mismatch"), 400);
        }
    }

    public function tokenBodyValidation($token)
    {
        if (array_key_exists('plainText', $token) && array_key_exists('cipherText', $token)) {
            return $token;
        }

        throw new ApiException(trans("auth.token_mismatch"), 400);
    }
}
