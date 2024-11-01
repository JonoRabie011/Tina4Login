<?php


use Tina4\Api;

class Tina4LoginApi extends Api
{

    /**
     * Url to the sso website
     * @var string
     */
    protected string $ssoBaseUrl = "sso.poseidontechnologies.co.za";
//    protected string $ssoBaseUrl = "http://localhost:7777"; //For testing purpose only

    /**
     * Bearer Token issued to you on sso.poseidontechnologies.co.za
     * @var string|mixed
     */
    protected string $ssoBearerToken = "";

    /**
     * The url to redirect to after success
     * @var string
     */
    public string $successRedirectUrl = "/";

    public function __construct()
    {
        $this->ssoBearerToken = $_ENV["SSO_TOKEN"];
        $this->successRedirectUrl = $_ENV["SSO_REDIRECT_URL"] ?? $this->successRedirectUrl;
        $this->ssoBaseUrl =  $_ENV["SSO_API_URL"] ?? $this->ssoBaseUrl;

        $this->baseURL = $this->ssoBaseUrl;
        $this->authHeader = "Authorization: Bearer " . $this->ssoBearerToken;

        parent::__construct();
    }
}