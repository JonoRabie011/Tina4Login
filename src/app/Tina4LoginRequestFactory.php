<?php

namespace Tina4Login;

class Tina4LoginRequestFactory
{
    private static ?Tina4LoginRequestHandler $tina4LoginRequestHandler = null;

    public static function setTina4LoginRequestHandler(Tina4LoginRequestHandler $tina4LoginRequestHandler): void
    {
        self::$tina4LoginRequestHandler = $tina4LoginRequestHandler;
    }

    public static function getTina4LoginRequestHandler(): Tina4LoginRequestHandler
    {
        return self::$tina4LoginRequestHandler ?? new Tina4LoginRequestHelper();
    }

}