<?php

namespace Ckryo\Framework;

use RuntimeException;
use Illuminate\Foundation\Application as LaravelApplication;

class Application extends LaravelApplication {

    public function path($path = '')
    {
        return realpath(__DIR__ . '/../src').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function bootstrapPath($path = '')
    {
        return $this->basePath.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function getNamespace()
    {
        if (! is_null($this->namespace)) {
            return $this->namespace;
        }

        $composer = json_decode(file_get_contents(base_path('/../composer.json')), true);

        foreach ((array) data_get($composer, 'autoload.psr-4') as $namespace => $path) {
            foreach ((array) $path as $pathChoice) {
                dump(base_path());
                if (realpath(app_path()) == realpath(__DIR__ . '/../'.$pathChoice)) {
                    return $this->namespace = $namespace;
                }
            }
        }

        throw new RuntimeException('Unable to detect application namespace.');
    }

}