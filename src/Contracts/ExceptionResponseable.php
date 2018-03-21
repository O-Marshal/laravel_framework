<?php

namespace Ckryo\Framework\Contracts;

use Illuminate\Http\Response;

interface ExceptionResponseable {

    /**
     * @return Response
     */
    public function toResponse();

}