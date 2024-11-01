<?php

namespace Tina4Login;

interface Tina4LoginRequestHandler
{

    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus <p>Status code sent from server e.g 403, 404, 200</p>
     * @param $responseData
     */
    public function afterLogin($httpStatus, $responseData): void;


    /**
     * This function is called after the Api request is made
     *
     * @param $httpStatus <p>Status code sent from server e.g 403, 404, 200</p>
     * @param $responseData
     */
    public function afterRegister($httpStatus, $responseData): void;
}