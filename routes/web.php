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
use \Illuminate\Support\Facades\Cookie;

Route::get('/', function () {



     return redirect('login');

})->name('welcome');


Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::prefix('archive')->group(function () {
 
   Route::get('index','ArchiveController@index')->name('archive.index');
   Route::get('linkFile','ArchiveController@linkFile')->name('archive.linkFile');
   Route::post('linkFilePost','ArchiveController@linkPost')->name('archive.linkPost');
   Route::get('getFile','ArchiveController@getFile')->name('archive.getFile');



});

Route::prefix('user')->group(function () {
 
   Route::get('register/find','UserController@find')->name('user.register.find');
   Route::post('register/create','UserController@create')->name('user.register.create');
 
});

//employee model and pages
Route::prefix('employee')->group(function () {
 
   Route::get('index','HRASD\\EmployeeController@index')->name('employee.index');
   Route::get('profile','HRASD\\EmployeeController@profile')->name('employee.profile');
   Route::get('coe/form','HRASD\\EmployeeController@coe_form')->name('employee.coe_form');

});

Route::get('user/{id}/avatar', function ($id) {

    // Find the user
	//$request->cookie('emp_pic')
    // Return the image in the response with the correct MIME type


    $pic = App\Model\coopca_hrd\EmployeePicture::where('cfcodeno','=',$id)->get()->first()['mfpicture'];

    return response()->make($pic, 200, array(
        'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($pic)
    ));
});


//Autocomplete Controller
Route::prefix('autocomplete')->group(function () {
 
   Route::get('employeeAutoComplete','AutoCompleteController@employeeAutoComplete')->name('employee.employeeAutoComplete');

});




//Route::get('indexes','ArchiveController@uploadIndex')->name('archive.upload.index');






