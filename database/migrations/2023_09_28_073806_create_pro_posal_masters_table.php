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
        Schema::create('pro_posal_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('taluka_id');
            $table->unsignedBigInteger('work_type_id');
            $table->unsignedBigInteger('type_work_id');
            $table->string('type_work');
            $table->unsignedBigInteger('budget_id');
            $table->string('budget');
            $table->unsignedBigInteger('budget_work_id');
            $table->string('budget_work');
            $table->string('amount');
            $table->unsignedBigInteger('mp_mla_id');
            $table->string('mp_mla'); 
            $table->bigInteger('letter_no');
            $table->date('letter_date');
            $table->string('upload_img');
            $table->string('suggest');
            $table->string('recever_from');
            $table->bigInteger('rec_letter_no');
            $table->date('rec_letter_date');
            $table->bigInteger('rec_letter_amount');
            $table->string('sent_proposal');
            $table->bigInteger('sent_proposal_letter_no');
            $table->date('sent_proposal_date');
            $table->bigInteger('sent_proposal_amount');
            $table->unsignedBigInteger('sent_box_id');
            $table->string('sent_box');
            $table->date('sent_box_date');
            $table->string('sent_box_remark');



            



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_posal_masters');
    }
};
