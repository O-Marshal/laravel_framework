<?php

namespace Ckryo\Framework\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model {

    protected $guarded = [];

    public $timestamps = false;

    public function getForeignKey() {
        $className = Str::snake(class_basename($this));
        if (substr($className, -6) === '_model') {
            $className = substr($className, 0, -6);
        }
        return $className . '_' . $this->primaryKey;
    }

}
