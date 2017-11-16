<?php

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

/**
* Code from Week 7 progress log
*/
Route::get('/env', function () {
    dump(config('app.name'));
    dump(config('app.env'));
    dump(config('app.debug'));
    dump(config('app.url'));
});


/**
* Practice
*/
Route::get('/practice/6', 'PracticeController@practice6');
Route::any('/practice/{n?}', 'PracticeController@index');



/**
* Book
*/
Route::get('/book/create', 'BookController@create');
Route::post('/book', 'BookController@store');

Route::get('/book', 'BookController@index');
Route::get('/book/{title}', 'BookController@show');

Route::get('/search', 'BookController@search');


/**
* Example portion of Foobooks that mirrors what you'll do for P3
*/
Route::get('/trivia/', 'TriviaController@index');
Route::get('/trivia/check-answer', 'TriviaController@checkAnswer');


/**
* Homepage
*/
Route::get('/', 'WelcomeController');
