<?php

namespace Ckryo\Framework\Http;

use Closure;
use Illuminate\Database\Eloquent\Model;

class TransactionMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function handle($request, Closure $next) {
        $conn = Model::resolveConnection();
        return $conn->transaction(function () use ($request, $next) {
            return $next($request, $next);
        });
    }
}
