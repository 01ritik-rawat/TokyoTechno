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
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->integer('sub_total')->comment('sub-total amount');
            $table->integer('tax_rate')->default(0)->comment(' tax percentage');
            $table->integer('total_tax')->default(0)->comment(' total tax ');
            $table->integer('delivery_charges')->comment(' delivery charges');
            $table->string('currency',10)->default('INR')->nullable()->comment('currency used for txn');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('sub_total');
            $table->dropColumn('tax_rate');
            $table->dropColumn('total_tax');
            $table->dropColumn('delivery_charges');
            // $table->dropColumn('currency');
        });
    }
};
