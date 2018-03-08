<?php
/**
 * Created by PhpStorm.
 * User: ckryo
 * Date: 2018/2/26
 * Time: 15:04
 */

namespace Ckryo\Framework\Support;

use Illuminate\Support\Collection as LaravelCollection;

class Collection extends LaravelCollection
{

    use CollectionDataHelper;

}