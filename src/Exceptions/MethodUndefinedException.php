<?php

namespace Ckryo\Framework\Exceptions;

use Exception;

class MethodUndefinedException extends Exception
{
    //

    protected $code = 500;

    public function __construct($method, $className = null)
    {
        if (is_null($className)) {
            $this->message = "[{$method}] Is Not Defined !";
        } else {
            $this->message = "[{$className}@{$method}] Is Not Defined !";
        }
    }
}
