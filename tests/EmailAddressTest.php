<?php

use Templateless\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function testJsonSerialize()
    {
        $email = 'john.doe@example.com';
        $name = 'John Doe';
        $emailAddress = new EmailAddress($email, $name);

        $expectedJson = json_encode([
            'name' => $name,
            'email' => $email,
        ]);

        $this->assertEquals($expectedJson, json_encode($emailAddress));
    }

    public function testJsonSerializeWithNullName()
    {
        $email = 'jane.doe@example.com';
        $emailAddress = new EmailAddress($email);

        $expectedJson = json_encode([
            'name' => null,
            'email' => $email,
        ]);

        $this->assertEquals($expectedJson, json_encode($emailAddress));
    }
}
