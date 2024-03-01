<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;
use Templateless\Components\Component;

class Socials implements Component, JsonSerializable
{
    private $id;
    private $data;

    public function __construct($data)
    {
        $this->id = ComponentId::SOCIALS;
        $this->data = $data;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'data' => $this->data
        ];
    }
}
