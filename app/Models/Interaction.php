<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    use HasFactory;

    protected $table = 'interactions'; // ensure this matches your actual table name

    protected $fillable = [
        'mentee_id',
        'mentor_id',
        'interaction_type',
        'notes',
        'date',
        // add other columns as needed
    ];
}
