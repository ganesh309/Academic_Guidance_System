<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MenteeController;




Route::get('/', function () {
    return view('welcome');
});

// ===================================== Admin =====================================================================================

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/students-list', [AdminController::class, 'studentsList'])->name('students.index');
Route::get('/students/{student}/attendance-chart', [AdminController::class, 'attendanceChart']);



// Mentees List Route
Route::get('/mentees-list', [AdminController::class, 'menteesList'])->name('mentees.index');
Route::get('/mentor-mentees', [AdminController::class, 'mentorMenteeList'])->name('mentormentees.index');


Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/assign-mentor', [AdminController::class, 'assignMentor'])->name('assign.mentor');










// ===================================== Mentor =====================================================================================

Route::get('/mentor/login', [MentorController::class, 'showLoginForm'])->name('mentor.login');
Route::post('/mentor/login', [MentorController::class, 'login']);
Route::get('/mentor/update-password', [MentorController::class, 'showUpdatePasswordForm'])->name('mentor.update-password');
Route::post('/mentor/update-password', [MentorController::class, 'savePassword'])->name('mentor.save-password');

Route::get('/mentor/dashboard', [MentorController::class, 'mentorDashBoard'])->name('mentor.dashboard');
Route::get('/mentor/mentees', [MentorController::class, 'showInMentees'])->name('mentor.mentees');
Route::get('/mentor/interaction', [MentorController::class, 'showInteractionForm'])->name('mentor.interaction');

Route::get('/mentor/newinteraction/{id}', [MentorController::class, 'showNewInteractionForm'])->name('new-interaction');
Route::post('/mentor/submitNewinteraction/{id}', [MentorController::class, 'submitNewInteractionForm'])->name('submit-new-interaction');
Route::get('/mentor/viewInteractions/{id}', [MentorController::class, 'viewInteractions'])->name('view-interactions');
Route::get('/fetch-interaction/{mentee_id}', [MentorController::class, 'fetchInteraction'])->name('interactions.fetch');
Route::get('/mentor/editInteraction/{mentee_id}/{interaction_id}/{date}', [MentorController::class, 'ShoweditInteractionForm'])->name('edit-interactions');
Route::post('/mentor/submitEditedinteraction/{mentee_id}/{interaction_id}/{date}', [MentorController::class, 'submitEditedInteractionForm'])->name('submit-edited-interaction');
Route::post('/mentor/setAppointment/{id}', [MentorController::class, 'setAppointmentWithMentee'])->name('set-appointment');
// Route::get('/mentor/sendAppointment/{id}', [MentorController::class, 'sendAppointmentWithMail'])->name('send-appointment');


Route::get('/mentor/logout', [MentorController::class, 'logout'])->name('mentor.logout');



// ======================================== Mentee ==================================================================================

Route::get('/mentee/login', [MenteeController::class, 'showLoginForm'])->name('mentee.login');
Route::post('/mentee/login', [MenteeController::class, 'login']);
Route::get('/mentee/update-password', [MenteeController::class, 'showUpdatePasswordForm'])->name('mentee.update-password');
Route::post('/mentee/update-password', [MenteeController::class, 'savePassword'])->name('mentee.save-password');
Route::get('/mentee/dashboard', [MenteeController::class, 'menteeDashBoard'])->name('mentee.dashboard');
Route::get('/mentee/interaction', [MenteeController::class, 'showInteractionForm'])->name('mentee.interaction');


Route::get('/mentee/logout', [MenteeController::class, 'logout'])->name('mentee.logout');

