<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Ini akan membuat kolom 'id' sebagai primary key
            $table->string('name'); // Kolom 'name' untuk nama kategori
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
