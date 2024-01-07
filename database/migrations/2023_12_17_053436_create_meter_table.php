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
        Schema::create('meter', function (Blueprint $table) {
            $table->id();
            $table->string('MID')->unique();
            $table->foreignId('rate_id')->constrained(
                table: 'rate',
                indexName: 'id',
            )->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->decimal('present_reading', 18, 10)->default(0.00000000);
            $table->decimal('previous_reading', 18, 10)->default(0.00000000);
            $table->string('PIN')->unique();
            $table->string('Owner');
            $table->string('Address');
            $table->timestamps();
            $table->index('MID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meter');
    }
};
