<?php

// Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    // Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');


        Route::group(['prefix' => 'students'], function () {

            Route::get('/', 'Admin\StudentController@index')->name('admin.students.index');
            Route::get('/studentage20', 'Admin\StudentController@indexAgeBy20')->name('admin.students.indexAgeBy20');
            Route::get('/studentnameAB', 'Admin\StudentController@indexNameByAb')->name('admin.students.indexNameByAb');
            Route::get('/studentphotonull', 'Admin\StudentController@indexPhotoNull')->name('admin.students.indexPhotoNull');
            Route::get('/create', 'Admin\StudentController@create')->name('admin.students.create');
            Route::post('/store', 'Admin\StudentController@store')->name('admin.students.store');
            Route::get('/edit/{id}', 'Admin\StudentController@edit')->name('admin.students.edit');
            Route::post('/update', 'Admin\StudentController@update')->name('admin.students.update');
            Route::get('/{id}/delete', 'Admin\StudentController@delete')->name('admin.students.delete');
            Route::get('/search', 'Admin\StudentController@searchByKecamatan')->name('search');


            Route::post('images/upload', 'Admin\StudentImageController@upload')->name('admin.students.images.upload');
            Route::get('images/{id}/delete', 'Admin\StudentImageController@delete')->name('admin.students.images.delete');


         });

    // });

// });
