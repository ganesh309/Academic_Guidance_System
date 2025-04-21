<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Batch extends Authenticatable
{
    use HasFactory;

    protected $table = 'batches'; // Specify the correct table

    protected $fillable = ['id', 'name'];
}
