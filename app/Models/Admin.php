<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin'; // Specify the correct table

    protected $fillable = ['email', 'password'];

    protected $hidden = ['password'];


public static function getMenteeInteractions($mentee_id)
{
    // Fetch student details
    $student = DB::table('mentees as m')
        ->join('students as s', 'm.student_id', '=', 's.id')
        ->join('schools as sh', 's.school_id', '=', 'sh.id')
        ->join('degrees as d', 's.degree_id', '=', 'd.id')
        ->join('academics as a', 's.academic_id', '=', 'a.id')
        ->join('semesters as sm', 's.semester_id', '=', 'sm.id')
        ->select(
            's.fname as student_first_name',
            's.lname as student_last_name',
            's.mobile as student_mobile',
            's.email as student_email',
            'sm.name as current_semester',
            'd.name as current_degree',
            'sh.name as current_school',
            'a.name as current_academic_year'
        )
        ->where('m.id', $mentee_id)
        ->first();

    $student_info = "Make a summary on the following description about a mentees overall progress. Keep it in easy to understand language. Keep maximum 150 words short in the result. try to avoid redundent words. ";
    // $student_info .= " Student Name: {$student->student_first_name} {$student->student_last_name}";
    // $student_info .= ", Semester: {$student->current_semester}";
    // $student_info .= ", Degree: {$student->current_degree}";
    $student_info .= ".";
    

    $interactions = DB::table('interactions')
        ->where('mentee_id', $mentee_id)
        ->select(
            'date',
            'interaction',
            'problem_understood',
            'remedy',
            'observation'
        )
        ->orderBy('date')
        ->get();

    foreach ($interactions as $i) {
        $student_info .= ". On Date: {$i->date}";
        $student_info .= ", {$i->interaction}";
        $student_info .= ", {$i->problem_understood}";
        $student_info .= ", {$i->remedy}";
        $student_info .= ", {$i->observation}";
    }

    // dd($student_info);

            return [
            'student' => $student,
            'interaction' => $student_info,
        ];
}



    public static function cleanMenteeData($rawText, $studentName, $semester, $program) {

    $rawText = strtolower($rawText);


    $lines = explode('.', $rawText);
    $uniqueLines = array_unique(array_filter(array_map('trim', $lines)));


    $interactions = implode('. ', $uniqueLines) . '.';


    $summarySeed = ucfirst($studentName) . ", a student of " . $program . " in semester " . $semester . ", conducted multiple mentee sessions. " . ucfirst($interactions);

    return $summarySeed;
}

}
