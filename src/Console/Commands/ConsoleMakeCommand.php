<?php

namespace Ckryo\Framework\Console\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as BaseCommand;

class ConsoleMakeCommand extends BaseCommand
{

    protected function getStub() {
        return realpath(__DIR__ . '/../stubs/console.stub');
    }

}
