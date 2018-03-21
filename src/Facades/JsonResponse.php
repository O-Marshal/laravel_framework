<?php

namespace Ckryo\Framework\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\Response json($msg, $data, $code, $count = null)
 * @method static \Illuminate\Http\Response success($data = null)
 * @method static \Illuminate\Http\Response error($msg = 'OK', $code = 0, $data = null)
 * @method static \Illuminate\Http\Response page(\Illuminate\Database\Eloquent\Builder $sql, \Illuminate\Http\Request $request, \Closure $closure = null)
 *
 * Class JsonResponse
 * @package Ckryo\Framework\Facades
 */
class JsonResponse extends Facade {

    public static function getFacadeRoot() {
        return new JsonResponse();
    }

}
