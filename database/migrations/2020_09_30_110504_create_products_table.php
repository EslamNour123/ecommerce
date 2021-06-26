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
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('content_ar');
            $table->string('content_en');
            $table->integer('price');
            $table->integer('descount')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('slug');
            $table->integer('quantity');
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('category_id')->constrained('categories')->onDelete('CASCADE');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('CASCADE');
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
