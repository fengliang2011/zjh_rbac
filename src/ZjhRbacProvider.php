<?php
/**
 * Created by PhpStorm.
 * User: fengliang
 * Date: 2019-10-29
 * Time: 18:29
 */

namespace Zjh\Rbac;

use Laratrust\LaratrustServiceProvider;

class ZjhRbacProvider extends LaratrustServiceProvider
{
    public function boot()
    {
        parent::boot();
        $this->publishes([
            __DIR__.'/../config/laratrust.php' => config_path('laratrust.php'),
            __DIR__. '/../config/laratrust_seeder.php' => config_path('laratrust_seeder.php'),
        ], 'zijihua_rbac');


    }

    public function publishMigration()
    {
        
    }
}