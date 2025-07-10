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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            // Nama lengkap crew
            $table->string('name');

            // Jabatan atau peran (e.g., Staff, Manager)
            $table->string('position');

            // Foto profil (path ke storage)
            $table->string('photo')->nullable();

            // Link Instagram (atau sosial media lainnya)
            $table->string('instagram')->nullable();

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
