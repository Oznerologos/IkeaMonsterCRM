<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->float('price');
            $table->string('name');
            $table->float('promotion')->nullable();
            $table->enum('category', ['lounge', 'toilet', 'bedroom', 'office', 'kitchen']);
            $table->enum('color', ['blue', 'red', 'brown', 'black', 'yellow', 'orange', 'green']);
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
        Schema::dropIfExists('products');
    }
}
