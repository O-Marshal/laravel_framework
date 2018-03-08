<?php

namespace Ckryo\Framework;

use RuntimeException;
use Illuminate\Foundation\Application as LaravelApplication;

class Application extends LaravelApplication {

    public function path($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'src'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function bootstrapPath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'bootstrap'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function configPath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'bootstrap/config'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function storagePath()
    {
        return $this->storagePath = $this->basePath.DIRECTORY_SEPARATOR.'bootstrap/storage';
    }

    public function resourcePath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'bootstrap/resources'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    public function environmentPath()
    {
        return $this->environmentPath = $this->basePath.DIRECTORY_SEPARATOR.'bootstrap';
    }

    public function getNamespace()
    {
        if (! is_null($this->namespace)) {
            return $this->namespace;
        }

        $composer = json_decode(file_get_contents($this->basePath('composer.json')), true);

        foreach ((array) data_get($composer, 'autoload.psr-4') as $namespace => $path) {
            foreach ((array) $path as $pathChoice) {
                if ($this->path() === $this->basePath(substr($pathChoice, 0, -1))) {
                    return $this->namespace = $namespace;
                }
            }
        }

        throw new RuntimeException('Unable to detect application namespace.');
    }

}