<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TimeTableController;
use App\Http\Controllers\Admin\AssignMentController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\AnounceMentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AttendenceController;
use App\Http\Controllers\Admin\FeeTypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MarkController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/blog', [ContactController::class, 'blog'])->name('home.blog');
Route::get('/blog/show/{id}', [ContactController::class, 'blog_show'])->name('blog.show');
Route::get('/aboutus', [ContactController::class, 'about'])->name('home.aboutus');
Route::get('/gallery', [ContactController::class, 'galleries'])->name('home.gallery');
Route::get('/contact', [ContactController::class, 'contact'])->name('home.contact');
Route::post('/contact/store', [ContactController::class, 'contact_store'])->name('home.contact.store');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::middleware(['user'])->group(function() {
    Route::get('/account-dashboard', [UserController::class, 'index'])->name('user.index');
});

Route::middleware(['admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/teacher/index', [TeacherController::class, 'index'])->name('admin.teacher.index');
    Route::get('/admin/teacher/create', [TeacherController::class, 'create'])->name('admin.teacher.create');
    Route::post('/admin/teacher/store', [TeacherController::class, 'store'])->name('admin.teacher.store');
    Route::get('/admin/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('admin.teacher.edit');
    Route::put('/admin/teacher/update', [TeacherController::class, 'update'])->name('admin.teacher.update');
    Route::delete('/admin/teacher/{id}/delete', [TeacherController::class, 'delete'])->name('admin.teacher.delete');


    Route::get('/admin/student/index', [StudentController::class, 'index'])->name('admin.student.index');
    Route::get('/admin/student/create', [StudentController::class, 'create'])->name('admin.student.create');
    Route::post('/admin/student/store', [StudentController::class, 'store'])->name('admin.student.store');
    Route::get('/admin/student/edit/{id}', [StudentController::class, 'edit'])->name('admin.student.edit');
    Route::get('/admin/student/show/{id}', [StudentController::class, 'show'])->name('admin.student.show');
    Route::get('admin/student/{id}/marks', [StudentController::class, 'showMarks'])->name('admin.student.marks');
    Route::put('/admin/student/update', [StudentController::class, 'update'])->name('admin.student.update');
    Route::delete('/admin/student/{id}/delete',[StudentController::class, 'delete'])->name('admin.student.delete');
    Route::get('/admin/student/pdf', [StudentController::class, 'generatePDF'])->name('admin.student.pdf');

    Route::get('/admin/course/index', [CourseController::class, 'index'])->name('admin.course.index');
    Route::get('/admin/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/admin/course/store', [CourseController::class, 'store'])->name('admin.course.store');
    Route::get('/admin/course/edit/{id}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::put('/admin/course/update', [CourseController::class, 'update'])->name('admin.course.update');
    Route::delete('/admin/course/{id}/delete', [CourseController::class, 'delete'])->name('admin.course.delete');
    Route::get('admin/student/{id}/performance/pdf', [StudentController::class, 'downloadPerformanceStatement'])->name('admin.student.performance.pdf');
    Route::get('/admin/timetable/index', [TimeTableController::class, 'index'])->name('admin.timetable.index');
    Route::get('/admin/timetable/create', [TimeTableController::class, 'create'])->name('admin.timetable.create');
    Route::post('/admin/timetable/store', [TimeTableController::class, 'store'])->name('admin.timetable.store');
    Route::get('/admin/timetable/edit/{id}', [TimeTableController::class, 'edit'])->name('admin.timetable.edit');
    Route::put('/admin/timetable/update', [TimeTableController::class, 'update'])->name('admin.timetable.update');
    Route::delete('/admin/timetable/{id}/delete', [TimeTableController::class, 'delete'])->name('admin.timetable.delete');

    Route::get('/admin/assignment/index', [AssignMentController::class, 'index'])->name('admin.assignment.index');
    Route::get('/admin/assignment/create', [AssignMentController::class, 'create'])->name('admin.assignment.create');
    Route::post('/admin/assignment/store', [AssignMentController::class, 'store'])->name('admin.assignment.store');
    Route::get('/admin/assignment/edit/{id}', [AssignMentController::class, 'edit'])->name('admin.assignment.edit');
    Route::put('/admin/assignment/update', [AssignmentController::class, 'update'])->name('admin.assignment.update');
    Route::delete('/admin/assignment/{id}/delete', [AssignMentController::class, 'delete'])->name('admin.assignment.delete');

    Route::get('/admin/grade/index', [GradeController::class, 'index'])->name('admin.grade.index');
    Route::get('/admin/grade/create', [GradeController::class, 'create'])->name('admin.grade.create');
    Route::post('/admin/grade/store', [GradeController::class, 'store'])->name('admin.grade.store');
    Route::get('/admin/grade/edit/{id}', [GradeController::class, 'edit'])->name('admin.grade.edit');
    Route::put('/admin/grade/update', [GradeController::class, 'update'])->name('admin.grade.update');
    Route::delete('/admin/grade/{id}/delete', [GradeController::class, 'delete'])->name('admin.grade.delete');

    Route::get('/admin/announcement/index', [AnounceMentController::class, 'index'])->name('admin.announcement.index');
    Route::get('/admin/announcement/create', [AnounceMentController::class, 'create'])->name('admin.announcement.create');
    Route::post('/admin/announcement/store', [AnounceMentController::class, 'store'])->name('admin.announcement.store');
    Route::get('/admin/announcement/edit/{id}', [AnounceMentController::class, 'edit'])->name('admin.announcement.edit');
    Route::put('/admin/announcement/update', [AnounceMentController::class, 'update'])->name('admin.announcement.update');
    Route::delete('/admin/announcement/{id}/delete', [AnounceMentController::class, 'delete'])->name('admin.announcement.delete');

    Route::get('/admin/event/index', [EventController::class, 'index'])->name('admin.event.index');
    Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('/admin/event/store', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('/admin/event/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/admin/event/update', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('/admin/event/{id}/delete', [EventController::class, 'delete'])->name('admin.event.delete');

    Route::get('/admin/attendance/index', [AttendenceController::class, 'index'])->name('admin.attendance.index');
    Route::get('/admin/attendance/create', [AttendenceController::class, 'create'])->name('admin.attendance.create');
    Route::post('/admin/attendance/store', [AttendenceController::class, 'store'])->name('admin.attendance.store');
    Route::get('/admin/attendance/edit/{id}', [AttendenceController::class, 'edit'])->name('admin.attendance.edit');
    Route::put('/admin/attendance/update', [AttendenceController::class, 'update'])->name('admin.attendance.update');
    Route::delete('/admin/attendance/{id}/delete', [AttendenceController::class, 'delete'])->name('admin.attendance.delete');

    Route::get('/admin/feetype/index', [FeeTypeController::class, 'index'])->name('admin.feetype.index');
    Route::get('/admin/feetype/create', [FeeTypeController::class, 'create'])->name('admin.feetype.create');
    Route::post('/admin/feetype/store', [FeeTypeController::class, 'store'])->name('admin.feetype.store');
    Route::get('/admin/feetype/edit/{id}', [FeeTypeController::class, 'edit'])->name('admin.feetype.edit');
    Route::put('/admin/feetype/update', [FeeTypeController::class, 'update'])->name('admin.feetype.update');
    Route::delete('/admin/feetype/{id}/delete', [FeeTypeController::class, 'delete'])->name('admin.feetype.delete');

    Route::get('/admin/blogs/index', [BlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs/store', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/admin/blogs/update', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{id}/delete', [BlogController::class, 'delete'])->name('admin.blogs.delete');

    Route::get('/admin/gallery/index', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/admin/gallery/update', [GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/admin/gallery/{id}/delete', [GalleryController::class, 'delete'])->name('admin.gallery.delete');

    Route::get('/admin/marks/index', [MarkController::class, 'index'])->name('admin.marks.index');
    Route::get('/admin/marks/create', [MarkController::class, 'create'])->name('admin.marks.create');
    Route::post('/admin/marks/store', [MarkController::class, 'store'])->name('admin.marks.store');
    Route::get('/admin/marks/edit/{id}', [MarkController::class, 'edit'])->name('admin.marks.edit');
    Route::put('/admin/marks/update', [MarkController::class, 'update'])->name('admin.marks.update');
    Route::delete('/admin/marks/{id}/delete', [MarkController::class, 'delete'])->name('admin.marks.delete');


    
});
