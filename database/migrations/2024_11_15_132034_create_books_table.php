<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('name'); // Kolom nama buku
            $table->string('author'); // Kolom penulis buku
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relasi dengan kategori
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
