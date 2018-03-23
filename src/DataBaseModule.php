<?php

namespace Ckryo\Framework;

use Ckryo\Framework\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;

abstract class DataBaseModule {

    use DataBaseModuleQuery, DataBaseModuleRelation;

    /**
     * @var BaseModel
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $query;

    /**
     * @return BaseModel
     */
    protected abstract function getModel();

    /**
     * @return BaseModel
     */
    public function getBaseModel() {
        return $this->model ?: $this->getModel();
    }

    /**
     * @return Builder
     */
    public function getModelQuery() {
        return $this->query ?: $this->query = $this->getBaseModel()->newQuery();
    }

    protected  function getModelRelation(string $relationName) {
        return $this->getBaseModel()->{$relationName}();
    }

    /**
     * @param BaseModel $model
     */
    public function setBaseModel(BaseModel $model) {
        $this->model = $model;
    }


}