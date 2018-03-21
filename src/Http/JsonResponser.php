<?php

namespace Ckryo\Framework\Http;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait JsonResponser {

    public function json ($msg, $data, $code, $count = null) {
        $results = [
            'errCode' => $code,
            'errMsg' => $msg,
            'data' => $data
        ];
        if (!is_null($count)) $results['count'] = $count;
        return response()->json($results, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function error ($msg = 'OK', $code = 0, $data = null) {
        return $this->json($msg, $data, $code);
    }

    public function success ($data = null) {
        return $this->json('OK', $data, 0);
    }

    public function page (Builder $sql, Request $request, \Closure $closure = null) {
        $limit = $request->get('limit', 10);
        $page = $request->get('page', 1);
        $skip = $limit * (intval($page) - 1);
        $count = $sql->count();
        $datas = $sql->skip($skip)->take($limit)->get();
        if ($closure) {
            $datas = $datas->map($closure);
        }
        return $this->json('OK', $datas, 0, $count);
    }

}