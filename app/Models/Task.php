<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    // Görevin hangi kullanıcıya ait olduğunu belirten ilişki
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
