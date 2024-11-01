<?php
/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */


use app\Tina4LoginApi;
use Tina4Login\Tina4LoginRequestFactory;


class Tina4Register extends Tina4LoginApi
{
    /**
     * This function handles the signup request for a user
     * @param $body
     * @return void
     */
    public final function doRegister($body): void
    {
        $apiResponse = $this->sendRequest("/api/sign-up", "POST", $body);
        $requestHandler = Tina4LoginRequestFactory::getTina4LoginRequestHandler();
        $requestHandler->afterRegister($apiResponse["httpCode"], $apiResponse["body"]);
    }
}