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
            $table->string('name',50);
            $table->bigInteger('desirable_price');
            $table->string('title_image',255);
            $table->text('description');
            $table->boolean('active');
            $table->bigInteger('start_price');
            $table->bigInteger('min_step_price');
            $table->bigInteger('highest_price');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('auction_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
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
