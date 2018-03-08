<?php

namespace Ckryo\Framework\Support;

use Closure;
use Illuminate\Support\Arr;

trait CollectionDataHelper {


    function dataGet($key, $default = null) {

        if (is_null($key)) {
            return $this;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        $target = $this;

        while (! is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return $default instanceof Closure ? $default() : $default;
                }

                $result = Arr::pluck($target, $key);

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if ($target instanceof Collection && isset($target->{$segment})) {
                $target = $target->{$segment};
            } elseif (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } else {
                return $default instanceof Closure ? $default() : $default;
            }
        }

        return $target;

    }



}