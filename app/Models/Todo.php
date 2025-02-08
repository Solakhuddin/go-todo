<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'id', 'user_id', 'judul', 'deskripsi', 'due_date', 'jam', 'is_done', 'kategori'
    ];
    protected $increment = true;
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory;
    // protected $primaryKey = "user_id";

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}
