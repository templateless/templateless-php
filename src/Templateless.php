<?php

namespace Templateless;

use Templateless\Email;
use Templateless\Result;
use Templateless\Errors\Error;
use Templateless\Errors\ErrorType;
use Templateless\Errors\BadRequestCode;

class EmailResponse
{
    public $emails;

    public function __construct($emails)
    {
        $this->emails = $emails;
    }
}

class Templateless
{
    private $api_key;
    private $domain;

    public function __construct($api_key)
    {
        $this->api_key = $api_key;
        $this->domain = "https://api.templateless.com";
    }

    public function send($email)
    {
        return $this->sendMany([$email]);
    }

    public function sendMany($emails)
    {
        $client = new \GuzzleHttp\Client();

        try {
            $response = $client->post($this->domain . '/v1/emails', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->api_key,
                    'Referer' => 'templateless-php v0.1.0'
                ],
                'json' => ['payload' => $emails],
                'http_errors' => false,
            ]);
        } catch (\Exception $e) {
            throw new Error(ErrorType::UNKNOWN->value, 0, null);
        }

        $statusCode = $response->getStatusCode();
        if ($statusCode === 401) {
            throw new Error(ErrorType::UNAUTHORIZED->value, $statusCode, null);
        } elseif ($statusCode === 403) {
            throw new Error(ErrorType::FORBIDDEN->value, $statusCode, null);
        } elseif ($statusCode === 422) {
            $responseText = $response->getBody()->getContents();
            $invalidParameter = json_decode($responseText, true);
            if ($invalidParameter !== null && isset($invalidParameter['field'])) {
                $err = new Error(ErrorType::INVALID_PARAMETER->value, $statusCode, null);
                $err->setField($invalidParameter['field']);
                throw $err;
            } else {
                throw new Error(ErrorType::UNKNOWN->value, $statusCode, null);
            }
        } elseif ($statusCode === 400) {
            $responseText = $response->getBody()->getContents();
            $badRequest = json_decode($responseText, true);
            if ($badRequest !== null && isset($badRequest['code'], $badRequest['error'])) {
                $err = new Error(ErrorType::BAD_REQUEST->value, $statusCode, null);
                $err->setBadRequestCode($badRequest['code']);
                $err->setBadRequestError($badRequest['error']);
                throw $err;
            } else {
                throw new Error(ErrorType::UNKNOWN->value, $statusCode, null);
            }
        } elseif ($statusCode === 500) {
            throw new Error(ErrorType::UNAVAILABLE->value, $statusCode, null);
        } elseif ($statusCode === 200) {
            $responseText = $response->getBody()->getContents();
            $emailResponse = json_decode($responseText, true);
            if ($emailResponse !== null && isset($emailResponse['emails'])) {
                return new EmailResponse($emailResponse['emails']);
            } else {
                throw new Error(ErrorType::UNKNOWN->value, $statusCode, null);
            }
        } else {
            throw new Error(ErrorType::UNKNOWN->value, $statusCode, null);
        }
    }
}
