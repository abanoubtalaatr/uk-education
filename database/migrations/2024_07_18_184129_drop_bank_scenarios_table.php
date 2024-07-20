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
        Schema::drop('bank_scenario_mock_exams');
        Schema::dropIfExists('bank_scenarios');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_scenarios', function (Blueprint $table) {
            //
        });
    }
};
