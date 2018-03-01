<?php

namespace Ckryo\Framework\Console\Commands;

use Illuminate\Console\Command;

class ModuleInitCommand extends Command
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:init {namespace?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'module init';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $namespace = $this->getModuleNameSpace();

        // 重新配置 composer
        $this->composerRewrite($namespace);

        $src_path = $this->laravel->basePath('src/');
        if (!is_dir($src_path)) {
            mkdir($src_path);
        }
        $this->comment("module:init done!");
    }


    /**
     * 获取项目命名空间
     *
     * @return string
     */
    private function getModuleNameSpace(): string {
        $namespace = $this->argument('namespace');
        if (is_null($namespace)) {
            $module_path = $this->laravel->basePath();
            $namespace = array_last(explode('/', $module_path));
        }

        $namespace = ucwords($namespace, '-_/\\');

        $namespace = preg_replace_callback('/([-_]+([a-z]{1}))/i', function($matches) {
            return strtoupper($matches[2]);
        }, $namespace);

        $p_str = explode('/', str_replace(['/', '\\'], '/', $namespace));
        $p_arr = array_filter($p_str, function ($p) {
            return $p !== '';
        });

        return implode('\\', $p_arr);
    }




    private function composerRewrite(string $namespace)
    {
        $composer_file = $this->laravel->basePath('composer.json');

        $re_str = str_replace(
            '"Module\\\\": "src/"',
            $this->composerNamespaceFormatter($namespace),
            file_get_contents($composer_file)
        );

        $res_str = str_replace('"type": "project"', '"type": "library"', $re_str);

        file_put_contents($composer_file, $res_str);
    }

    private function composerNamespaceFormatter(string $namespace)
    {
        return '"' . str_replace('\\', '\\\\', $namespace) . '\\\\": "src/"';
    }
}
