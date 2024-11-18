<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_number');
            $table->string('block');
            $table->string('locality');
            $table->string('plan_number');
            $table->string('registered_town_plan_number');
            $table->decimal('legal_area', 10, 2);
            $table->string('district');
            $table->string('region');
            $table->string('drawing_number');
            $table->string('survey_type');
            $table->string('surveyor_name');
            $table->string('council');
            $table->decimal('price', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
