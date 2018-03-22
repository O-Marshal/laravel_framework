<?php

namespace Ckryo\Framework\Models;

trait CommonAttribue {

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'detail_info' => 'array'
    ];

}