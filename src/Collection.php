<?php

namespace Templateless;

use Templateless\Components\Component;
use Templateless\Components\Button;
use Templateless\Components\Image;
use Templateless\Components\Link;
use Templateless\Components\Otp;
use Templateless\Components\Socials;
use Templateless\Components\Text;
use Templateless\Components\ViewInBrowser;
use Templateless\Components\SocialItem;

class Collection
{
    public $components;

    public function __construct()
    {
        $this->components = [];
    }

    public static function builder()
    {
        return new self();
    }

    public function button($text, $url)
    {
        $this->push(new Button($text, $url));
        return $this;
    }

    public function image($src, $url = null, $width = null, $height = null, $alt = null)
    {
        $this->push(new Image($src, $url, $width, $height, $alt));
        return $this;
    }

    public function link($text, $url)
    {
        $this->push(new Link($text, $url));
        return $this;
    }

    public function otp($text)
    {
        $this->push(new Otp($text));
        return $this;
    }

    public function socials($data)
    {
        $this->push(new Socials($data));
        return $this;
    }

    public function text($text)
    {
        $this->push(new Text($text));
        return $this;
    }

    public function view_in_browser($text)
    {
        $this->push(new ViewInBrowser($text));
        return $this;
    }

    public function build()
    {
        return $this;
    }

    private function push($component)
    {
        $this->components[] = $component;
    }
}
