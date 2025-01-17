## Welcome to TINA4LOGIN module



To install the module, you can use the following command:

```bash
composer require tina4components/tina4login
```

To use the module the following .env variables are required:

```dotenv
SSO_TOKEN=<Your API Token from the sso protal>
SSO_REDIRECT_URL=<Your redirect URL to you application>
SSO_BASE_TWIG_FILE=tina4Login-base.twig | <The base twig you would like to have the login extend from>
```

Once you have installed the following routes will be available:

```
 /tina4/login - Login Page html 
 
 /tina4/register - Register Page html
```
<br>
To see how the module handles the login and register requests you can look at the following code:

[Default Request Helper Implementation ](https://github.com/JonoRabie011/Tina4Login/blob/master/Tina4Login/Tina4LoginRequestHelper.php)

To override this functionality you can create your own implementation of the `Tina4LoginRequestHandler` 
interface and set it using the `Tina4LoginRequestFactory` class. As shown in the example below:

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

## After login Response Data will be in the following format:

### 200 OK
```json

{
  "guuid": "********-****-****-****-************",
  "firstName": "John",
  "lastName": "Doe",
  "email": "example@example.com",
  "dateModified": "26-12-2024 10:12:20",
  "dateCreated": "26-12-2024 10:12:20",
  "token": "eyJhbGciOi...truncated...Bp5ddhQ",
  "refreshToken": "**************",
  "subscription": {
    "applicationId": "1",
    "lastRenewalDate": "26-12-2024 00:00:00",
    "nextBillingInvoiceId": "-1",
    "nextBillingDate": "25-01-2025 00:00:00",
    "status": "Active",
    "subscriptionPackage": {
      "title": "Free",
      "description": "Free subscription package",
      "newPriceEffectiveDate": null,
      "durationDays": null,
      "trailLength": "0",
      "priceHistory": null,
      "currentPricing": {
        "price": "0.00",
        "currency": "ZAR"
      }
    }
  }
}
```

### 400 Bad Request
```json
"Invalid email or password"
```

### 401 Unauthorized
```json
 "Unauthorized"
```

## After register Response Data will be in the following format:

### 200 OK - User needs to confirm email before they can login
```json
"Your user has been created be on the lookout for your confirmation email"
```
