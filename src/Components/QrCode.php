<?php

namespace Templateless\Components;

use JsonSerializable;
use Templateless\Components\ComponentId;
use Templateless\Components\Component;
use Templateless\Components\Cryptocurrency;

class QrCode implements Component, JsonSerializable
{
    public $id;
    public $data;

    public function __construct($data)
    {
        $this->id = ComponentId::QR_CODE;
        $this->data = base64_encode($data);
    }

    public static function email($email)
    {
        return new self("mailto:{$email}");
    }

    public static function url($url)
    {
        return new self($url);
    }

    public static function phone($phone)
    {
        return new self("tel:{$phone}");
    }

    public static function sms($text)
    {
        return new self("smsto:{$text}");
    }

    public static function coordinates($lat, $lng)
    {
        return new self("geo:{$lat},{$lng}");
    }

    public static function cryptocurrencyAddress($cryptocurrency, $address)
    {
        return new self("{$cryptocurrency}:{$address}");
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'data' => $this->data
        ];
    }
}
