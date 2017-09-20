<?php
Route::group([], function () {

    Route::get('/', function () {
        return view('casts.index');
    });
    Route::get('/join', function () {
        return view('casts.join');
    });
    Route::get('/series-curated', function () {
        return view('casts.series-curated');
    });
});