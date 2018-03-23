<?php

namespace Ckryo\Framework\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as BaseCommand;

class ControllerMakeCommand extends BaseCommand {

    protected function getDefaultNamespace($rootNamespace) {
        return $rootNamespace.'\Controllers';
    }

    protected function getStub() {
        return realpath(__DIR__ . '/../stubs/controller.stub');
    }

}
