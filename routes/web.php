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
    // addicionar
    Route::get('/novo', 'ReceivableController@addPage')->name('receivables.addPage');
    Route::post('/store', 'ReceivableController@store')->name('receivables.store');
    // deletar
    Route::get('/{id}/deletar', 'ReceivableController@deletePage')->name('receivables.deletePage');
    Route::post('/deletar', 'ReceivableController@delete')->name('receivables.delete');
    // alterar
    Route::get('/{id}/alterar', 'ReceivableController@updatePage')->name('receivables.updatePage');
    Route::post('/alterar', 'ReceivableController@update')->name('receivables.update');
});

Auth::routes();
