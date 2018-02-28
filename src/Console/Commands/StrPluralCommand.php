<?php

namespace Ckryo\Framework\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class StrPluralCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'str:plural {word}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '英文单词转复数转换';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        //
        $word = $this->argument('word');
        $this->comment($word . ' => ' . Str::snake(Str::plural($word)));
    }
}
