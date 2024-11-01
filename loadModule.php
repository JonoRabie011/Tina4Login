<?php

\Tina4\Module::addModule("Tina4 Login Module", "0.0.1", "tina4components/tina4login", function(\Tina4\Config $config) {
    $config->addTwigGlobal('baseTwigFile', $_ENV["BASE_TWIG_FILE"] ?? 'tina4Login-base.twig');
});