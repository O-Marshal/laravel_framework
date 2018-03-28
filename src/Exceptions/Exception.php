<?php

namespace Ckryo\Framework\Exceptions;

use Ckryo\Framework\Contracts\ExceptionResponseable;
use Ckryo\Framework\Facades\JsonResponse;
use Illuminate\Http\Request;

abstract class Exception extends \Exception implements ExceptionResponseable {

    protected $details;

    protected function getDetails() {
        return $this->details ?? null;
    }

    public function toResponse(Request $request = null) {
        return JsonResponse::error($this->getMessage(), $this->getCode(), $this->getDetails());
    }

}