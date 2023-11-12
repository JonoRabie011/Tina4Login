<?php

use function Tina4\redirect;

/**
 * Tina4Login
 * Copy-right 2007 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */


class Tina4Register extends Tina4LoginApi implements Tina4RegisterCore
{
    /**
     * This function handles the signup request for a user
     * @param $body
     * @return void
     */
    function doRegister($body): void
    {
        $apiResponse = $this->sendRequest("/api/sign-up", "POST", $body);
        $this->afterRegister($apiResponse["httpCode"], $apiResponse["body"]);
    }

    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus 'Status code sent from server e.g 403, 404, 200
     * @param $responseData
     * @return void
     */
    function afterRegister($httpStatus, $responseData): void
    {
        if($httpStatus === 200) {
            redirect('/tina4/login');
        }

        redirect('/tina4/register?message=' . $responseData);

    }
}