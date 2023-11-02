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
        Schema::create('road_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('sub_division_id');
            $table->string('chainage_to');
            $table->string('total_length');
            $table->string('cat');
            $table->string('chainage_from')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('road_names');
    }
};
