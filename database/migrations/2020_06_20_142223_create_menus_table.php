<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedTinyInteger('parent_id')->comment('菜单关系');
            $table->string('name')->comment('菜单名称');
            $table->string('icon')->comment('图标');
            $table->string('url')->comment('菜单链接地址');
            $table->string('active')->comment('菜单高亮地址');
            $table->timestamps();
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
