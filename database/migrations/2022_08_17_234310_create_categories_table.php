<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('ip')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        // create default one 
        $category = new Category();
        $category->name = 'Imaginary Worlds';
        $category->title = 'Unvisited Places Await';
        $category->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
