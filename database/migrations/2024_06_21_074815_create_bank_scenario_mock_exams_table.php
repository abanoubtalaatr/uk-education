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
        Schema::create('bank_scenario_mock_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_scenario_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mock_exam_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_scenario_mock_exams');
    }
};
