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
        ->text("If you did not sign up for a MyCo account, please ignore this email.\nThis link will expire in 24 hours.")
        ->socials([
            new SocialItem(Service::TWITTER, 'MyCo'),
            new SocialItem(Service::GITHUB, 'MyCo'),
        ])
        ->link('Unsubscribe', 'https://example.com')
        ->build();

    $verify_email_link = 'https://example.com/verify?token=ABC';

    $content = Content::builder()
        ->theme(Theme::SIMPLE)
        ->header($header)
        ->text("Hi there,")
        ->text("Welcome to **MyCo**! We're excited to have you on board. Before we get started, we need to verify your email address.")
        ->text("Please confirm your email by clicking the button below:")
        ->button("Verify Email", $verify_email_link)
        ->text("Or use the link below:")
        ->link($verify_email_link, $verify_email_link)
        ->footer($footer)
        ->build();

    $email = Email::builder()
        ->to(new EmailAddress($email_address))
        ->subject("Confirm your email")
        ->content($content)
        ->build();

    $templateless = new Templateless($api_key);
    $templateless->send($email);
} catch (\Exception $e) {
    echo $e;
}
