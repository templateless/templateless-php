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
use Templateless\Components\StoreBadgeItem;
use Templateless\Components\StoreBadge;

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

    $app_store_link = "https://apps.apple.com/us/app/example/id1234567890";
    $google_play_link = "https://play.google.com/store/apps/details?id=com.example";

    $footer = Collection::builder()
        ->store_badges([
            new StoreBadgeItem(StoreBadge::APP_STORE, $app_store_link),
            new StoreBadgeItem(StoreBadge::GOOGLE_PLAY, $google_play_link),
        ])
        ->socials([
            new SocialItem(Service::TWITTER, 'MyCo'),
            new SocialItem(Service::GITHUB, 'MyCo'),
        ])
        ->build();

    $content = Content::builder()
        ->theme(Theme::SIMPLE)
        ->header($header)
        ->text("Hey Alex,")
        ->text("Thank you for choosing MyCo! To get started with our mobile experience, simply pair your account with our mobile app.")
        ->text("Here's how to do it:")
        ->text(implode("\n", [
            "1. Download the MyCo app from the [App Store]($app_store_link) or [Google Play]($google_play_link).",
            "1. Open the app and select _Pair Device_.",
            "1. Scan the QR code below with your mobile device:",
        ]))
        ->qr_code("https://example.com/qr-code-link")
        ->text("Enjoy your seamless experience across devices!")
        ->footer($footer)
        ->build();

    $email = Email::builder()
        ->to(new EmailAddress($email_address))
        ->subject("How to Pair Device")
        ->content($content)
        ->build();

    $templateless = new Templateless($api_key);
    $templateless->send($email);
} catch (\Exception $e) {
    echo $e;
}
