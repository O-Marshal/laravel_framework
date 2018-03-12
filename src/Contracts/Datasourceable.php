<?php

namespace Ckryo\Framework\Contracts;

/**
 * 实现数据相关操作的必要功能
 *
 * Interface Datasourceable
 * @package Journey\Resource\Contracts
 */
interface Datasourceable
{
    public function with(array $params);

    public function join(array $params);

    public function where(array $params);

    public function limit(array $params);

    public function order(array $params);

    public function get(array $params);

    public function create(array $params);

    public function update(array $params);

    public function delete();

}