<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('address');
            $table->string('phone',16);
            $table->string('email',50);
            $table->string('alt_phone',10)->nullable();
            $table->integer('total_amount')->default(0)->comment('grand total / final paid amount');
            $table->enum('order_status',['canceled','inprogress','completed','failed'])->default('inprogress');
            $table->string('payment_method',30);
            $table->enum('payment_status',['not_initialized ','completed','failed','inprogress'])->default('not_initialized');
            $table->timestamps();  
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
