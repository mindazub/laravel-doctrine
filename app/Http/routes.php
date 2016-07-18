<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('test-add', function (\Doctrine\ORM\EntityManagerInterface $em) {

    $task = new \TodoList\Entities\Task('Make test app', 'Create the test application for the Sitepoint article.');

    // \LaravelDoctrine\ORM\Facades\EntityManager::persist($task);
    // \LaravelDoctrine\ORM\Facades\EntityManager::flush();
 
     

    // \EntityManager::persist($task);
    // \EntityManager::flush();

    // dd($task);

// \laravel-doctrine\orm\src\Facades

    $em->persist($task);
    $em->flush();

    return 'added!';
});

Route::get('test-find', function (\Doctrine\ORM\EntityManagerInterface $em) {
    /* @var \TodoList\Entities\Task $task */
    $task = $em->find(TodoList\Entities\Task::class, 1);

    return $task->getName() . ' - ' . $task->getDescription();
});

Route::get('/tasks', 'TaskController@getIndex');

Route::get('/add', 'TaskController@getAdd');

Route::post('/add', 'TaskController@postAdd');

Route::get('edit/{id}', 'TaskController@getEdit');

Route::post('edit/{id}', 'TaskController@postEdit');

Route::get('/toggle/{id}', 'TaskController@getToggle');

Route::get('/delete/{id}', 'TaskController@getDelete');



