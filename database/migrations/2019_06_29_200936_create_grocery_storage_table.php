<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroceryStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grocery_storage', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('grocery_id');
            $table->unsignedBigInteger('storage_id');

            $table->unsignedInteger('quantity_in_stock')->default(0);
            $table->unsignedInteger('quantity_required')->default(0);

            $table->timestamps();

            $table->foreign('grocery_id')->references('id')->on('groceries')->onDelete('cascade');
            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grocery_storage');
    }
}
