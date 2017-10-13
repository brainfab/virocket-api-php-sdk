<?php

namespace Brainfab\ViRocket\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class VideosCollection.
 */
class VideosCollection extends PaginatedCollection
{
    /**
     * @var array
     * @JMS\Type("array<Brainfab\ViRocket\Entity\Video>")
     */
    public $data;
}
