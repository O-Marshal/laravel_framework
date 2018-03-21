<?php

namespace Ckryo\Framework\Support;

use Ckryo\Framework\Exceptions\InvalidArgumentException;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;

trait EloquentCommonDescriber {

    use HasAttributes;

    /**
     * @param $value
     * @throws InvalidArgumentException
     */
    public function setDetailInfoAttribute($value) {
        if (!is_array($value) || count($value) === 0) {
            throw new InvalidArgumentException('detail_info is invalid !');
        }
        $this->attributes['detail_info'] = json_encode($value);
    }

    public function getDetailInfoAttribute($value) {
        return json_decode($value);
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