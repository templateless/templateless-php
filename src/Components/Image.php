<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;
use Templateless\Components\Component;

class Image implements Component, JsonSerializable
{
    private $id;
    private $src;
    private $url;
    private $width;
    private $height;
    private $alt;

    public function __construct($src, $url = '', $width = 0, $height = 0, $alt = '')
    {
        $this->id = ComponentId::IMAGE;
        $this->src = $src;
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
        $this->alt = $alt;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'src' => $this->src,
            'url' => $this->url,
            'width' => $this->width,
            'height' => $this->height,
            'alt' => $this->alt
        ];
    }
}
