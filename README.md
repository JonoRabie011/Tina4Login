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

To use the module the following .env variables are required:

```dotenv
SSO_API_URL=sso.poseidontechnologies.co.za
SSO_TOKEN=<Your API Token from the sso protal>
SSO_REDIRECT_URL=<Your redirect URL to you application>
SSO_BASE_TWIG_FILE=tina4Login-base.twig | <The base twig you would like to have the login extend from>
```
