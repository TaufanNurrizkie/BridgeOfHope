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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Judul campaign
            $table->text('description'); // Deskripsi campaign
            $table->decimal('target_amount', 15, 2); // Target donasi
            $table->date('deadline'); // Tenggat waktu campaign
            $table->string('image_path')->nullable(); // Path gambar campaign
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status pengajuan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
