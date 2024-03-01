<?php

namespace Templateless;

use Templateless\Theme;
use Templateless\Components\Button;
use Templateless\Components\Image;
use Templateless\Components\Link;
use Templateless\Components\Otp;
use Templateless\Components\Socials;
use Templateless\Components\Text;
use Templateless\Components\ViewInBrowser;

class Content
{
    public $version;
    public $theme;
    public $header;
    public $body;
    public $footer;

    public function __construct()
    {
        $this->version = 0;
        $this->theme = Theme::UNSTYLED;
        $this->header = [];
        $this->body = [[]];
        $this->footer = [];
    }

    public static function builder()
    {
        return new self();
    }

    public function theme($theme)
    {
        $this->theme = $theme;
        return $this;
    }

    public function header($header)
    {
        $this->header = $header->components;
        return $this;
    }

    public function footer($footer)
    {
        $this->footer = $footer->components;
        return $this;
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

    public function view_in_browser($text = '')
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
        $this->body[0][] = $component;
    }
}
