<?php

namespace Templateless;

use Templateless\EmailAddress;
use Templateless\Content;
use Templateless\Result;

class EmailOptions
{
    public $delete_after;

    public function __construct($delete_after = null)
    {
        $this->delete_after = $delete_after;
    }
}

class Email
{
    public $to;
    public $subject;
    public $content;
    public $options;

    public function __construct()
    {
        $this->to = [];
        $this->subject = "";
        $this->content = Content::builder();
        $this->options = new EmailOptions();
    }

    public static function builder()
    {
        return new self();
    }

    public function to($email_address)
    {
        $this->to[] = $email_address;
        return $this;
    }

    public function to_many($email_addresses)
    {
        foreach ($email_addresses as $email_address) {
            $this->to[] = $email_address;
        }
        return $this;
    }

    public function subject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function content($content)
    {
        $this->content = $content;
        return $this;
    }

    public function delete_after($seconds)
    {
        $this->options->delete_after = $seconds;
        return $this;
    }

    public function build()
    {
        return $this;
    }
}
