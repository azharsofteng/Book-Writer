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
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 18,2)->default(0.00);
            $table->float('discount')->nullable();
            $table->float('quantity')->nullable();
            $table->string('image');
            $table->string('writer', 60)->nullable();
            $table->string('writer_image')->nullable();
            $table->text('short_details');
            $table->text('details')->nullable();
            $table->tinyInteger('is_feature')->nullable();
            $table->string('ip')->nullable();
            $table->softDeletes();
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
