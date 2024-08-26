<?php

use App\Enums\BooleanEnum;
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
        Schema::create('donation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('text_color')->nullable();
            $table->string('background_color')->nullable();
            $table->boolean('is_active')->default(BooleanEnum::true->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_types');
    }
};
