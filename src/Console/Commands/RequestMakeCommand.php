<?php

namespace Ckryo\Framework\Console\Commands;

use Illuminate\Foundation\Console\RequestMakeCommand as BaseCommand;

class RequestMakeCommand extends BaseCommand {

    protected function getDefaultNamespace($rootNamespace) {
        return $rootNamespace.'\Requests';
    }

    protected function getStub() {
        return realpath(__DIR__ . '/../stubs/request.stub');
    }
}
