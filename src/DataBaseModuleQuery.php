<?php

namespace Ckryo\Framework;

use Ckryo\Framework\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;

trait DataBaseModuleQuery {

    /**
     * @return Builder
     */
    public abstract function getModelQuery();

    public abstract function setBaseModel(BaseModel $model);

    public function find(array $where, $with = []) {
        $model = $this->getModelQuery()->with($with)->where($where)->take(1)->first();
        $this->setBaseModel($model);
        return $this;
    }

    public function create(array $params) {
        $model = $this->getModelQuery()->create($params);
        $this->setBaseModel($model);
        return $this;
    }

    public function update($wheres, array $params) {
        $this->getModelQuery()->where($wheres)->update($params);
        return $this;
    }

    public function delete($where) {
        $this->getModelQuery()->where($where)->delete();
        return $this;
    }


}