<?php

namespace Templateless\Errors;

class Error extends \Exception
{
    private string $field;
    private BadRequestCode $bad_request_code;
    private string $bad_request_error;
    private string $error;

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function setField($field): string
    {
        $this->field = $field;
    }
    public function getField(): string
    {
        return $this->field;
    }

    public function setBadRequestCode($bad_request_code)
    {
        $this->bad_request_code = $bad_request_code;
    }
    public function getBadRequestCode(): BadRequestCode
    {
        return $this->bad_request_code;
    }

    public function setBadRequestError($bad_request_error)
    {
        $this->bad_request_error = $bad_request_error;
    }
    public function getBadRequestError(): string
    {
        return $this->bad_request_error;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
