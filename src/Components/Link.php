<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;

interface Component {}

class Link implements Component, JsonSerializable
{
    private $id;
    private $text;
    private $url;

    public function __construct($text, $url)
    {
        $this->id = ComponentId::LINK;
        $this->text = $text;
        $this->url = $url;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'url' => $this->url
        ];
    }
}