<?php

namespace Ckryo\Framework\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BasePivot extends Pivot {

    protected $guarded = [];

    public $timestamps = false;

}
