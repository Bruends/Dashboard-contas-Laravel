<?php


// Dashboard
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'DashboardController@index')->name('home');
});

// rotas de contas a pagar
Route::group(['middleware' => 'auth', 'prefix' => 'pagamentos'], function() {
    Route::get('/', 'PayableController@index')->name('payables');
});

// rotas de contas a receber
Route::group(['middleware' => 'auth', 'prefix' => 'recebimentos'], function() {
    Route::get('/', 'ReceivableController@index')->name('receivables');
    Route::get('/novo', 'ReceivableController@addPage')->name('receivables.add');
    Route::post('/store', 'ReceivableController@store')->name('receivables.store');
});

Auth::routes();
