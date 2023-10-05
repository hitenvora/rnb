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
        Schema::create('project_sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_id')->nullable();
            $table->foreign('master_id')->references('id')->on('masters');
            $table->string('sr_no');
            $table->string('project_name');
            $table->string('start_date');
            $table->string('p1');
            $table->string('p2');
            $table->string('p3');
            $table->string('p4');
            $table->string('p5');
            $table->string('p6');
            $table->string('p7');
            $table->string('p8');
            $table->string('p9');
            $table->string('p10');
            $table->string('p11');
            $table->string('p12');
            $table->string('p13');
            $table->string('p14');
            $table->string('p15');
            $table->string('p16');
            $table->string('p17');
            $table->string('p18');
            $table->string('p19');
            $table->string('p20');
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_sheets');
    }
};
