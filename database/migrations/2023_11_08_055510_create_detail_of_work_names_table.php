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
        Schema::create('detail_of_work_names', function (Blueprint $table) {
            $table->id();
            $table->text('current_repairs_id')->nullable();
            $table->text('dow_name_road')->nullable();
            $table->text('dow_catogry')->nullable();
            $table->text('dow_chainge_to')->nullable();
            $table->text('dow_chainge_from')->nullable();
            $table->text('dow_type_of_work')->nullable();
            $table->text('dow_bill_amt')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_of_work_names');
    }
};
