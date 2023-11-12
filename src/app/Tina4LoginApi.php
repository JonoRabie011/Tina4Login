<?php

class Tina4LoginApi extends \Tina4\Api
{

    /**
     * Url to the sso website
     * @var string
     */
//    private $ssoLoginUrl = "tina4sso.jrwebdesigns.co.za";
    public string $ssoBaseUrl = "http://localhost:7777";

    public string $ssoBearerToken = "";

    /**
     * The url to redirect to after success
     * @var string
     */
    public string $successRedirectUrl = "/";

    public function __construct()
    {
        $this->ssoBearerToken = $_ENV["SSO_TOKEN"];

        if(isset($_ENV["SSO_REDIRECT_URL"])) {
            $this->successRedirectUrl = $_ENV["SSO_REDIRECT_URL"];
        }

        $this->baseURL = $this->ssoBaseUrl;
        $this->authHeader = "Authorization: Bearer " . $this->ssoBearerToken;
    }
}