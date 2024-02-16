<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;

interface Component {}

enum Service: string
{
    case WEBSITE = 'WEBSITE';
    case EMAIL = 'EMAIL';
    case PHONE = 'PHONE';
    case FACEBOOK = 'FACEBOOK';
    case YOUTUBE = 'YOUTUBE';
    case TWITTER = 'TWITTER';
    case X = 'X';
    case GITHUB = 'GITHUB';
    case INSTAGRAM = 'INSTAGRAM';
    case LINKEDIN = 'LINKEDIN';
    case SLACK = 'SLACK';
    case DISCORD = 'DISCORD';
    case TIKTOK = 'TIKTOK';
    case SNAPCHAT = 'SNAPCHAT';
    case THREADS = 'THREADS';
    case TELEGRAM = 'TELEGRAM';
}

class Item implements JsonSerializable
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
