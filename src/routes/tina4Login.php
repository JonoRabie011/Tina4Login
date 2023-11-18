<?php

use Tina4\Get;
use Tina4\Post;
use Tina4Login\Tina4Login;

Get::add('/tina4/login', function (\Tina4\Response $response, \Tina4\Request $request) {
    $responseData = [];

    if(isset($request->params)) {
        $responseData = $request->params;
    }

    return $response(\Tina4\renderTemplate('login.twig', $responseData), HTTP_OK, TEXT_HTML);
});

Post::add('/tina4/login', function (\Tina4\Response $response, \Tina4\Request  $request) {

    $loginData["email"] = $request->params["email"];
    $loginData["password"] = $request->params["password"] ?? "";

    $_SESSION["loginEmail"] = $request->params["email"];

    (new Tina4Login())->doLogin($loginData);
});