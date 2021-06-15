<?php

// senha teste criptografada
// $2y$10$n2ZQ0DeUZDzXIOFtW.EQ1ONZSpJ28Dc0RbHoL5bF78yV376U6lmmm

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Themplus\AuthController;
use App\Http\Controllers\Themplus\ChurchsController;
use App\Http\Controllers\Themplus\GroupsController;
use App\Http\Controllers\Themplus\UsersController;
use App\Http\Controllers\Themplus\MinistrysController;

Route::group(['prefix' => 'app' , 'namespace' => 'Themplus', 'as' => 'app.'] , function () {
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('login', 'AuthController@login')->name('login.do');

    //Rotas protegidas pelo login
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard' , 'AuthController@dashboard')->name('dashboard');
        Route::get('eventoss' , 'AuthController@events')->name('eventos');



        Route::resource('membros', 'UsersController');
        Route::get('membros', 'UsersController@index')->name('membros');
        Route::get('membros/{id}/editar', 'UsersController@edit')->name('editar-membro');

        Route::resource('celulas', 'GroupsController');
        Route::get('celulas' , 'GroupsController@index')->name('celulas');
        Route::get('celulas/editar', 'GroupsController@edit');
        Route::get('celulas/membros', 'GroupsController@members');
        Route::post('celulas/{group}', [GroupsController::class, 'show'])->name('modal.group');

        Route::get('eventos', 'EventsController@index')->name('eventos');

        Route::resource('ministerios', 'MinistriesController');
        Route::get('ministerios', 'MinistriesController@index')->name('ministerios');
        Route::get('ministerios/{id}/editar', 'MinistriesController@edit')->name('editar-ministerio');

        Route::get('escola-biblica', 'ClassesController@index')->name('escola-biblica');
        Route::get('escola-biblica/editar','ClassesController@edit');

        Route::resource('igreja', 'ChurchsController');
        Route::get('igreja', 'ChurchsController@index')->name('igreja');
        Route::get('igreja/editar', 'ChurchsController@edit');
        Route::post('igreja/{church}', [ChurchsController::class, 'show'])->name('modal.church');

        Route::get('financeiro', 'FinancesController@index')->name('financeiro');
    });


    //Logout
    Route::get('logout' , 'AuthController@logout')->name('logout');

});

