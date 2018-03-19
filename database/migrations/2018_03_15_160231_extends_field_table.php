<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendsFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
     Schema::create('parameters', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('item_id')->unsigned()->index();
        $table->string('title');
        $table->string('unit');
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
        //
     Schema::drop('parameters');
    }
}
