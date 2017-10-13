<?php

namespace Brainfab\ViRocket;

abstract class BaseResource
{
    /**
     * @var ViRocket
     */
    protected $client;


    /**
     * Videos constructor.
     *
     * @param ViRocket $client
     */
    public function __construct(ViRocket $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getAuthorizationHeader()
    {
        $token = $this->client->getAccessToken();
        $authToken = isset($token['access_token']) ? $token['access_token'] : null;

        return sprintf('Bearer %s', $authToken);
    }
}
