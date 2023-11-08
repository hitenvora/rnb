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
        Schema::create('reparing_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('current_reapring_id')->nullable();
            $table->foreign('current_reapring_id')->references('id')->on('current_reaprings');
            $table->string('bill_status')->nullable();
            $table->string('amount')->nullable();
            $table->string('bill_date')->nullable();
            $table->string('is_final',10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparing_bills');
    }
};
