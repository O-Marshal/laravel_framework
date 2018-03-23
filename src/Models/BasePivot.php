<?php

namespace Ckryo\Framework\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BasePivot extends Pivot {

    use FractionAttribue;

    protected $guarded = [];

    public $timestamps = false;

    public function setAttribute($key, $value) {
        if ($this->isFraction($key)) {
            return $this->fractionAttribue($key, $value);
        }
        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key) {
        if ($this->isFraction($key)) {
            return $this->fractionAttribueValue($key);
        }
        return parent::getAttribute($key);
    }

}
