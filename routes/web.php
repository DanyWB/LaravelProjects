<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;






Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'Post' , 'prefix' => 'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace' => 'Like' , 'prefix' => '{post}/like', 'middleware' => 'auth'], function () {
        Route::post('/' ,'StoreController')->name('like.store');
    });
});



Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Comment' , ], function () {
        Route::post('/comment/{id}' ,'StoreController')->name('comment.store');
    });



    Route::group(['namespace' => 'Admin' , 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('admin.main.index');
        });
        Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function () {
            Route::get('/', 'IndexController')->name('admin.category.index');
            Route::get('/create', 'CreateController')->name('admin.category.create');
            Route::post('/', 'StoreController')->name('admin.category.store');
            Route::get('/{category}', 'ShowController')->name('admin.category.show');
            Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
            Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
        });
        Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function () {
            Route::get('/', 'IndexController')->name('admin.tag.index');
            Route::get('/create', 'CreateController')->name('admin.tag.create');
            Route::post('/', 'StoreController')->name('admin.tag.store');
            Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
            Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
            Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
        });
        Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function () {
            Route::get('/', 'IndexController')->name('admin.post.index');
            Route::get('/create', 'CreateController')->name('admin.post.create');
            Route::post('/', 'StoreController')->name('admin.post.store');
            Route::get('/{post}', 'ShowController')->name('admin.post.show');
            Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
            Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
        });

        Route::group(['namespace' => 'User', 'prefix'=>'users'], function () {
            Route::get('/', 'IndexController')->name('admin.user.index');
            Route::get('/create', 'CreateController')->name('admin.user.create');
            Route::post('/', 'StoreController')->name('admin.user.store');
            Route::get('/{user}', 'ShowController')->name('admin.user.show');
            Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
            Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
        });
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
