<?php

namespace Ckryo\Framework\Http;

use Ckryo\Framework\Exceptions\MethodUndefinedException;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Routing\RouteDependencyResolverTrait;

class FormRequest extends BaseFormRequest
{

    use RouteDependencyResolverTrait;

    private $authorizeResult = true;

    private function setAuthorizeResult(bool $result) {
        $this->authorizeResult = $this->authorizeResult && $result;
    }

    /**
     * 需要授权验证的函数
     *
     * @return array
     */
    protected function authorizeMethods() {
        return [];
    }

    /**
     * @return bool
     * @throws MethodUndefinedException
     */
    public function authorize()
    {
        $route = $this->route();

        $routeParams = $route->parametersWithoutNulls();

        foreach ($this->authorizeMethods() as $method) {
            if ($this->authorizeResult) {
                $result = $this->callAction($method, $routeParams);
                $this->setAuthorizeResult($result);
            } else {
                break;
            }
        }

        return $this->authorizeResult;
    }

    /**
     * @param $method
     * @param $params
     * @return mixed
     * @throws MethodUndefinedException
     */
    protected function callAction($method, $params) {
        if (method_exists($this, $method)) {
            $parameters = $this->resolveClassMethodDependencies($params, $this, $method);
            return call_user_func_array([$this, $method], $parameters);
        }

        throw new MethodUndefinedException(static::class, $method);
    }
}
