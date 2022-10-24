<?php

namespace Fnoual\Generators\Commands;

use Illuminate\Console\Command;

class GenerateMultipleViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:views {paths*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create view file';

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
     *
     * @return mixed
     */
    public function handle()
    {
        $viewsPath = resource_path() . '\views\\';
        $paths = $this->argument('paths');
        foreach($paths as $path) {
            $explodedPath = explode('.', $path);
            $check = implode("\\", $explodedPath);
            $final = $viewsPath . $check;
            if (!file_exists($final)) {
                $viewsPath2 = resource_path() . '\views\\' . str_replace('.', '\\', $path) . '.blade.php';
                mkdir($final, 0, true);
                file_put_contents($viewsPath2, "");
            } else {
                $viewsPath2 = resource_path() . '\views\\' . str_replace('.', '\\', $path) . '.blade.php';
                file_put_contents($viewsPath2, "");
            }

            $this->comment('View <info>'.$path.'</info> succefully created.');
        }

    }
}
