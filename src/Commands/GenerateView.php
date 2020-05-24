<?php

namespace Fnoual\Generators\Commands;

use Illuminate\Console\Command;

class GenerateView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {path} {page_name?}';

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
        $path = $this->argument('path');
        $explodedPath = explode('.', $path);
        $path2 = array_pop($explodedPath);
        $check = implode("\\", $explodedPath);
        $final = $viewsPath . $check;
        $pageName = $this->argument('page_name');
        if (!file_exists($final)) {
            $viewsPath2 = resource_path() . '\views\\' . str_replace('.', '\\', $path) . '.blade.php';
            mkdir($final, 0, true);
            if(isset($pageName)){
                file_put_contents($viewsPath2, "@extends('layout.app',['page' => '" . $pageName . "'])");
            }
            else {
                file_put_contents($viewsPath2, "");
            }
        } else {
            $viewsPath2 = resource_path() . '\views\\' . str_replace('.', '\\', $path) . '.blade.php';
            if(isset($pageName)){
                file_put_contents($viewsPath2, "@extends('layout.app',['page' => '" . $pageName . "'])");
            }
            else {
                file_put_contents($viewsPath2, "");
            }
        }

        $this->comment('Vue créée : <info>' . $viewsPath2 . '</info>');
    }
}
