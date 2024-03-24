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
use Templateless\Components\QrCode;
use Templateless\Components\StoreBadges;
use Templateless\Components\Signature;

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

    public function view_in_browser($text = '')
    {
        $this->push(new ViewInBrowser($text));
        return $this;
    }

    public function qr_code($url)
    {
        $this->push(QrCode::url($url));
        return $this;
    }

    public function store_badges($data)
    {
        $this->push(new StoreBadges($data));
        return $this;
    }

    public function signature($text, $font = null)
    {
        $this->push(new Signature($text, $font));
        return $this;
    }

    public function component($c)
    {
        $this->push($c);
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

class_alias('Templateless\Collection', 'Header');
class_alias('Templateless\Collection', 'Footer');
