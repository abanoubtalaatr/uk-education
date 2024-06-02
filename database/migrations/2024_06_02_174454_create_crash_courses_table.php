<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrashCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('crash_courses', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->string('link');
            $table->date('date');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('crash_courses');
    }
}
