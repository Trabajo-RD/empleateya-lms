<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\DashboardController;
use App\Http\Controllers\Instructor\InstructorDashboard;
use App\Http\Controllers\Instructor\Dashboard\InstructorCourseController;
use App\Http\Controllers\Instructor\Dashboard\Courses\InstructorSectionController;
use App\Http\Controllers\Instructor\Dashboard\Courses\InstructorLessonController;
use App\Http\Controllers\Instructor\Dashboard\Courses\LessonContentController;
use App\Http\Controllers\Instructor\Dashboard\Courses\UploadScormController;
use App\Http\Controllers\Instructor\Dashboard\Courses\SectionScormController;
use App\Http\Livewire\Instructor\Courses\Sections\Scorms\SectionScorms;

use App\Http\Controllers\Instructor\Dashboard\InstructorWorkshopController;
use App\Http\Controllers\Instructor\Dashboard\Workshops\InstructorActivityController;
use App\Http\Controllers\Instructor\Dashboard\Workshops\InstructorTaskController;

use App\Http\Controllers\Instructor\Dashboard\InstructorPathController;
use App\Http\Controllers\Instructor\Dashboard\InstructorModuleController;
use App\Http\Controllers\Instructor\Dashboard\Modules\InstructorUnitController;

use App\Http\Livewire\Instructor\InstructorCourses;
use App\Http\Controllers\Dashboard\HomeController;

use App\Http\Livewire\Instructor\Courses\CoursesIndex;
use App\Http\Livewire\Instructor\Paths\LearningPathsIndex;
use App\Http\Livewire\Instructor\Workshops\WorkshopsIndex;

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\LearningPathController;
use App\Http\Controllers\Instructor\MicrosoftController;
use App\Http\Controllers\Instructor\LinkedinController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use App\Http\Controllers\Instructor\TestController;
use App\Http\Controllers\TopicController;

// use App\Http\Controllers\Instructor\HomeController;

//use App\Http\Livewire\InstructorCourses;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect: if prefix instructor. exists and user access with domain.com/instructor
// Route::redirect('', 'instructor/courses');


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    // Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::get('instructor/dashboard', [InstructorDashboard::class, 'index'])->name('instructor.dashboard');

    // Route::get('courses', CourseController::class);

    // Route::get('courses', CourseController::class)->name('instructor.courses.index');

    // Route::get('courses', CourseController::class)->middleware('can:create-course')->name('instructor.courses.index');

    /** Courses Routes */

    Route::get('instructor/courses', CoursesIndex::class)->name('instructor.courses.index');
    Route::get('instructor/dashboard/courses', [InstructorCourseController::class, 'index'])->name('instructor.dashboard.courses.index');
    Route::get('instructor/dashboard/courses/{course}/show', [InstructorCourseController::class, 'show'])->name('instructor.dashboard.courses.show');
    Route::get('instructor/dashboard/courses/create', [InstructorCourseController::class, 'create'])->name('instructor.dashboard.courses.create');
    Route::post('instructor/dashboard/courses/store', [InstructorCourseController::class, 'store'])->name('instructor.dashboard.courses.store');
    Route::match(['put', 'patch'], 'instructor/dashboard/courses/{course}/update', [InstructorCourseController::class, 'update'])->name('instructor.dashboard.courses.update');
    Route::get('instructor/dashboard/courses/{course}/edit', [InstructorCourseController::class, 'edit'])->name('instructor.dashboard.courses.edit');
    Route::delete('instructor/dashboard/courses/{course}/destroy', [InstructorCourseController::class, 'destroy'])->name('instructor.dashboard.courses.destroy');
    
    Route::get('instructor/dashboard/courses/{course}/settings', [InstructorCourseController::class, 'settings'])->name('instructor.dashboard.course.settings');
    Route::get('topics-by-category', [TopicController::class, 'getByCategory'])->name('getTopicsByCategory');
    
    /** Sections Routes */

    Route::get('instructor/dashboard/courses/{course}/sections', [InstructorSectionController::class, 'index'])->name('instructor.dashboard.courses.sections.index');
    Route::get('instructor/dashboard/courses/{course}/sections/create', [InstructorSectionController::class, 'create'])->name('instructor.dashboard.courses.sections.create');
    Route::post('instructor/dashboard/courses/sections/store', [InstructorSectionController::class, 'store'])->name('instructor.dashboard.courses.sections.store');
    Route::get('instructor/dashboard/courses/sections/{section}/edit', [InstructorSectionController::class, 'edit'])->name('instructor.dashboard.courses.sections.edit');
    Route::match(['put', 'patch'], 'instructor/dashboard/courses/sections/{section}/update', [InstructorSectionController::class, 'update'])->name('instructor.dashboard.courses.sections.update');
    Route::delete('instructor/dashboard/courses/sections/{section}/destroy', [InstructorSectionController::class, 'destroy'])->name('instructor.dashboard.courses.sections.destroy');

    /** Lessons Routes */

    Route::get('instructor/dashboard/courses/sections/{section}/lessons', [InstructorLessonController::class, 'index'])->name('instructor.dashboard.courses.sections.lessons.index');
    Route::get('instructor/dashboard/courses/sections/{section}/lessons/create', [InstructorLessonController::class, 'create'])->name('instructor.dashboard.courses.sections.lessons.create');
    Route::post('instructor/dashboard/courses/sections/lessons/store', [InstructorLessonController::class, 'store'])->name('instructor.dashboard.courses.sections.lessons.store');
    Route::get('instructor/dashboard/courses/sections/lessons/{lesson}/edit', [InstructorLessonController::class, 'edit'])->name('instructor.dashboard.courses.sections.lessons.edit');
    Route::match(['put', 'patch'], 'instructor/dashboard/courses/sections/lessons/{lesson}/update', [InstructorLessonController::class, 'update'])->name('instructor.dashboard.courses.sections.lessons.update');
    Route::delete('instructor/dashboard/courses/sections/lessons/{lesson}/destroy', [InstructorLessonController::class, 'destroy'])->name('instructor.dashboard.courses.sections.lessons.destroy');

    /** SCORM Routes */

    Route::get('instructor/dashboard/courses/sections/{section}/scorm', [SectionScormController::class, 'index'])->name('instructor.dashboard.courses.sections.scorm.index');
    Route::get('instructor/dashboard/courses/sections/{section}/scorm/create', [SectionScormController::class, 'create'])->name('instructor.dashboard.courses.sections.scorm.create');
    Route::post('instructor/dashboard/courses/sections/{section}/scorm/store', [SectionScormController::class, 'store'])->name('instructor.dashboard.courses.sections.scorm.store');
    Route::get('instructor/dashboard/courses/sections/scorm/{scorm}/show', [SectionScormController::class, 'show'])->name('instructor.dashboard.courses.sections.scorm.show');
    Route::get('instructor/dashboard/courses/sections/scorm/{scorm}/edit', [SectionScormController::class, 'edit'])->name('instructor.dashboard.courses.sections.scorm.edit');
    Route::match(['put', 'patch'], 'instructor/dashboard/courses/sections/scorm/{scorm}/update', [SectionScormController::class, 'update'])->name('instructor.dashboard.courses.sections.scorm.update');
    Route::delete('instructor/dashboard/courses/sections/scorm/{scorm}/destroy', [SectionScormController::class, 'destroy'])->name('instructor.dashboard.courses.sections.scorm.destroy');




                /*****************************************
                 *  COURSE - SECTION - LESSONS|SCORMS - CONTENT
                 *****************************************/

                Route::get('instructor/dashboard/courses/sections/lessons/{lesson}/content', [LessonContentController::class, 'index'])->name('instructor.dashboard.courses.sections.lessons.content.index');



    /**
     * Route to display the diferent platform options to create a course
     */
    Route::get('instructor/courses/new', [CourseController::class, 'new'])->name('instructor.courses.new');


    /**
     * Route to manage another platform courses [Microsoft, Linkedin]
     */
    // Route::get('creator/courses/microsoft/create', [CourseController::class, 'createMicrosoftLearnCourse'])->name('courses.microsoft.create');
    Route::resource('instructor/microsoft/courses', MicrosoftController::class)->names('instructor.courses.microsoft');
    Route::resource('instructor/linkedin/courses', LinkedinController::class)->names('instructor.courses.linkedin');

    /**
     * Route for manage the course sections, lessons and lesson resources
     */
    Route::get('instructor/courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:update-course')->name('instructor.courses.curriculum');

    Route::get('instructor/courses/{course}/goals', [CourseController::class, 'goals'])->name('instructor.courses.goals');

    /**
     * Route for manage the course students
     */
    Route::get('instructor/courses/{course}/students', CoursesStudents::class)->middleware('can:update-course')->name('instructor.courses.students');

    /**
     * Route to request change course status
     */
    Route::post('instructor/courses/{course}/status', [CourseController::class, 'status'])->name('instructor.courses.status');

    /**
     * Route to display the observations in course info view
     */
    Route::get('instructor/courses/{course}/observation', [CourseController::class, 'observation'])->name('instructor.courses.observation');

    /**
     * Route to review the courses in revision status
     */
    Route::get('instructor/courses/{course}/preview', [CourseController::class, 'preview'])->name('instructor.courses.preview');





    /**********************************
     * LEARNING PATHS ROUTES
     **********************************/

    Route::get('instructor/paths', LearningPathsIndex::class)->name('instructor.learning-paths.index');
    Route::get('instructor/dashboard/paths', [InstructorPathController::class, 'index'])->name('instructor.dashboard.paths.index');
    Route::get('instructor/dashboard/paths/create', [InstructorPathController::class, 'create'])->name('instructor.dashboard.paths.create');
    Route::post('instructor/dashboard/paths/store', [InstructorPathController::class, 'store'])->name('instructor.dashboard.paths.store');
    Route::get('instructor/dashboard/paths/{path}/edit', [InstructorPathController::class, 'edit'])->name('instructor.dashboard.paths.edit');
    Route::get('instructor/dashboard/paths/{path}/destroy', [InstructorPathController::class, 'destroy'])->name('instructor.dashboard.paths.destroy');

    Route::get('instructor/dashboard/paths/{path}/modules', [InstructorPathController::class, 'getModules'])->name('instructor.dashboard.paths.modules.index');

    Route::get('test', [TestController::class, 'index'])->name('instructor.test');
    Route::post('test', [TestController::class, 'store'])->name('instructor.test.store');
    // Route::get('instructor/courses/{course}/{section}/test', [TestController::class, 'index'])->name('test');
    // Route::post('instructor/courses/{course}/{section}/test', [TestController::class, 'store'])->name('test.store');


        /**********************************
         *    LEARNING PATHS - MODULES
         **********************************/

        Route::get('instructor/dashboard/modules', [InstructorModuleController::class, 'index'])->name('instructor.dashboard.modules.index');
        Route::get('instructor/dashboard/modules/create', [InstructorModuleController::class, 'create'])->name('instructor.dashboard.modules.create');
        Route::post('instructor/dashboard/modules/store', [InstructorModuleController::class, 'store'])->name('instructor.dashboard.modules.store');
        Route::get('instructor/dashboard/modules/{module}/edit', [InstructorModuleController::class, 'edit'])->name('instructor.dashboard.modules.edit');
        Route::get('instructor/dashboard/modules/{module}/destroy', [InstructorModuleController::class, 'destroy'])->name('instructor.dashboard.modules.destroy');



        /**********************************
         *  LEARNING PATH - MODULES - UNITS
         **********************************/

        Route::get('instructor/dashboard/modules/units', [InstructorUnitController::class, 'index'])->name('instructor.dashboard.modules.units.index');
        Route::get('instructor/dashboard/modules/units/create', [InstructorUnitController::class, 'create'])->name('instructor.dashboard.modules.units.create');
        Route::post('instructor/dashboard/modules/units/store', [InstructorUnitController::class, 'store'])->name('instructor.dashboard.modules.units.store');
        Route::get('instructor/dashboard/modules/units/{unit}/edit', [InstructorUnitController::class, 'edit'])->name('instructor.dashboard.modules.units.edit');
        Route::get('instructor/dashboard/modules/units/{unit}/destroy', [InstructorUnitController::class, 'destroy'])->name('instructor.dashboard.modules.units.destroy');



    /**********************************
     * WORKSHOPS ROUTES
     **********************************/
    Route::get('instructor/workshops', WorkshopsIndex::class)->name('instructor.workshops.index');
    Route::get('instructor/dashboard/workshops', [InstructorWorkshopController::class, 'index'])->name('instructor.dashboard.workshops.index');
    Route::get('instructor/dashboard/workshops/create', [InstructorWorkshopController::class, 'create'])->name('instructor.dashboard.workshops.create');
    Route::post('instructor/dashboard/workshops/store', [InstructorWorkshopController::class, 'store'])->name('instructor.dashboard.workshops.store');
    Route::get('instructor/dashboard/workshops/{workshop}/edit', [InstructorWorkshopController::class, 'edit'])->name('instructor.dashboard.workshops.edit');
    Route::get('instructor/dashboard/courses/{workshop}/destroy', [InstructorWorkshopController::class, 'destroy'])->name('instructor.dashboard.workshops.destroy');

        /**********************************
         * WORKSHOPS - ACTIVITIES ROUTES
         **********************************/

        Route::get('instructor/dashboard/workshops/activities/create', [InstructorActivityController::class, 'create'])->name('instructor.dashboard.workshops.activities.create');
        Route::post('instructor/dashboard/workshops/activities/store', [InstructorActivityController::class, 'store'])->name('instructor.dashboard.workshops.activities.store');

            /*****************************************
             * WORKSHOPS - ACTIVITIES - TASKS ROUTES
             *****************************************/

            Route::get('instructor/dashboard/workshops/activities/tasks/create', [InstructorTaskController::class, 'create'])->name('instructor.dashboard.workshops.activities.tasks.create');
            Route::post('instructor/dashboard/workshops/activities/tasks/store', [InstructorTaskController::class, 'store'])->name('instructor.dashboard.workshops.activities.tasks.store');

});


/**
 * Route to request Microsoft Learn and LinkedIn Learning API
 */
Route::post('instructor/courses/microsoft/request', [MicrosoftController::class, 'requestCourseData'])->name('instructor.courses.microsoft.request');

Route::post('instructor/courses/linkedin/request', [LinkedinController::class, 'requestCourseData'])->name('instructor.courses.linkedin.request');
