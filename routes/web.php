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

Route::group(['namespace'=>'User'], function(){
    Route::group(['namespace'=>'Main'], function(){
        Route::get('/', 'MainController@redirect');
        Route::get('/main', 'MainController@index')->name('user.main.index');
    });
});

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
        Route::group(['namespace'=>'TopBanner'],function (){
            Route::post('/galleries/banners/top_banner', 'TopBannerController@store')->name('admin.galleries.top_banner.store');
        });
        Route::group(['namespace'=>'NewsSpecialOfferBanner'],function (){
            Route::post('/galleries/banners/news_special_offer_banner', 'NewsSpecialOfferBannerController@store')->name('admin.galleries.news_special_offer_banner.store');
        });
        Route::group(['namespace'=>'BgImgBanner'],function (){
            Route::patch('/galleries/banners/bg_img_banner/{home}', 'BgImgBannerController@update')->name('admin.galleries.bg_img_banner.update');
        });
    });
    Route::group(['namespace'=>'MailingList'], function(){
        Route::get('/mailing_lists', 'MailingListController@index')->name('admin.mailing_lists.index');
    });
    Route::group(['namespace'=>'Page'], function(){
        Route::get('/pages', 'PageController@index')->name('admin.pages.index');
        Route::get('/pages/create', 'PageController@create')->name('admin.pages.create');

        Route::get('/pages/main/create', 'MainController@create')->name('admin.pages.main.create');
        Route::post('/pages/main/', 'MainController@store')->name('admin.pages.main.store');
        Route::get('/pages/main/edit/{home}', 'MainController@edit')->name('admin.pages.main.edit');
        Route::patch('/pages/main/{home}', 'MainController@update')->name('admin.pages.main.update');
        Route::delete('/pages/main/{home}', 'MainController@destroy')->name('admin.pages.main.destroy');
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

