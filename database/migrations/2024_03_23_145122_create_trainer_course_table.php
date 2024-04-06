<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public $timestamps=false;

    public function up(): void
    {
        Schema::create('trainer_course', function (Blueprint $table)
         {
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('course_id');
            $table->boolean('is_creator')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainer_course');
    }
};
