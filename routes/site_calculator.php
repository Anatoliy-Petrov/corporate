<?php

Route::group(['prefix' => 'calculator'], function () {

    // Route::get('/', function (){
    //     return response()->view('_layouts.404', [], 404);
    // })->name('calculator');
   Route::get('/', 'CalculatorController@index')->name('calculator');
    Route::get('/calculate', 'CalculatorController@calculate')->name('calculate');

//    Route::get('/', function (){
//        return view('site.calculator.calculator');
//    })->name('calculator');
    Route::get('/get-hallmarks', 'CalculatorController@getHallmarks')->name('calculator.hallmarks.get');
    Route::get('/get-tariffs', 'CalculatorController@getTariffs')->name('calculator.tariffs.get');

    Route::get('/get-categories', 'CalculatorController@getCategories')->name('calculator.categories.get');
    Route::get('/get-hallmarks', 'CalculatorController@getHallmarks')->name('calculator.hallmarks.get');
    Route::get('/get-tariffs', 'CalculatorController@getTariffs')->name('calculator.tariffs.get');
    Route::get('/get-statuses', 'CalculatorController@getStatuses')->name('calculator.tariffs.get');

    Route::get('/get-cities', 'CalculatorController@getCities')->name('calculator.cities.get');
    Route::get('/get-departments/{id}', 'CalculatorController@getDepartments')->name('calculator.departments.get');
    Route::get('/get-brands', 'CalculatorController@getBrands')->name('calculator.brands.get');
    Route::get('/get-models', 'CalculatorController@getModels')->name('calculator.models.get');


    Route::post('/requests-temp-image', 'CalculatorController@storeTempImage')->name('calculator.temp.store');
    Route::post('/requests', 'CalculatorController@storeRequest')->name('calculator.request.store');
    Route::post('/gadgets-requests', 'CalculatorController@storeGadgetRequest')->name('calculator.gadget.request.store');

});

Route::get('/special-abilities', function (){
    return view('site.calculator.special_abilities');
})->name('special.abilities');

//
////
//Route::get('/calculator/get-categories', 'CalculatorController@getCategories')->name('calculator.categories.get');
//Route::get('/calculator/get-hallmarks', 'CalculatorController@getHallmarks')->name('calculator.hallmarks.get');
//Route::get('/calculator/get-tariffs', 'CalculatorController@getTariffs')->name('calculator.tariffs.get');
//Route::get('/calculator/get-statuses', 'CalculatorController@getStatuses')->name('calculator.tariffs.get');
