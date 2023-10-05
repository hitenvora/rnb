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
        Schema::create('letter_reminder_masters', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('subject');
            $table->string('upload_img');
            $table->string('submit_to');
            $table->date('expire_date');
            $table->tinyInteger('is_active')->default(1)->comment('1=>Active, 0=>Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_reminder_masters');
    }
};
