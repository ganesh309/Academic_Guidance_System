<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname','lname', 'uid', 'academic_id', 'degree_id', 'gender_id', 
        'school_id', 'semester_id', 'country_id', 'state_id', 'district_id', 'sgpa'
    ];

    public function academic()
    {
        return $this->belongsTo(Academic::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }


    public function mentee()
{
    return $this->hasOne(Mentee::class);
}

}
