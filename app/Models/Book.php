<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Tentukan kolom mana yang dapat diisi
    protected $fillable = ['name', 'author', 'category_id'];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class); // Relasi belongsTo ke model Category
    }

    public function loans()
{
    return $this->hasMany(Loan::class);
}

}
