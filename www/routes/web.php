<?php

/*Route::name('import.')->group(function() {
    Route::get('/', 'ImportController@index')->name('index');
    Route::get('/import', 'ImportController@create')->name('import');
    Route::post('/import', 'ImportController@store')->name('import.submit');
    Route::get('/delete/{id}', 'ImportController@delete')->name('delete');
});*/

Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');
