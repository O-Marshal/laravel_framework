<?php

namespace Ckryo\Framework\Contracts;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface ExceptionResponseable {


    /**
     * @param Request|null $request
     * @return Response
     */
    public function toResponse(Request $request = null);

}