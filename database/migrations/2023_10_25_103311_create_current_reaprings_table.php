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
        Schema::create('current_reaprings', function (Blueprint $table) {
            $table->id();
            $table->text('cr_road_name')->nullable();
            $table->unsignedBigInteger('cr_division_id')->nullable();
            $table->text('cr_name_of_section')->nullable();
            $table->text('cr_start_date')->nullable();
            $table->text('cr_end_date')->nullable();
            $table->text('total_lentch')->nullable();
            $table->text('cr_catogry')->nullable();
            $table->unsignedBigInteger('cr_type_of_work_id')->nullable();
            //cr basic
            $table->text('cr_subdivision_to')->nullable();
            $table->text('cr_letter_date_name_of_section')->nullable();
            $table->text('cr_section')->nullable();
            $table->text('ct_tsi')->nullable();
            $table->text('ct_work')->nullable();
            $table->text('ct_ts_persual')->nullable();
            $table->text('ct_persual')->nullable();
            $table->text('ct_ts_no')->nullable();
            $table->text('ct_date')->nullable();
            $table->text('ct_letter_no')->nullable();
            $table->text('ct_amount')->nullable();
            $table->text('ct_leter_no')->nullable();
            $table->text('ct_persual_date')->nullable();
            $table->text('ct_persual_amount')->nullable();
            $table->unsignedBigInteger('cr_egncy_name')->nullable();

            //detils of work
            $table->text('cr_name_of_road')->nullable();
            $table->text('cr_type_work')->nullable();
            $table->text('cr_chainge')->nullable();
            $table->text('cr_chainge_to')->nullable();
            $table->text('cr_dow_bill_no')->nullable();
            $table->text('cr_dow_bill_date')->nullable();
            $table->text('cr_dow_bill_amount')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_reaprings');
    }
};
