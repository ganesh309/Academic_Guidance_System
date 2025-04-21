<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Mentor extends Authenticatable
{
    use HasFactory;
    protected $table = 'mentors';
    protected $primaryKey = 'id';
    protected $fillable = ['faculty_id','email', 'password', 'password_updated'];


    public function mentees()
    {
        return $this->hasMany(Mentee::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    

    public static function getFacultyData($email)
    {


        return DB::table('faculties')
            ->leftJoin('schools', 'faculties.school_id', '=', 'schools.id')
            ->where('faculties.email', $email)
            ->select('faculties.*', 'schools.name as school')
            ->first();
    }

    public static function getAllMentees($email)
    {
        $id = DB::table('mentors')->where('email', $email)->value('id');
        $mentees  =  DB::table('mentees as m')
            ->leftJoin('students as s', 's.id', '=', 'm.student_id')
            ->join('genders as g', 's.gender_id', '=', 'g.id')
            ->join('degrees as d', 's.degree_id', '=', 'd.id')
            ->join('semesters as sm', 's.semester_id', '=', 'sm.id')
            ->where('m.mentor_id', $id)
            ->select(
                'm.id',
                's.fname',
                's.lname',
                's.mobile',
                's.email',
                's.uid',
                'd.name as degree',
                'sm.name as semester',
                'g.name as gender'
            )
            ->get();
        return $mentees;
    }

    public static function submitNewInteraction($id, $data)
    {
        $data['mentee_id'] = $id;
        $inserted = DB::table('interactions')->insert($data);
        return $inserted;
    }

    public static function getAllInteractions($id)
    {

        $mentee = DB::table('mentees as m')
            ->join('students as s', 'm.student_id', '=', 's.id')
            ->join('batches as b', 's.batch_id', '=', 'b.id')
            ->join('semesters as sm', 's.semester_id', '=', 'sm.id')
            ->join('genders as g', 's.gender_id', '=', 'g.id')
            ->join('academics as a', 's.academic_id', '=', 'a.id')
            ->join('schools as sh', 's.school_id', '=', 'sh.id')
            ->join('degrees as d', 's.degree_id', '=', 'd.id')
            ->where('m.id', $id)
            ->select(
                'm.id as mentee_id',
                'm.email as email',
                's.fname as fname',
                's.lname as lname',
                's.uid as uid',
                's.mobile as mobile',
                'b.name as batch',
                'sm.name as semester',
                'g.name as gender',
                'a.name as academic',
                'sh.name as school',
                'd.name as degree',
                's.sgpa as sgpa'
            )
            ->first();

        $interactions = DB::table('interactions')->where('mentee_id', $id)->select('date')->get();
        return [
            'mentee' => $mentee,
            'interactions' => $interactions,
        ];
    }


    public static function submitEditedInteraction($mentee_id, $interaction_id, $date, $data)
    {
        Log::info("in the submitEditedInteraction model");
        $updated = DB::table('interactions')
            ->where('mentee_id', $mentee_id)
            ->where('id', $interaction_id)
            ->where('date', $date)
            ->update(
                [
                    'attendance'            => $data['attendance'],
                    'interaction'           => $data['interaction'],
                    'problem_understood'    => $data['problem_understood'],
                    'remedy'                => $data['remedy'],
                    'observation'           => $data['observation']
                ]
            );

        Log::info("Updated");
        return $updated;
    }
    public static function fetchInteractionData($mentee_id, $date)
    {
        return DB::table('interactions')
            ->where('mentee_id', $mentee_id,)->where('date', $date)
            ->first();
    }

    public static function getMenteeBasic($mentee_id)
    {

        $student_id = DB::table('mentees')->where('id', $mentee_id)->value('student_id');
        $menteeData = DB::table('students')->where('id', $student_id)->select(
            'fname as fname',
            'email as email',
            'uid as uid'
        )->first();
        return $menteeData;
    }

    public static function getMentorContact($mentor_email)
    {
        return DB::table('faculties')->where('email', $mentor_email)->value('mobile');
    }
}
