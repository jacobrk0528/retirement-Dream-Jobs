<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserMetas extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'dob',
        'quiz_results'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
