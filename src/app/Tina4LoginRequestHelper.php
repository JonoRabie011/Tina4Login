<?php

namespace Tina4Login;
use function Tina4\redirect;

class Tina4LoginRequestHelper implements Tina4LoginCore, Tina4RegisterCore
{
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
            redirect((new Tina4LoginApi())->successRedirectUrl);
        }

        redirect('/tina4/login?message=' . $responseData);
    }

    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus 'Status code sent from server e.g 403, 404, 200
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