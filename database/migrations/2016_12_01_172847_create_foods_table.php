<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('Food_Name');
            $table->integer('meal_id')->unsigned();
            $table->tinyInteger('Protein')->unsigned()->index();
            $table->tinyInteger('Carbohydrates')->unsigned()->index();
            $table->tinyInteger('Fat')->unsigned()->index();
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
        Schema::drop('foods');
    }
}
