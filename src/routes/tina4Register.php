<?php

use Tina4\Get;
use Tina4\Post;

Get::add("/tina4/register", function (\Tina4\Response $response) {
    return $response(\Tina4\renderTemplate("templates/register.twig"), HTTP_OK, TEXT_HTML);
});

Post::add("/tina4/register", function (\Tina4\Response $response, \Tina4\Request $request) {

    $registerData["email"] = $request->params["email"];
    $registerData["password"] = $request->params["password"] ?? "";
    $registerData["firstName"] = $request->params["firstName"] ?? "";
    $registerData["lastName"] = $request->params["lastName"] ?? "";

    (new Tina4Register())->doRegister($registerData);
});