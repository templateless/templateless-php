<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;

interface Component
{
}

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
