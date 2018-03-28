<?php

namespace Ckryo\Framework\Exceptions;

use Ckryo\Framework\Contracts\ExceptionResponseable;
use Ckryo\Framework\Facades\JsonResponse;
use Illuminate\Http\Request;

class Exception extends \Exception implements ExceptionResponseable {

    protected $code = 1;

    protected $detail;

    public function __construct(\Exception $exception) {
        $this->message = '服务器响应失败';
        $this->details = [
            'code' => $exception->getCode(),
            'msg' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine()
        ];
    }

    protected function getDetail() {
        return $this->details ?? null;
    }

    public function toResponse(Request $request = null) {
        return JsonResponse::error($this->getMessage(), $this->getCode(), $this->getDetail());
    }

}