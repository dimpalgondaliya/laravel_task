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
    return view('insertdata');
});
/*---------------redirect to insertcontroller for insert----------------------------------*/
Route::post('insert/','InsertDataController@insert');

/*------------------------redirect to insert controller for fetch data by id -------------*/
Route::get('/edit/{id}','InsertDataController@editData')->name('edit');

/*------------------------redirect to insertcontroller for update -------------*/
Route::post('/update','InsertDataController@update');

/*------------------------redirect to insert controller for fetch data by id -------------*/
Route::get('/delete/{id}','InsertDataController@delete')->name('delete');

/*---------------redirect to insertcontroller for categoryview ----------------------------------*/
Route::get('/category','InsertDataController@categoryview');

/*---------------redirect to insertcontroller for insert category----------------------------------*/
Route::post('addcategory/','InsertDataController@addcategory');

/*------------------------redirect to insert controller for fetch data by id -------------*/
Route::get('/cat_edit/{id}','InsertDataController@editCatData')->name('cat_edit');

/*------------------------redirect to insertcontroller for update category -------------*/
Route::post('/cat_update','InsertDataController@cat_update');

/*------------------------redirect to insert controller for fetch data by id -------------*/
Route::get('/cat_delete/{id}','InsertDataController@cat_delete')->name('cat_delete');
/*---------------------------- call swichlanguage function for change language----------------*/
Route::post('/category', array('Middleware' => 'Language' ,'uses' => 'InsertDataController@swichlanguage'  ) );

Route::post('/insertdata', array('Middleware' => 'Language' ,'uses' => 'InsertDataController@swichlanguage'  ) );

Route::post('/languages', array('Middleware' => 'Language' ,'uses' => 'InsertDataController@swichlanguage'  ) );

Route::post('/edit_lang/{id}', array('Middleware' => 'Language' ,'uses' => 'InsertDataController@swichlanguage'  ) );

/*----------------------load language  view ------------------------*/
Route::get('/languages','InsertDataController@languagesview');

/*----------------- add languages ------------------------*/
Route::post('/addlanguages','InsertDataController@addlanguagesfun');

/* ----------------get language data by id --------------------------*/
Route::get('/edit_lang/{id}','InsertDataController@getlangdata')->name('edit_lang');

Route::post('/upldate_lang','InsertDataController@editlangdata');

Route::get('/delete_lang/{id}',"InsertDataController@deletelanddata")->name('delete_lang');

Route::get('/insertdata','InsertDataController@insertview');


