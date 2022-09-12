<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no', 50);
            $table->foreignId('customer_id')
                ->constrained('customers')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('address');
            $table->text('shipping_address')->nullable();
            $table->decimal('sub_total', 18, 2)->default(0);
            $table->decimal('shipping_cost', 18, 2)->default(0);
            $table->string('payment_type')->nullable();
            $table->text('note')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
