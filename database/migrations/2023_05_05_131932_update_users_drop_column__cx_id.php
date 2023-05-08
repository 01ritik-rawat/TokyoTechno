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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('customer_id');
            $table->dropUnique(['email']); // droping the unique constraint on email column
            $table->string('email',50)->change();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('customer_id')->unique()->nullable()->startingValue(100);
            $table->string('email',50)->unique();
            
        });
    }
};
