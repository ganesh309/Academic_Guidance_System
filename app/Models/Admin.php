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

    $student_info = "Student Name: {$student->student_first_name} {$student->student_last_name}\n";
    $student_info .= "Mobile: {$student->student_mobile}\n";
    $student_info .= "Email: {$student->student_email}\n";
    $student_info .= "Semester: {$student->current_semester}\n";
    $student_info .= "Degree: {$student->current_degree}\n";
    $student_info .= "School: {$student->current_school}\n";
    $student_info .= "Academic Year: {$student->current_academic_year}\n";
    $student_info .= "-----------------------------\n";

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
        $student_info .= "Date: {$i->date}\n";
        $student_info .= "Interaction: {$i->interaction}\n";
        $student_info .= "Problem Understood: {$i->problem_understood}\n";
        $student_info .= "Remedy: {$i->remedy}\n";
        $student_info .= "Observation: {$i->observation}\n";
        $student_info .= "-----------------------------\n";
    }

    // dd($student_info);
    return $student_info;
}

}
