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
        Schema::create('entity_names', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the council, e.g., "Kinondoni"
            $table->string('region'); // Region where the council is located, e.g., "Dar es Salaam"
            $table->text('description')->nullable(); // Brief description of the council
            $table->string('contact_email')->nullable(); // Contact email for the council
            $table->string('contact_phone')->nullable(); // Contact phone number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entity_names');
    }
};
