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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_detail_id')->nullable()->constrained('pet_details')->onDelete('cascade');
            $table->string('vaccine_name')->nullable();
            $table->date('vaccination_exp_date')->nullable();
            $table->string('vaccine_manufacture')->nullable();
            $table->string('batch_number')->nullable();
            $table->date('date_administered');
            $table->string('next_due_date')->nullable();
            $table->string('dosage')->nullable();
            $table->string('administration_method')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccinations');
    }
};
