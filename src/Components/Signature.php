<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;
use Templateless\Components\Component;

class Signature implements Component, JsonSerializable
{
    public $id;
    public $text;
    public $font;

    public function __construct($text, $font = null)
    {
        $this->id = ComponentId::SIGNATURE;
        $this->text = $text;
        $this->font = $font;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'font' => $this->font
        ];
    }
}
