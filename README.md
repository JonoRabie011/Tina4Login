## Welcome to TINA4LOGIN module



To install the module, you can use the following command:

```bash
composer require tina4components/tina4login
```


To overide the after login function

```php
<?php

use Tina4Login\Tina4LoginRequestHandler;
use Tina4Login\Tina4LoginRequestFactory;

class CustomLoginRequestHelper implements Tina4LoginRequestHandler
{
    function afterLogin($httpStatus, $responseData): void
    {
        // Custom login logic
    }

    function afterRegister($httpStatus, $responseData): void
    {
        // Custom register logic
    }
}

// Register custom implementation
Tina4LoginRequestFactory::setTina4LoginRequestHandler(new CustomLoginRequestHelper());
```
