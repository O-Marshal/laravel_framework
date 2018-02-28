<?php

namespace Ckryo\Framework\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseCommand;
use Illuminate\Support\Str;

class ModelMakeCommand extends BaseCommand
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    protected function getStub() {
        return realpath(__DIR__ . '/../stubs/model.stub');
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace() {
        return $this->laravel->getNamespace() . 'Models\\';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name) {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->laravel->path('Models').'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name) {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        $stub = str_replace('DummyClass', $class, $stub);

        $tableName = $this->getTableName($name);

        return str_replace('DummyTableNameProperty', $tableName, $stub);
    }

    private function getTableName($name) {
        $namespace = array_last(explode('\\', $name));

        if (strtolower(substr($namespace, -5)) === 'model') {
            $namespace = substr($namespace, 0, -5);
        }

        return str_replace('\\', '', Str::snake(Str::plural($namespace)));
    }

    private function camelToUnderScore($str) {
        $dstr = preg_replace_callback('/([A-Z]+)/',function($matchs)
        {
            return '_'.strtolower($matchs[0]);
        },$str);
        return trim(preg_replace('/_{2,}/','_',$dstr),'_');
    }

}
