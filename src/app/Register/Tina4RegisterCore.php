<?php

/**
 * Tina4Login
 * Copy-right 2007 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */


interface Tina4RegisterCore
{

    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus 'Status code sent from server e.g 403, 404, 200
     * @param $responseData
     * @return void
     */
    function afterRegister($httpStatus, $responseData): void;

}