<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tablePrefix = config('zijinhua_rbac.table_prefix', '');
        Schema::create($tablePrefix.'_routes', function (Blueprint $table) {
            $table->primary('id');
            $table->uuid('uuid');

            $table->string('route_name');
            $table->string('route_key');
            $table->string('route_type')->comment('api or web');
            $table->string('request_method')->comment('get, post, put or delete');
            $table->string('policy')->nullable()->comment('policy class');
            $table->string('ability')->nullable()->comment('policy ability, defualt controller action name');
            $table->string('route_desc');

            $table->unique('route_key');
            $table->timestamp();
        });

        Schema::create($tablePrefix.'_route_permissions', function (Blueprint $table) {
            $table->integer('route_id', false, true);
            $table->foreign('route_id')->references($tablePrefix.'_routes')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
