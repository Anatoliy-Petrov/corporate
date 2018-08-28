<?php

Route::get('/subscribers', 'SubscriberController@index')->name('subscribers');
Route::get('/subscribers/create', 'SubscriberController@create')->name('subscribers.create');
Route::post('/subscribers/delete-all', 'SubscriberController@destroyAll')->name('subscribers.destroyAll');

