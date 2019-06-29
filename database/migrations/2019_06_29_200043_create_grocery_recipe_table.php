<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroceryRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grocery_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('grocery_id');
            $table->unsignedInteger('recipe_id');

            $table->timestamps();

            $table->foreign('grocery_id')->references('id')->on('groceries')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grocery_recipe');
    }
}
