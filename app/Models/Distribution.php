<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Distribution extends Model
{
    use HasFactory;

    public function book(): BelongsTo
    {
        // Каждая запись выдачи связана с одной книгой
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function reader(): BelongsTo
    {
        // Каждая запись выдачи связана с одним читателем
        // Предполагая, что `reader_id` - это внешний ключ, указывающий на пользователя, который взял книгу
        return $this->belongsTo(User::class, 'reader_id');
    }
}
