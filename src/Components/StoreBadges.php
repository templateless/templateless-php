<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;
use Templateless\Components\Component;

class StoreBadges implements Component, JsonSerializable
{
    public $id;
    public $data;

    public function __construct($data)
    {
        $this->id = ComponentId::STORE_BADGES;
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
