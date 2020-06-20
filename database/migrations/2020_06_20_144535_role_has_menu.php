<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoleHasMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_menus', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->index()->comment('角色id');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->bigInteger('menu_id')->unsigned()->index()->comment('栏目id');
            // $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
