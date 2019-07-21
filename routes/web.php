<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PostController@index')->name('home');
Route::get('/posts/feed', 'PostFeedController@index')->name('posts.feed');
Route::resource('posts', 'PostController')->only('show');
Route::resource('users', 'UserController')->only('show');

Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');

Route::get('maskdemo', 'StaticController@maskDemo')->name('maskdemo');
Route::get('svg-image', 'StaticController@svgImage')->name('svgimage');

Route::get('contact/user/{recipient}', 'ContactController@index')->name('contact.user');
Route::get('contact-tom', 'ContactController@index')->name('contact');
Route::post('contact-tom', 'ContactController@send')->name('contact.send');
