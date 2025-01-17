<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'publication_year'
    ];

    public function author()
    {
        return $this->hasManyThrough(
            '\App\Models\Autor',
            '\App\Models\BookAuthor',
            'book_id',
            'id',
            'id',
            'autor_id',
        );
    }
}
