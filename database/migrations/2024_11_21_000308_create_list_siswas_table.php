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
        Schema::create('list_students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->enum('classes', ["X", "XI", "XII"]);
            $table->enum('major', ["PPLG", "TJKT", "TKRO", "MPLB"]);
            $table->date("birth_date");
            $table->string("photo_profile");
            $table->string("photo_profile_name");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_students');
    }
};
