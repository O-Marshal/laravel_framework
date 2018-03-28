<?php

namespace Ckryo\Framework\Exceptions;

use Illuminate\Validation\ValidationException;

class HttpFormValidationException extends Exception {

    protected $code = 2;

    public function __construct(ValidationException $exception) {
        $errorBag = $exception->validator->errors();
        $errors = [];
        foreach ($errorBag->messages() as $key => $message) {
            $errors[$key] = $message[0];
        }
        $this->message = $errorBag->first();
        $this->details = $errors;
    }
}
