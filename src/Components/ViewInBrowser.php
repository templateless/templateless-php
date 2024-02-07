<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;

interface Component {}

class ViewInBrowser implements Component, JsonSerializable
{
    private $id;
    private $text;

    public function __construct($text)
    {
        $this->id = ComponentId::VIEW_IN_BROWSER;
        $this->text = $text;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'text' => $this->text
        ];
    }
}
