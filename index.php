<?php
require_once "./vendor/autoload.php";
\Tina4\Initialize();

$config = new \Tina4\Config(static function (\Tina4\Config $config){
    $config->addTwigGlobal('baseTwigFile', $_ENV["BASE_TWIG_FILE"] ?? 'tina4Login-base.twig');
});

echo new \Tina4\Tina4Php($config);