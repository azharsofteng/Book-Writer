<?php

use App\Models\About;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('cover_letter');
            $table->text('biography');
            $table->text('about_books')->nullable();
            $table->text('want_meet')->nullable();
            $table->text('inspiration')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('image')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });

        // create default one 
        $about = new About();
        $about->name = 'Gloria Reynolds';
        $about->cover_letter = 'test cover letter';
        $about->biography = 'test biography here';
        $about->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
