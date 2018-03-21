<?php

namespace Ckryo\Framework\Exceptions;

use Ckryo\Framework\Contracts\ExceptionResponseable;
use Ckryo\Framework\Facades\JsonResponse;

abstract class Exception extends \Exception implements ExceptionResponseable {

    public function toResponse() {
        return JsonResponse::error($this->getMessage(), $this->getCode());
    }

}