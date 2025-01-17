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
        Schema::create('calendar_days', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('day_date');
            $table->foreignId('clinic_id')->constrained()->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_days');
    }
};
