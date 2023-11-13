<?php

use function Tina4\redirect;

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */

class Tina4Login extends Tina4LoginApi implements Tina4LoginCore
{


    /**
     * This function sends the api request to the SSO provider
     * @param $body ["email" => "", "password"=>""]
     * @return void
     */
    function doLogin($body): void
    {
        $apiResponse = $this->sendRequest("/api/sign-in", "POST", $body);
        $this->afterLogin($apiResponse["httpCode"], $apiResponse["body"]);
    }

    /**
     * This function is called after the Api request is made
     *
     * On 200 status set User session variable and redirect to '/'
     * @param $httpStatus 'Status code sent from server e.g 403, 404, 200
     * @param $responseData
     * @return void
     */
    function afterLogin($httpStatus, $responseData): void
    {
        if($httpStatus === 200) {
            $_SESSION["user"] = (object)$responseData;
            redirect($this->successRedirectUrl);
        }

        redirect('/tina4/login?message=' . $responseData);

    }
}