<?php

namespace Fnoual\Generators;

use Fnoual\Generators\Commands\GenerateMultipleViews;
use Fnoual\Generators\Commands\GenerateView;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ViewgenServiceProvider extends BaseServiceProvider {


    public function boot()
    {
        $this->commands([
            GenerateView::class,
            GenerateMultipleViews::class,
        ]);
    }

    public function register()
    {

    }

}
