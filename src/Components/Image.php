<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;

interface Component {}

class Image implements Component, JsonSerializable
{
    private $id;
    private $src;
    private $alt;
    private $width;
    private $height;
    private $url;

    public function __construct($src, $alt, $width, $height, $url)
    {
        $this->id = ComponentId::IMAGE;
        $this->src = $src;
        $this->alt = $alt;
        $this->width = $width;
        $this->height = $height;
        $this->url = $url;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'src' => $this->src,
            'alt' => $this->alt,
            'width' => $this->width,
            'height' => $this->height,
            'url' => $this->url
        ];
    }
}
