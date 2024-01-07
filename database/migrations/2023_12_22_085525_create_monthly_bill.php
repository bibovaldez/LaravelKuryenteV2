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
        Schema::create('monthly_bill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meter_id')->constrained('meter')->cascadeOnDelete()->cascadeOnUpdate();
            $table->char('year_month', 7);
            $table->decimal('bill_amount', 18, 10);
            $table->index('meter_id');
            $table->index('id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_bill');
    }
};
