<?php

require_once './vendor/autoload.php';

use Templateless\Content;
use Templateless\Email;
use Templateless\EmailAddress;
use Templateless\Templateless;
use Templateless\Collection;
use Templateless\Theme;
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
        ->image('https://templateless.net/myco.webp', null, 100, null, 'MyCo')
        ->build();

    $footer = Collection::builder()
        ->socials([
            new SocialItem(Service::TWITTER, 'MyCo'),
            new SocialItem(Service::GITHUB, 'MyCo'),
        ])
        ->build();

    $content = Content::builder()
        ->theme(Theme::SIMPLE)
        ->header($header)
        ->text("Hey Alex,")
        ->text("I'm Jamie, founder of **MyCo**.")
        ->text("Could you spare a moment to reply to this email with your thoughts on our service? Your feedback is invaluable and directly influences our improvements.")
        ->text("When you hit reply, your email will go directly to me, and I read each and every one.")
        ->text("Thanks for your support,")
        ->signature("Jamie Parker")
        ->text("Jamie Parker\n\nFounder @ [MyCo](https://example.com)")
        ->footer($footer)
        ->build();

    $email = Email::builder()
        ->to(new EmailAddress($email_address))
        ->subject("Thoughts on service?")
        ->content($content)
        ->build();

    $templateless = new Templateless($api_key);
    $templateless->send($email);
} catch (\Exception $e) {
    echo $e;
}
