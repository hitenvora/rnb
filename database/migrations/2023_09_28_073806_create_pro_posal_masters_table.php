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
            $table->unsignedBigInteger('district_id')->nullable();
         
            $table->unsignedBigInteger('taluka_id')->nullable();
        
            $table->unsignedBigInteger('work_type_id')->nullable();
       
            $table->text('types_of_work')->nullable();
            $table->text('type_work')->nullable();

            $table->unsignedBigInteger('type_work_id')->nullable();
         
            $table->unsignedBigInteger('budget_id')->nullable();
       
            $table->string('budget')->nullable();
            $table->unsignedBigInteger('budget_work_id')->nullable();
            // $table->foreign('budget_work_id')->references('id')->on('budget_works');
            $table->string('budget_work')->nullable();
            $table->string('amount')->nullable();
            $table->unsignedBigInteger('mp_mla_id')->nullable();
          
            $table->string('mp_mla')->nullable();
            $table->text('letter_no')->nullable();
            $table->date('letter_date')->nullable();
            $table->string('upload_img')->nullable();
            $table->string('suggest')->nullable();
            $table->string('recever_from')->nullable();
            $table->text('rec_letter_no')->nullable();
            $table->date('rec_letter_date')->nullable();
            $table->text('rec_letter_amount')->nullable();
            $table->string('sent_proposal')->nullable();
            $table->text('sent_proposal_letter_no')->nullable();
            $table->date('sent_proposal_date')->nullable();
            $table->text('sent_proposal_amount')->nullable();
            $table->unsignedBigInteger('sent_box_id')->nullable();
            // $table->foreign('sent_box_id')->references('id')->on('sent_boxes');
            $table->string('sent_box')->nullable();
            $table->date('sent_box_date')->nullable();
            $table->string('sent_box_remark')->nullable();







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
