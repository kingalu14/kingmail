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

Route::get('/', function () {
    return view('site.index');
});

Route::get('/logout', function () {
     Auth::logout();
     return view('auth.login');
});

   /*
     |-----------------------Routes for users ---------------------------
     |
     */
// Route::group(['prefix' => 'users'], function () {
//     Route::group(['prefix' => 'profile'], function () {
//         Route::get('/', [
//             'uses' => 'Admin\ProfileController@index',
//         ])->name('users.profile');

//         Route::post('/store', [
//             'uses' => 'Admin\ProfileController@store',
//         ])->name('users.profile.store');

//         Route::get('/edit/{id}', [
//             'uses' => 'Admin\ProfileController@edit',
//         ])->name('users.profile.edit');

//         Route::patch('/update', [
//             'uses' => 'Admin\ProfileController@update',
//         ])->name('users.profile.update');

//         Route::get('/set_status/{id}/{action}', [
//             'uses' => 'Admin\ProfileController@changeStatus',
//         ])->name('users.profile.set_status');

//         Route::get('/delete/{id}/', [
//             'uses' => 'Admin\ProfileController@delete',
//         ])->name('users.profile.delete');

//         Route::patch('/update/password/', [
//             'uses' => 'Admin\ProfileController@updatePassword',
//         ])->name('users.profile.updatePassword');
//     });
// });


//Route::group(['prefix' => 'contacts', 'middleware' => ['superAdmin']], function () { 
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [
            'uses' => 'Admin\ProfileController@index',
        ])->name('profile');

        Route::post('/store', [
            'uses' => 'Admin\ProfileController@store',
        ])->name('profile.store');

        Route::get('/edit/{id}', [
            'uses' => 'Admin\ProfileController@edit',
        ])->name('profile.edit');

        Route::patch('/update', [
            'uses' => 'Admin\ProfileController@update',
        ])->name('profile.update');

        Route::get('/set_status/{id}/{action}', [
            'uses' => 'Admin\ProfileController@changeStatus',
        ])->name('profile.set_status');

        Route::get('/delete/{id}/', [
            'uses' => 'Admin\ProfileController@delete',
        ])->name('profile.delete');

        Route::patch('/update/password/', [
            'uses' => 'Admin\ProfileController@updatePassword',
        ])->name('profile.updatePassword');
    });


Route::group(['prefix' => 'contacts','middleware' => ['auth']], function () {
    Route::get('/bulk/{id}', [
        'uses' => 'Admin\ContactsController@getAllContacts',
    ])->name('contacts.bulk');

    Route::post('/delete', [
        'uses' => 'Admin\ContactsController@destroy',
    ])->name('contacts.delete');

    Route::patch('/update', [
        'uses' => 'Admin\ContactsController@update',
    ])->name('contacts.update');

    Route::post('/store', [
        'uses' => 'Admin\ContactsController@createContacts',
    ])->name('contacts.store');
});

Route::group(['prefix' => 'excel','middleware' => ['auth']], function () {
    Route::post('/import', [
        'uses' => 'Admin\ExcelController@importExcel',
    ])->name('excel.import');
});

Route::group(['prefix' => 'bulk','middleware' => ['auth']], function () {
    Route::get('/', [
        'uses' => 'Admin\BulksController@getAllContacts',
    ])->name('bulk');

    Route::post('/delete', [
        'uses' => 'Admin\BulksController@destroy',
    ])->name('bulk.delete');

    Route::patch('/update', [
        'uses' => 'Admin\BulksController@update',
    ])->name('bulk.update');

    Route::post('/store', [
        'uses' => 'Admin\BulksController@createBulk',
    ])->name('bulk.store');

});

Route::group(['prefix' =>'templates','middleware' => ['auth']], function () {
    Route::get('/', [
        'uses' => 'Admin\TemplatesController@userTemplates',
    ])->name('templates');

    Route::post('/delete', [
        'uses' => 'Admin\TemplatesController@destroy',
    ])->name('templates.delete');

    Route::patch('/update/{id}', [
        'uses' => 'Admin\TemplatesController@update',
    ])->name('templates.update');

    Route::get('/edit/{id}', [
        'uses' => 'Admin\TemplatesController@edit',
    ])->name('templates.edit');

    Route::get('/create', [
        'uses' => 'Admin\TemplatesController@getTemplateForm',
    ])->name('templates.create');

    Route::post('/store', [
        'uses' => 'Admin\TemplatesController@createTemplate',
    ])->name('templates.store');
    
});

Route::group(['prefix' =>'mails','middleware' => ['auth']], function () {
    Route::get('/send', [
        'uses' => 'Admin\MailsController@getSendMail',
    ])->name('mails.send');

    Route::post('/send', [
        'uses' => 'Admin\MailsController@SendMail',
    ])->name('mails.send');

    Route::post('/delete', [
        'uses' => 'Admin\TemplatesController@destroy',
    ])->name('mails.delete');

    Route::post('/store', [
        'uses' => 'Admin\TemplatesController@createTemplate',
    ])->name('mails.store');
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
