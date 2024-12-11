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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); // ID buku yang dipinjam
            $table->string('borrower'); // Nama peminjam
            $table->date('borrow_date'); // Tanggal peminjaman
            $table->date('return_date')->nullable(); // Tanggal pengembalian, bisa kosong
            $table->timestamps();
            $table->dropForeign(['book_id']); // Hapus foreign key
    
            // Foreign key untuk relasi ke tabel books
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        
        });
        Schema::dropIfExists('loans');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
