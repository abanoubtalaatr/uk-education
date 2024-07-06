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
        Schema::table('videos', function (Blueprint $table) {
            $table->dropForeign(['subscription_id']);

            // Drop the column
            $table->dropColumn('subscription_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            // Add the column back
            $table->unsignedBigInteger('subscription_id');

            // Add the foreign key constraint back
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        });
    }
};
