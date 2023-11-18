<?php

use Tina4\Get;
use Tina4\Post;
use Tina4Login\Tina4Register;

Get::add("/tina4/register", function (\Tina4\Response $response, \Tina4\Request $request) {
    $responseData = [];

    if(isset($request->params)) {
        $responseData = $request->params;
    }

    return $response(\Tina4\renderTemplate("templates/register.twig", $responseData), HTTP_OK, TEXT_HTML);
});

Post::add("/tina4/register", function (\Tina4\Response $response, \Tina4\Request $request) {

    $registerData["email"] = $request->params["email"];
    $registerData["password"] = $request->params["password"] ?? "";
    $registerData["firstName"] = $request->params["firstName"] ?? "";
    $registerData["lastName"] = $request->params["lastName"] ?? "";

    if(!empty($registerData["email"])) {
        $_SESSION["loginEmail"] = $registerData["email"];
    }

    (new Tina4Register())->doRegister($registerData);
});