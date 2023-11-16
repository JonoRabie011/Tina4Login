<?php

class Tina4LoginApi extends \Tina4\Api
{

    /**
     * Url to the sso website
     * @var string
     */
//    protected string $ssoBaseUrl = "sso.poseidontechnologies.co.za";
    protected string $ssoBaseUrl = "http://localhost:7777"; //For testing purpose only

    /**
     * Bearer Token issued to you on sso.poseidontechnologies.co.za
     * @var string|mixed
     */
    protected string $ssoBearerToken = "";

    /**
     * The url to redirect to after success
     * @var string
     */
    protected string $successRedirectUrl = "/";

    public function __construct()
    {
        $this->baseURL = $this->ssoBaseUrl;
        $this->authHeader = "Authorization: Bearer " . $this->ssoBearerToken;
    }
}