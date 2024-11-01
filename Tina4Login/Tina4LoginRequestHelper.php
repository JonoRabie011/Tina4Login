<?php

namespace Tina4Login;

use Tina4LoginApi;
use function Tina4\redirect;

class Tina4LoginRequestHelper implements Tina4LoginRequestHandler
{
    /**
     * This function is called after the Api request is made
     *
     * On 200 status set User session variable and redirect to '/'
     * @param $httpStatus <p>Status code sent from server e.g 403, 404, 200</p>
     * @param $responseData
     * @return void
     */
    function afterLogin($httpStatus, $responseData): void
    {
        if($httpStatus === 200) {
            $_SESSION["user"] = (object)$responseData;
            redirect((new Tina4LoginApi())->successRedirectUrl);
        }

        if (empty($responseData)) {
            $responseData["message"] = "An error occurred";
        }

        redirect('/tina4/login?' . http_build_query($responseData));
    }

    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus <p>Status code sent from server e.g 403, 404, 200</p>
     * @param $responseData
     */
    function afterRegister($httpStatus, $responseData): void
    {

        if($httpStatus === 200) {
            redirect('/tina4/login');
        }

        redirect('/tina4/register?message=' . $responseData);
    }
}