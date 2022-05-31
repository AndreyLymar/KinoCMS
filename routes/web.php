<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware' => 'admin'], function(){
    Route::group(['namespace'=>'Statistic'], function(){
        Route::get('/statistic', 'StatisticController@index')->name('admin.statistic.index');
    });
    Route::group(['namespace'=>'User'], function(){
        Route::get('/users', 'UsersController@index')->name('admin.users.index');
        Route::get('/users/{user}', 'UsersController@show')->name('admin.users.show');
        Route::patch('/users/{user}', 'UsersController@update')->name('admin.users.update');
        Route::delete('/users/{user}', 'UsersController@destroy')->name('admin.users.destroy');
    });
    Route::group(['namespace'=>'SpecialOffer'], function(){
        Route::get('/special_offers', 'SpecialOfferController@index')->name('admin.special_offers.index');
    });
    Route::group(['namespace'=>'BannerGallery'], function(){
        Route::get('/galleries', 'BannerGalleryController@index')->name('admin.galleries.index');
    });
    Route::group(['namespace'=>'MailingList'], function(){
        Route::get('/mailing_lists', 'MailingListController@index')->name('admin.mailing_lists.index');
    });
    Route::group(['namespace'=>'Page'], function(){
        Route::get('/pages', 'PageController@index')->name('admin.pages.index');
    });
    Route::group(['namespace'=>'News'], function(){
        Route::get('/news', 'NewsController@index')->name('admin.news.index');
    });
    Route::group(['namespace'=>'Film'], function(){
        Route::get('/films', 'FilmController@index')->name('admin.films.index');
    });
    Route::group(['namespace'=>'Cinema'], function(){
        Route::get('/cinemas', 'CinemaController@index')->name('admin.cinemas.index');
    });
});

