<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;
use Templateless\Components\Component;

class Text implements Component, JsonSerializable
{
    private $id;
    private $text;

    public function __construct($text)
    {
        $this->id = ComponentId::TEXT;
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
