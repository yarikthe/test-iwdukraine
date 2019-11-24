<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $modules = config("module.modules");


            if($modules) { 
                while (list(,$module) = each($modules)){ 
                //Подключаем роуты для модуля 
                 if(file_exists(__DIR__.'/'.$module.'/Routes/routes.php')) { 

                    $this->loadRoutesFrom(__DIR__.'/'.$module.'/Routes/routes.php');
                 }
                 //Загружаем View
                 //view('TestLukyanchuk::admin')
                 if(is_dir(__DIR__.'/'.$module.'/Views')) {

                     $this->loadViewsFrom(__DIR__.'/'.$module.'/Views', $module);
                 }
                 //Подгружаем миграции
                 if(is_dir(__DIR__.'/'.$module.'/Migration')) {

                     $this->loadMigrationsFrom(__DIR__.'/'.$module.'/Migration');
                 }

             }
         }
     }

}
