<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/','admin\LoginController@showloginform')->name('showloginform')->middleware('AuthRedirect');

// Auth::routes();
 Route::post('/login','admin\LoginController@login')->name('admin.login');
 Route::post('/logout','admin\LoginController@logout')->name('admin.logout');

 Route::get('/home', 'HomeController@index')->name('admin.dashboard.home')->middleware('Admin');
 Route::post('/EditProfile/{id}','HomeController@edit')->name('editprofile');

Route::namespace('admin')->name('admin.')->middleware('Admin')->group(function()
{      
        //Students Routes//
        Route::get('/AddStudents', 'students\studentsController@create')->name('students.create');
        Route::get('/ShowStudents', 'students\studentsController@index')->name('students.index');
        Route::get('/ajax/getprogram','students\studentsController@findprogram');
        Route::post('/Students/store', 'students\studentsController@store')->name('students.store');
        Route::get('/ViewStudents/{student}', 'students\studentsController@view')->name('students.view');
        Route::get('/DeleteStudent/{id}', 'students\studentsController@destroy')->name('students.destroy');
        Route::get('/EditStudent/{id}', 'students\studentsController@edit')->name('students.edit');
        Route::post('/UpdateStudent/{id}', 'students\studentsController@update')->name('students.update');
        Route::post('/SearchStudents','students\studentsController@search')->name('students.search');



        //Notice Routes//
         Route::get('/AddNotice' ,'notice\noticeController@create')->name('notice.create');
         Route::get('/ViewNotices' ,'notice\noticeController@index')->name('notice.index');
         Route::post('PostNotice/store','notice\noticeController@store')->name('notice.store');
         Route::get('/EditNotice/{id}','notice\noticeController@edit')->name('notice.edit');
         Route::post('/UpdateNotice/{id}','notice\noticeController@update')->name('notice.update');
         Route::get('/DeleteNotice/{id}','notice\noticeController@destroy')->name('notice.destroy');


         //Assignment Routes//
         Route::get('/AddAssignment','assignment\assignmentController@create')->name('assignment.create');
         Route::get('/ShowAssignment','assignment\assignmentController@index')->name('assignment.index');
         Route::post('/PostAssignment/store','assignment\assignmentController@store')->name('assignment.store');
         Route::post('/SearchAssignment','assignment\assignmentController@searchassignment')->name('assignment.searchassignment');
         Route::get('/EditAssignment/{id}','assignment\assignmentController@edit')->name('assignment.edit');
         Route::post('/udateAssignment/{id}','assignment\assignmentController@update')->name('assignment.update');
         Route::get('/DeleteAssignment/{id}','assignment\assignmentController@destroy')->name('assignment.destroy');


        //Courses Routes//
        Route::get('/AddCourses','courses\coursesController@create')->name('courses.create');
        Route::get('/ShowCourses','courses\coursesController@index')->name('courses.index');
        Route::post('/StoreCourseCatogery/store','courses\coursesController@store')->name('courses.store');
        Route::post('/SearchCourseCatogey','courses\coursesController@searchtoinsertcourse')->name('courses.searchtoinsertcourse');
        Route::get('/ShowSubjectFields/{id}','courses\coursesController@showsubject')->name('courses.subject');
        Route::post('/StoreSubject/store','courses\coursesController@storesubject')->name('courses.storesubject');
        Route::get('/DeleteSubject/{id}','courses\coursesController@destroy')->name('courses.destroy');



        //Marks Routes//
        Route::get('/ShowMarks','marks\MarksController@searchmarks')->name('marks.view');
        Route::post('ViewMarks','marks\MarksController@viewmarks')->name('marks.searchmarks');
        Route::get('/InsertMarks','marks\MarksController@index')->name('marks.index');
        Route::post('/AddMarks','marks\MarksController@showmarksform')->name('marks.addmarks');
        Route::post('/Store/Marks','marks\MarksController@store')->name('marks.store');
        Route::Post('/EditMarks','marks\MarksController@edit')->name('marks.edit');
        Route::post('/UpdateMarks/Update','marks\MarksController@updatemarks')->name('marks.update');




        //Teachers Routes//
        Route::get('/AddTeachers','Teachers\teachersController@create')->name('teachers.create');
        Route::get('/ShowTeachers','Teachers\teachersController@index')->name('teachers.index');
        Route::post('PostTeachers/store','Teachers\teachersController@store')->name('teachers.store');
        
        //Faculty Routes//
        Route::get('/AddFaculty','faculty\facultyController@create')->name('faculty.create');
        Route::get('/ShowFaculty','faculty\facultyController@index')->name('faculty.index');
        Route::post('/AddFaculty/store','faculty\facultyController@store')->name('faculty.store');
        Route::get('/EditFaculty/{faculty_id}','faculty\facultyController@edit')->name('faculty.edit');
        Route::post('/UpdateFaculty/{faculty_id}','faculty\facultyController@update')->name('faculty.update');
        Route::get('/DeleteFaculty/{faculty_id}','faculty\facultyController@destroy')->name('faculty.destroy');

        //Program Routes//
        Route::get('/AddProgram','program\programController@create')->name('program.create');
        Route::get('/ShowProgram','program\programController@index')->name('program.index');
        Route::post('/AddProgram/store','program\programController@store')->name('program.store');
        Route::get('/EditProgram/{program_id}','program\programController@edit')->name('program.edit');
        Route::post('/UpdateProgram/{program_id}','program\programController@update')->name('program.update');
        Route::get('/DeleteProgram/{program_id}','program\programController@destroy')->name('program.destroy');
        Route::post('/SearchProgram/from/faculty','program\programController@searchprogram')->name('search.program.from.faculty');


        //Symbol Routes//
        Route::get('/AddSymbol','Symbol\SymbolController@create')->name('symbol.create');
        Route::get('/ajax/getprogram','Symbol\SymbolController@findprogram');
        Route::post('/ShowSymbolForm','symbol\SymbolController@symbolnumberform')->name('symbol.showsymbolnumberform');
        Route::post('/SymbolNo/store','symbol\SymbolController@store')->name('symbol.store');
        Route::get('/AllSymbolData','symbol\SymbolController@index')->name('symbol.index');
        Route::post('/SearchSymbolCatogory','symbol\SymbolController@SearhSymbolFaculty')->name('symbol.SearhSymbolFaculty');
        Route::get('/ShowAllSymbol/{symbol_number_category_id}','symbol\SymbolController@symbolview')->name('symbol.viewsymbol');
        Route::get('/EditSymboNumber/{symbol_number_category_id}','symbol\SymbolController@symbolupdate')->name('symbol.symbolupdate');
        Route::post('/UpdateSymbol/store','symbol\SymbolController@symbolupdatestore')->name('symbol.symbolupdatestore');
        

        //Year Routes//
        Route::get('/CreateYear','AdmissionYear\YearController@index')->name('year.index');
        Route::post('/PostYear/store','AdmissionYear\YearController@store')->name('year.store');
        Route::get('/EditYear/{id}','AdmissionYear\YearController@edit')->name('year.edit');
        Route::post('/UpdateYear/{id}','AdmissionYear\YearController@update')->name('year.update');
        Route::get('/DeleteYear/{id}','AdmissionYear\YearController@destroy')->name('year.destroy');


        //user access  and user role control route here

         Route::get('user/role','UserRoleController@index')->name('user.role');
         Route::get('user/role/create','UserRoleController@create')->name('create.user.role');
         Route::post('user/role/store','UserRoleController@store')->name('store.user.role');
         Route::get('user/access/show/{role_id}','UserAccessController@show')->name('show.user.access');
         Route::post('user/access/store','UserAccessController@store')->name('store.user.access');

         //Register for role id password//
         Route::get('user/register','RoleRegisterController@roleregisterform')->name('role.register.form');
         Route::post('user/register/store','RoleRegisterController@store')->name('role.register.store');


});



//FontEnd Page Routes//
Route::get('/EducatSystem','user\UserController@index')->name('user.index');
Route::get('/StudentResult','user\UserController@result')->name('user.result');
Route::post('/MarkSheet/Marks','user\UserController@showmarksheet')->name('user.marksheet');
Route::get('/Notices','user\UserController@notice')->name('user.notice');


