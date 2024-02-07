# Templateless PHP

[![Latest Version](https://badgen.net/packagist/v/templateless/templateless)](https://packagist.org/packages/templateless/templateless)
[![Build Status](https://badgen.net/github/checks/templateless/templateless-php?label=build&icon=github)](https://github.com/templateless/templateless-php/actions)
[![Monthly Downloads](https://badgen.net/packagist/dm/templateless/templateless)](https://packagist.org/packages/templateless/templateless/stats)

## What is Templateless?

[Templateless](https://templateless.com) lets you generate and send transactional emails quickly and easily so you can ship faster 🚀

## ✨ Features

- 👋 **Anti drag-and-drop by design** — emails are a part of your code
- ✅ **Components as code** — function calls turn into email HTML components
- 💻 **SDK for any language** — use your favorite [programming language](https://github.com/orgs/templateless/repositories)
- 🔍 **Meticulously tested** — let us worry about email client compatibility
- 💌 **Use your favorite ESP** — Amazon SES, SendGrid, Mailgun + more
- 💪 **Email infrastructure** — rate-limiting, retries, scheduling + more
- ⚡ **Batch sending** — send 1 email or 1,000 with one API call

## 🚀 Getting started

Require this package, with [Composer](https://getcomposer.org), in the root directory of your project.

```bash
composer require templateless/templateless
```

Then you can import the class into your application:

```php
use Templateless\Templateless;
$templateless = new Templateless();
```

## 👩‍💻 Quick example

This is all it takes to send a signup confirmation email:

```php
<?php

require 'vendor/autoload.php';

use Templateless\Content;
use Templateless\Email;
use Templateless\EmailAddress;
use Templateless\Templateless;

try {
    $content = Content::builder()
        ->text("Hi, please **confirm your email**:")
        ->button("Confirm Email", "https://your-company.com/signup/confirm?token=XYZ")
        ->build();

    $email = Email::builder()
        ->to(EmailAddress::new("<YOUR_CUSTOMERS_EMAIL_ADDRESS>"))
        ->subject("Confirm your signup 👋")
        ->content($content)
        ->build();

    $result = Templateless::new("<YOUR_API_KEY>")
        ->send($email);

    var_dump($result);
} catch (\Exception $e) {
    echo $e;
}
```

Note:

1. Get your **free API key** here: <https://app.templateless.com> ✨
1. There are more PHP examples in the [examples](examples) folder

    - For example: `php examples/simple.php`

## 🤝 Contributing

- Contributions are more than welcome <3
- Please **star this repo** for more visibility ★

## 📫 Get in touch

- For customer support feel free to email us at [github@templateless.com](mailto:github@templateless.com)

- Have suggestions or want to give feedback? Here's how to reach us:

    - For feature requests, please [start a discussion](https://github.com/templateless/templateless-php/discussions)
    - Found a bug? [Open an issue!](https://github.com/templateless/templateless-php/issues)
    - We are also on Twitter: [@Templateless](https://twitter.com/templateless)

## 🍻 License

[MIT](LICENSE)