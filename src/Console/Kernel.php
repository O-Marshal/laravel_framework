<?php

namespace Ckryo\Framework\Console;

use Ckryo\Framework\Console\Commands\ConsoleMakeCommand;
use Ckryo\Framework\Console\Commands\ControllerMakeCommand;
use Ckryo\Framework\Console\Commands\ModelMakeCommand;
use Ckryo\Framework\Console\Commands\RequestMakeCommand;
use Ckryo\Framework\Console\Commands\StrPluralCommand;
use Ckryo\Framework\Console\Commands\ModuleInitCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        ModuleInitCommand::class,
        StrPluralCommand::class,
        ConsoleMakeCommand::class,
        ControllerMakeCommand::class,
        RequestMakeCommand::class,
        ModelMakeCommand::class
    ];
}
