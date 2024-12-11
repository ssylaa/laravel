<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menentukan atribut yang boleh diisi secara massal
    protected $fillable = ['name'];

    // Jika Anda ingin mendefinisikan relasi dengan produk
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
