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
        Schema::create('consumer_lookups', function (Blueprint $table) {
            $table->id();
            $table->string('lookup_type',50);
            $table->string('lookup_Key',50);
            $table->json('lookup_value');
            $table->boolean('is_active')->default(1);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumer_lookups');
    }
};
