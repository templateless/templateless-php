<?php

namespace Templateless;

use JsonSerializable;

class EmailAddress implements JsonSerializable
{
    private $name;
    private $email;

    public function __construct($email, $name = null)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
