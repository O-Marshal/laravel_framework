<?php

namespace Ckryo\Framework\Exceptions;

class MethodUndefinedException extends Exception {

    protected $code = 502;

    public function __construct(string $method, string $className = null) {
        if (is_null($className)) {
            $this->message = "[{$method}] Is Not Defined !";
        } else {
            $this->message = "[{$className}@{$method}] Is Not Defined !";
        }
    }
}
