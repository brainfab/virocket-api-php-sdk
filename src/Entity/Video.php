<?php

namespace Brainfab\ViRocket\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Video.
 */
class Video extends Entity
{
    /**
     * @JMS\Type("integer")
     *
     * @var int
     */
    public $id;

    /**
     * @JMS\Type("integer")
     * @JMS\SerializedName("resource_id")
     *
     * @var int
     */
    public $resourceId;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $name;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $token;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $url;

    /**
     * @JMS\Type("array<string, Brainfab\ViRocket\Entity\VideoThumbnail>")
     *
     * @var array
     */
    public $thumbnails = [];

    /**
     * @JMS\Type("array<string, string>")
     *
     * @var array
     */
    public $player = [];

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $status;

    /**
     * @JMS\Type("DateTime<'Y-m-d\TH:i:sO'>")
     * @JMS\SerializedName("created_at")
     *
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @JMS\Type("DateTime<'Y-m-d\TH:i:sO'>")
     * @JMS\SerializedName("updated_at")
     *
     * @var \DateTime
     */
    public $updatedAt;
}
