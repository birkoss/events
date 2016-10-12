<?php

use Illuminate\Http\Request;

Route::resource('events', 'EventController');
Route::resource('categories', 'CategoryController');
Route::resource('events.categories', 'EventCategoryController');
