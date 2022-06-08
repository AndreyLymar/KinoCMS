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
    Route::group(['namespace'=>'PersonalAccount'], function(){
        Route::get('/personal_account', 'PersonalAccountController@index')->name('user.personal_accounts.index');
        Route::patch('/personal_account/{personal_account}', 'PersonalAccountController@update')->name('user.personal_accounts.update');
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
        Route::get('/special_offers/create', 'SpecialOfferController@create')->name('admin.special_offers.create');
        Route::get('/special_offers/edit/{special_offer}', 'SpecialOfferController@edit')->name('admin.special_offers.edit');
        Route::post('/special_offers/store_or_update', 'SpecialOfferController@updateOrCreate')->name('admin.special_offers.update_or_create');
        Route::delete('/special_offers/{special_offer}', 'SpecialOfferController@destroy')->name('admin.special_offers.destroy');

    });
    Route::group(['namespace'=>'Cinema'], function(){
        Route::get('/cinemas', 'CinemaController@index')->name('admin.cinemas.index');
        Route::get('/cinemas/create', 'CinemaController@create')->name('admin.cinemas.create');
        Route::get('/cinemas/edit/{cinema}', 'CinemaController@edit')->name('admin.cinemas.edit');
        Route::post('/cinemas/store_or_update', 'CinemaController@updateOrCreate')->name('admin.cinemas.update_or_create');
        Route::delete('/cinemas/{cinema}', 'CinemaController@destroy')->name('admin.cinemas.destroy');

    });
    Route::group(['namespace'=>'City'], function(){
        Route::get('/cities', 'CityController@index')->name('admin.cities.index');
        Route::get('/cities/create', 'CityController@create')->name('admin.cities.create');
        Route::get('/cities/edit/{city}', 'CityController@edit')->name('admin.cities.edit');
        Route::post('/cities/store_or_update', 'CityController@updateOrCreate')->name('admin.cities.update_or_create');
        Route::delete('/cities/{city}', 'CityController@destroy')->name('admin.cities.destroy');

    });
    Route::group(['namespace'=>'News'], function(){
        Route::get('/news', 'NewsController@index')->name('admin.news.index');
        Route::get('/news/create', 'NewsController@create')->name('admin.news.create');
        Route::get('/news/edit/{news}', 'NewsController@edit')->name('admin.news.edit');
        Route::post('/news/store_or_update', 'NewsController@updateOrCreate')->name('admin.news.update_or_create');
        Route::delete('/news/{news}', 'NewsController@destroy')->name('admin.news.destroy');
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
        Route::get('/pages/edit/{page}', 'PageController@edit')->name('admin.pages.edit');
        Route::post('/pages/store_or_update', 'PageController@updateOrCreate')->name('admin.pages.update_or_create');
        Route::delete('/pages/store_or_update/{page}', 'PageController@destroy')->name('admin.pages.destroy');

        Route::get('/pages/main/create', 'MainController@create')->name('admin.pages.main.create');
        Route::post('/pages/main/', 'MainController@store')->name('admin.pages.main.store');
        Route::get('/pages/main/edit/{home}', 'MainController@edit')->name('admin.pages.main.edit');
        Route::patch('/pages/main/{home}', 'MainController@update')->name('admin.pages.main.update');
        Route::delete('/pages/main/{home}', 'MainController@destroy')->name('admin.pages.main.destroy');
    });
    Route::group(['namespace'=>'Film'], function(){
        Route::get('/films', 'FilmController@index')->name('admin.films.index');
    });
    Route::group(['namespace'=>'Cinema'], function(){
        Route::get('/cinemas', 'CinemaController@index')->name('admin.cinemas.index');
    });
});

