<?php

Route::group(['prefix' => 'calculator'], function () {

    Route::get('/calc-tariffs', 'CalcTariffController@index')->name('calc_tariffs.index');
    Route::post('/calc-tariffs', 'CalcTariffController@store')->name('calc_tariffs.store');

    Route::get('/calc-tariffs/{id}/edit', 'CalcTariffController@edit')->name('calc_tariffs.edit');
    Route::get('/calc-tariffs/create', 'CalcTariffController@create')->name('calc_tariffs.create');
    Route::post('/calc-tariffs/delete-all', 'CalcTariffController@destroyAll')->name('calc_tariffs.destroyAll');
    Route::patch('/calc-tariffs/{tariff}', 'CalcTariffController@update')->name('calc_tariffs.update');
    Route::delete('/calc-tariffs/{tariff}', 'CalcTariffController@destroy')->name('calc_tariffs.destroy');



//    Route::post('/offices/get-cities', 'OfficeController@getCities'); /admin/calculator/hallmarks/get-hallmarks
//    Route::post('/hallmarks/get-hallmarks', 'CalcHallmarkController@getHallmarks')->name('calc_hallmarks.get');


    Route::get('/statuses', 'CalcStatusController@index')->name('statuses.index');
    Route::get('/get-statuses', 'CalcStatusController@getStatuses')->name('statuses.get.list');
    Route::post('/statuses', 'CalcStatusController@store')->name('statuses.store');
    Route::patch('/statuses/{status}', 'CalcStatusController@update')->name('statuses.update');
    Route::delete('/statuses/{status}', 'CalcStatusController@destroy')->name('statuses.destroy');

    // заявки на оценку золота и серебра
    Route::get('/requests', 'CalcRequestController@index')->name('requests.index');
    Route::get('/requests/{request}', 'CalcRequestController@show')->name('requests.show');
    Route::post('/requests', 'CalcRequestController@destroyAll')->name('requests.destroyAll');
    Route::delete('/requests/{request}', 'CalcRequestController@destroy')->name('requests.destroy');

    Route::put('/requests/{id}', 'CalcRequestController@update')->name('requests.update');


    // заявки на оценку техники

    Route::get('/gadgets/requests', 'CalcGadgetRequestController@index')->name('gadget.requests.index');
    Route::get('/gadgets/requests/{request}', 'CalcGadgetRequestController@show')->name('gadget.requests.show');
    Route::post('/gadgets/requests', 'CalcGadgetRequestController@destroyAll')->name('gadget.requests.destroyAll');
    Route::delete('/gadgets/requests/{request}', 'CalcGadgetRequestController@destroy')->name('gadget.requests.destroy');

    // раздел техника

    Route::get('/gadgets', 'CalcGadgetController@index')->name('gadgets.index');
    Route::get('/parser', 'CalcGadgetController@showParser')->name('parser.show');
    Route::post('/parser', 'CalcGadgetController@parse')->name('parser.parse');
    Route::get('/gadgets/{gadget}', 'CalcGadgetController@show')->name('gadgets.show');

});