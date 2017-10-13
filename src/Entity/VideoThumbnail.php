<?php

namespace Brainfab\ViRocket\Entity;

use JMS\Serializer\Annotation as JMS;

class VideoThumbnail
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    public $url;

    /**
     * @var string
     * @JMS\Type("integer")
     */
    public $width;

    /**
     * @var string
     * @JMS\Type("integer")
     */
    public $height;
}
