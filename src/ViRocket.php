<?php

namespace Brainfab\ViRocket;

use GuzzleHttp\RequestOptions;

/**
 * ViRocket API Client.
 */
class ViRocket
{

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var array
     */
    protected $accessToken;

    /**
     * @var Videos
     */
    public $videos;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * ViRocket constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient();
        $this->videos = new Videos($this);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return array
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param array $accessToken
     */
    public function setAccessToken(array $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @param array $token
     */
    public function authenticate(array $token)
    {
        if (!empty($token['refresh_token'])) {
            $token['grant_type'] = 'refresh_token';
        } else {
            $token['grant_type'] = 'password';
        }

        $token['client_id'] = $this->getClientId();
        $token['client_secret'] = $this->getClientSecret();

        $res = $this->getHttpClient()->post(
            '/oauth/v2/token',
            [
                RequestOptions::FORM_PARAMS => $token
            ]
        );

        $this->setAccessToken(json_decode($res->getBody()->getContents(), true));
    }
}
