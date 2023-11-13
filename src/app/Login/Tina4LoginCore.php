<?php

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */


interface Tina4LoginCore
{

    /**
     * This function is called after the Api request is made
     *
     * On 200 status set User session variable and redirect to '/'
     * @param $httpStatus 'Status code sent from server e.g 403, 404, 200
     * @param $responseData
     * @return void
     */
    function afterLogin($httpStatus, $responseData): void;

}