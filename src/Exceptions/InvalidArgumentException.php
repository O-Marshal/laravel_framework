<?php

namespace Ckryo\Framework\Exceptions;

class InvalidArgumentException extends Exception {

    protected $code = 501;

    public function __construct(string $paramName = "") {
        $this->message = $paramName . ' is invalid !';
    }

}