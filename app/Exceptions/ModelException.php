<?php

namespace App\Exceptions;

use Exception;

class ModelException extends Exception
{
    protected $details;

    public function __construct(string $message, int $code = 0, $details = [])
    {
        parent::__construct($message, $code);
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }
}
