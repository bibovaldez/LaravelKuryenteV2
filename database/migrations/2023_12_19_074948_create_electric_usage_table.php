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
        Schema::create('electric_usage', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('meter_id')->constrained('meter')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('usage', 18, 10)->default(0.00000000);
            $table->timestamp('recorded_at');
            $table->index('meter_id');
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electric_usage');
    }
};
