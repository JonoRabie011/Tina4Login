<?php

/**
 * Tina4Login
 * Copy-right 2023 - current Tina4Login
 * License: MIT https://opensource.org/licenses/MIT
 */
namespace Tina4Login;


interface Tina4LoginCore
{

    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus <p>Status code sent from server e.g 403, 404, 200</p>
     * @param $responseData
     */
    function afterLogin($httpStatus, $responseData): void;

}