<?php


use Tina4\Api;

class Tina4LoginApi extends Api
{

    /**
     * Url to the sso website
     * @var string
     */
    protected string $ssoBaseUrl = "https://sso.jrwebdesigns.co.za";
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
        if (empty($_ENV["SSO_TOKEN"])) {
            \Tina4\redirect('/tina4/login?message='.urlencode("SSO Token not set, please set the SSO_TOKEN in your .env file"));
        }

        $this->ssoBearerToken = $_ENV["SSO_TOKEN"];
        $this->successRedirectUrl = $_ENV["SSO_REDIRECT_URL"] ?? $this->successRedirectUrl;
        $this->ssoBaseUrl =  $_ENV["SSO_API_URL"] ?? $this->ssoBaseUrl;

        $this->baseURL = $this->getSSOBaseUrl();
        $this->authHeader = "Authorization: Bearer " . $this->ssoBearerToken;

        parent::__construct($this->baseURL, $this->authHeader);
    }

    /**
     * Get the base url for the SSO and set the protocol to https
     * @return string
     */
    private function getSSOBaseUrl(): string
    {
//        $url = str_replace("http://", "https://", $this->baseURL);
//
//        if(!str_starts_with($url, 'https://')) {
//            $url = "https://" . $url;
//        }

        return $this->ssoBaseUrl;
    }
}