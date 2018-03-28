<?php

namespace Ckryo\Framework\Http;

use Illuminate\Http\Request as BaseRequest;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends BaseRequest {

    /**
     * @param SymfonyRequest $request
     * @return Request
     */
    public static function createFromBase(SymfonyRequest $request) {
        if ($request instanceof static) {
            return $request;
        }

        $content = $request->content;

        $request = (new static)->duplicate(
            $request->query->all(), $request->request->all(), $request->attributes->all(),
            $request->cookies->all(), $request->files->all(), $request->server->all()
        );

        $request->content = $content;

        $request->request = $request->getInputSource();

        return $request;
    }

    /**
     * 判断需要 json 响应
     *
     * @return bool
     */
    public function jsonResponse() {
        return $this->header('content-type') === 'application/json' || $this->ajax() || $this->has('json');
    }
}
