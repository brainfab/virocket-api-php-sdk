<?php

namespace Brainfab\ViRocket;

use Brainfab\ViRocket\Entity\Video;
use Brainfab\ViRocket\Entity\VideosCollection;
use GuzzleHttp\RequestOptions;

/**
 * Videos.
 */
class Videos extends BaseResource
{
    /**
     * @var string
     */
    protected $apiPath = '/api/v1/videos';

    /**
     * List All Videos.
     *
     * @param array $options
     *
     * @return VideosCollection|Video[]
     */
    public function listVideos(array $options = [])
    {
        $queryParams = [];
        if (!empty($options['page'])) {
            $queryParams['page'] = $options['page'];
        }

        $res = $this->client->getHttpClient()->get($this->apiPath, [
            RequestOptions::QUERY => $queryParams,
            'headers' => [
                'Authorization' => $this->getAuthorizationHeader()
            ]
        ]);

        return $this->client->getHttpClient()->decodeResponse($res, VideosCollection::class);
    }
}
