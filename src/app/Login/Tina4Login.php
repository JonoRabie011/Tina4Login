<?php

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */

use Tina4Login\Tina4LoginRequestFactory;

class Tina4Login extends Tina4LoginApi
{


    /**
     * This function sends the api request to the SSO provider
     * @param $body ["email" => "", "password"=>""]
     * @return void
     */
    public final function doLogin($body): void
    {
        $body["deviceIp"] = UtilityFunctions::get_client_ip();
        $apiResponse = $this->sendRequest("/api/sign-in", "POST", $body);
        $requestHandler = Tina4LoginRequestFactory::getTina4LoginRequestHandler();
        $requestHandler->afterLogin($apiResponse["httpCode"], $apiResponse["body"]);
    }

    /**
     * Return the login page settings e.g. Google Sign In Button, SSO Sign In
     * @return mixed
     */
    public final function getLoginPageSettings()
    {
        $apiResponse = $this->sendRequest("/api/sign-in/page?".http_build_query([
            "redirect_uri" => base64_encode($_ENV["SSO_REDIRECT_URL"]) ?? null
        ]));

        return $apiResponse["body"];
    }

}