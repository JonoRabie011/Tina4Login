<?php

\Tina4\Get::add("/tina4login/init", function (\Tina4\Response $response) {

    Tina4LoginInit::packageInit(TINA4_DOCUMENT_ROOT);

    unlink(__FILE__);

    \Tina4\redirect("/");
    return 1;
});