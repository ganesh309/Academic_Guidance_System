<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Mentee extends Authenticatable
{
    use HasFactory;
    protected $table = 'mentees';
    protected $primaryKey = 'id';
    protected $fillable = ['student_id', 'email', 'password', 'password_updated', 'mentor_id'];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public static function getStudentData($email)
    {
        return DB::table('students')
            ->leftJoin('academics', 'students.academic_id', '=', 'academics.id')
            ->leftJoin('schools', 'students.school_id', '=', 'schools.id')
            ->leftJoin('degrees', 'students.degree_id', '=', 'degrees.id')
            ->leftJoin('semesters', 'students.semester_id', '=', 'semesters.id')
            ->leftJoin('genders', 'students.gender_id', '=', 'genders.id')
            ->leftJoin('countries', 'students.country_id', '=', 'countries.id')
            ->leftJoin('states', 'students.state_id', '=', 'states.id')
            ->leftJoin('districts', 'students.district_id', '=', 'districts.id')
            ->leftJoin('batches', 'students.batch_id', '=', 'batches.id')
            ->where('students.email', $email)
            ->select(
                'students.*',
                'academics.name as academic_name',
                'schools.name as school_name',
                'degrees.name as degree_name',
                'semesters.name as semester_name',
                'batches.name as batch_name',
                'genders.name as gender_name',
                'countries.name as country_name',
                'states.name as state_name',
                'districts.name as district_name'
            )
            ->first();
    }

    public static function getAllInteractions($mentee_id)
    {
        $mentor_id = DB::table('mentees')
            ->where('id', $mentee_id)
            ->value('mentor_id');

        $mentor = DB::table('mentors as m')
            ->join('faculties as f', 'm.faculty_id', '=', 'f.id')
            ->join('schools as s', 'f.school_id', '=', 's.id')
            ->select(
                'm.id as mentor_id',
                'm.email as email',
                'f.fname as fname',
                'f.lname as lname',
                's.name as school',
                'f.mobile as mobile'
            )
            ->where('m.id', $mentor_id)
            ->first();

        $interactions = DB::table('interactions')->where('mentee_id', $mentee_id)->select('date')->get();
        return [
            'mentor' => $mentor,
            'interactions' => $interactions,
        ];
    }

    public static function fetchInteractionData($mentee_id, $date)
    {
        return DB::table('interactions')
            ->where('mentee_id', $mentee_id,)->where('date', $date)
            ->first();
    }
}
