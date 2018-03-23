<?php

namespace Ckryo\Framework;

use Illuminate\Database\Eloquent\Relations\Relation;

trait DataBaseModuleRelation {

    /**
     * @param string $relationName
     * @return Relation
     */
    protected abstract function getModelRelation(string $relationName);

    public function createUnion(string $unionName, array $unionParams) {
        $this->getModelRelation($unionName)->create($unionParams);
        return $this;
    }

    public function createUnionMany(string $unionName, array $unions) {
        foreach ($unions as $union) {
            $this->getModelRelation($unionName)->create($union);
        }
        return $this;
    }

    public function createUnions(array $unions, bool $isMany = false) {
        foreach ($unions as $key => $union) {
            if ($isMany) {
                $this->createUnionMany($key, $union);
            } else {
                $this->createUnion($key, $union);
            }
        }
        return $this;
    }

    public function updateUnion(string $unionName, array $unionParams, $where = []) {
        $this->getModelRelation($unionName)->where($where)->update($unionParams);
        return $this;
    }

    public function deleteUnion(string $unionName, $where = []) {
        $this->getModelRelation($unionName)->where($where)->delete();
        return $this;
    }

}