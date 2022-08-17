<?php

use App\Models\Content;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 60);
            $table->string('phone', 20);
            $table->string('address');
            $table->text('short_details')->nullable();
            $table->text('map_address')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        // create default one 
        $content = new Content();
        $content->name = 'Leona';
        $content->email = 'contact@ourdomain.com';
        $content->phone = '+7365 127 324';
        $content->address = 'Lambeth, London SE1';
        $content->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
