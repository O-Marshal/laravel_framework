<?php

namespace Ckryo\Framework\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Ckryo\Framework\DataBaseModule find($where, $with = [])
 * @method static \Ckryo\Framework\DataBaseModule create(array $params)
 * @method static \Ckryo\Framework\DataBaseModule delete($where)
 *
 * @method static \Illuminate\Database\Eloquent\Builder getModelQuery()
 *
 * Class JsonResponse
 * @package Ckryo\Framework\Facades
 */
abstract class DataBaseModuleFacade extends Facade {}
