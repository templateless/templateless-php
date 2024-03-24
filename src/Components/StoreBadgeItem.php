<?php

namespace Templateless\Components;

use JsonSerializable;

class StoreBadgeItem implements JsonSerializable
{
    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'key' => $this->key,
            'value' => $this->value
        ];
    }
}
