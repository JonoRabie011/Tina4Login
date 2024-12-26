<?php


use Tina4\Get;
use Tina4\Post;

Get::add('/tina4/login', function (\Tina4\Response $response, \Tina4\Request $request) {
    $responseData = [];

    if(isset($request->params)) {
        $responseData = $request->params;
    }

    $tina4Login = new Tina4Login();
    $responseData["integrations"] = $tina4Login->getLoginPageSettings();

    return $response(\Tina4\renderTemplate('login.twig', $responseData), HTTP_OK, TEXT_HTML);
});

Post::add('/tina4/login', function (\Tina4\Response $response, \Tina4\Request  $request) {

    $loginData["email"] = $request->params["email"];
    $loginData["password"] = $request->params["password"] ?? "";

    $_SESSION["loginEmail"] = $request->params["email"];

    (new Tina4Login())->doLogin($loginData);
});

Get::add('/tina4/get-login', function (\Tina4\Response $response, \Tina4\Request $request) {



});