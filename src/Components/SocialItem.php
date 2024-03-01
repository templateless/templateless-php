<?php

namespace Templateless\Components;

use JsonSerializable;

class SocialItem implements JsonSerializable
{
    private $service;
    private $value;

    public function __construct($service, $value)
    {
        $this->service = $service;
        $this->value = $value;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'service' => $this->service,
            'value' => $this->value
        ];
    }
}
