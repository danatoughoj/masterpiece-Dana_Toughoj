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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->json('characteristics');
            $table->integer('price');
            $table->integer('in_stock');
            $table->integer('rating')->nullable();
            $table->unsignedInteger('sales_count')->default(0);
            $table->integer('rating_count')->nullable();
            $table->text('cover_image')->default('client/img/bg-img/placeholder.jpg');
            $table->dateTime('deleted_at')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
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
