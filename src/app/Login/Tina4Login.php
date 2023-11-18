<?php

namespace Tina4Login;

use function Tina4\redirect;

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */

class Tina4Login extends Tina4LoginApi
{


    /**
     * This function sends the api request to the SSO provider
     * @param $body ["email" => "", "password"=>""]
     * @return void
     */
    public final function doLogin($body): void
    {
        $apiResponse = $this->sendRequest("/api/sign-in", "POST", $body);
        (new Tina4LoginRequestHelper())->afterLogin($apiResponse["httpCode"], $apiResponse["body"]);
    }


}