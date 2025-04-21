<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'department',
        'designation',
    ];

    public function mentors()
    {
        return $this->hasMany(Mentor::class);
    }
}
