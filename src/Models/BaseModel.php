<?php

namespace Ckryo\Framework\Models;

use Ckryo\Framework\Exceptions\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model {

    use FractionAttribue;

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'detail_info' => 'array'
    ];

    public function getForeignKey() {
        $className = Str::snake(class_basename($this));
        if (substr($className, -6) === '_model') {
            $className = substr($className, 0, -6);
        }
        return $className . '_' . $this->primaryKey;
    }

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

    /**
     * @param $value
     * @throws InvalidArgumentException
     */
    public function setPhotoAlbumsAttribute($value) {
        if (!is_array($value) || count($value) === 0) {
            throw new InvalidArgumentException('photo_albums is invalid !');
        }
        $this->attributes['photo_preview'] = $value[0];
        $this->attributes['photo_albums'] = json_encode($value);
    }

    public function getPhotoAlbumsAttribute($value) {
        return json_decode($value);
    }

}
