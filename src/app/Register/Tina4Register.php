<?php

namespace Tina4Login;

use function Tina4\redirect;

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */


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
        (new Tina4LoginRequestHelper())->afterRegister($apiResponse["httpCode"], $apiResponse["body"]);
    }
}