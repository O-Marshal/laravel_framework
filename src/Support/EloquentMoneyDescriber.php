<?php

namespace Ckryo\Framework\Support;

trait EloquentMoneyDescriber {

    protected $attributes = [];

    protected $moneyAttributes = [
        'price', 'price_original'
    ];

    public function setAttribute($key, $value) {
        if (in_array($key, $this->moneyAttributes)) {
            $this->attributes[$key] = intval(floatval($value) * 1000);
        } else {
            $this->attributes[$key] = $value;
        }
    }

    public function getAttribute($key) {
        $value = parent::getAttribute($key);
        if (in_array($key, $this->moneyAttributes)) {
            return floatval(intval($value) / 1000);
        }
        return $value;
    }
}