<?php

require_once './vendor/autoload.php';

use Templateless\Content;
use Templateless\Email;
use Templateless\EmailAddress;
use Templateless\Templateless;
use Templateless\Collection;
use Templateless\Components\SocialItem;
use Templateless\Components\Service;

try {
    $api_key = $env["TEMPLATELESS_API_KEY"] ?? getenv("TEMPLATELESS_API_KEY");
    if (!isset($api_key) || $api_key == '') {
        echo "Set TEMPLATELESS_API_KEY to your Templateless API key";
        exit;
    }

    $email_address = $env["TEMPLATELESS_EMAIL_ADDRESS"] ?? getenv("TEMPLATELESS_EMAIL_ADDRESS");
    if (!isset($email_address) || $email_address == '') {
        echo "Set TEMPLATELESS_EMAIL_ADDRESS to your own email address";
        exit;
    }

    $header = Collection::builder()
        ->text('# ExampleApp')
        ->build();

    $footer = Collection::builder()
        ->socials([
            new SocialItem(Service::TWITTER, "ExampleApp"),
            new SocialItem(Service::GITHUB, "ExampleApp"),
        ])
        ->link('Unsubscribe', 'https://example.com/unsubscribe?id=123')
        ->build();

    $content = Content::builder()
        ->header($header)
        ->text('Hello world')
        ->footer($footer)
        ->build();

    $email = Email::builder()
        ->to(new EmailAddress($email_address))
        ->subject("Confirm your email")
        ->content($content)
        ->build();

    $templateless = new Templateless($api_key);
    $result = $templateless->send($email);

    var_dump($result);
} catch (\Exception $e) {
    echo $e;
}
