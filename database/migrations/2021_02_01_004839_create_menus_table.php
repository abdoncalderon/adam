<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('text');
            $table->string('route')->nullable();
            $table->string('icon')->deafult('fa fa-circle-o');
            $table->string('father')->nullable();
            $table->boolean('isActive')->default(true);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
