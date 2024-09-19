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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            $table->string('deskripsi');
            $table->date('tahunmulai');
            $table->date('tahunselesai');
            $table->string('institusi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman');
    }
};
