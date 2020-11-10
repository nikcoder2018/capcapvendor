<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/restaurants', 'VendorsController@index')->name('vendors');
Route::get('/restaurants/{id}/details', 'VendorsController@details')->name('vendors.details');
Route::get('/locations/all', 'LocationsController@getLocations')->name('locations.all');
Route::get('/locations/getCountry', 'LocationsController@getCountry')->name('countries.all');
Route::get('/locations/getCity', 'LocationsController@getCity')->name('cities.all');
Route::get('/categories/{slug}','CategoriesController@index')->name('category');
Route::get('/blogs', 'BlogsController@index')->name('blogs');
Route::get('/blogs/{slug}', 'BlogsController@details')->name('blogs.details');
Route::prefix('vendor')->group(function(){
    Auth::routes(['verify' => true]);

    Route::group(['middleware' => 'verified'], function(){
        Route::get('profile','ProfileController@index')->name('vendors.profile');
        Route::post('profile/update', 'ProfileController@update')->name('vendors.profile.update');

        Route::get('dashboard','UserPanelController@index')->name('vendors.dashboard');
        Route::get('statistics','StatisticsController@index')->name('vendors.statistics');
        Route::get('notifications','NotificationsController@index')->name('vendors.notifications');
        Route::get('notifications/allownewsletter','NotificationsController@allow_newsletter')->name('vendors.notifications.allownewsletter');

        Route::resource('products', 'ProductsController',['except' => ['update','show', 'destroy']])->names([
            'index' => 'vendors.products.index',
            'create' => 'vendors.products.create',
            'store' => 'vendors.products.store',
            'edit' => 'vendors.products.edit'
        ]);
        Route::get('charts', 'ChartsController@index')->name('charts.index');
        Route::get('view_phone', 'VendorsController@view_phone')->name('vendors.view_phone');
        Route::post('products/update', 'ProductsController@update')->name('vendors.products.update');
        Route::post('products/destroy', 'ProductsController@destroy')->name('vendors.products.destroy');
        
        Route::get('/faq', 'PagesController@faq')->name('faq');
        Route::get('/pricing', 'PagesController@pricing')->name('pricing');
    });
});


Route::get('/products/{vendor}/{slug}', 'ProductsController@show')->name('products.details');

Route::post('slugify', function(){
    $text = request()->input('text');
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        $text = 'n-a';
    }

    return $text;
})->name('slugify');