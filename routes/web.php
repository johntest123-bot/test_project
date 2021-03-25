<?php

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

Route::get('/', 'PostsController@index')->name('posts');
// Route::get('/products/{slug}', 'ProductsController@show')->name('products_show');
// Route::get('/product/{slug}', 'ProductsController@showCategories')->name('categories');
// Route::get('/search_autohome', 'ProductsController@searchAutoHome');
// Route::get('/products', 'ProductsController@search')->name('products_search');
// Route::get('/carts', 'CartsController@cart')->name('carts');
// Route::get('/cart_products', 'CartsController@cartProducts')->name('carts_products');
// Route::post('/buy_products', 'CartsController@buyProducts')->name('buys_products');
// Route::get('/subject', 'ProductsController@productByType')->name('product_by_type');

Route::get('/services', function () {
    return view('services.index');
});

Route::get('/lien-he', function () {
    return view('contact.index');
});

Route::get('/information/chinh-sach-quy-dinh', function () {
    return view('policies.index');
});

Route::get('pages/quy-dinh-bao-hanh', function () {
    return view('pages.warranty');
});

Auth::routes();

Route::get('/mypage', 'UserController@mypage');
Route::post('/update_info', 'UserController@update');
Route::get('/favorites', 'FavoriteController@lists');
Route::post('/favorite', 'FavoriteController@add');
Route::delete('/favorite/{id}', 'FavoriteController@destroy');
Route::get('/change-password', 'UserController@showChangePasswordForm');
Route::post('/change-password', 'UserController@changePassword');
Route::get('/orders', 'UserController@orders')->name('orders');
Route::get('/orders/{id}', 'UserController@ordersDetail')->name('orders.detail');
Route::delete('/orders-destroy/{id}', 'UserController@ordersDestroy')->name('orders.destroy');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('services', 'ServiceController')->only(['index', 'show']);
Route::resource('guides', 'GuideController')->only(['index', 'show']);
Route::resource('informations', 'InformationsController')->only(['index', 'show']);
Route::resource('articles', 'ArticleController')->only(['index', 'show']);
Route::resource('brands', 'BrandController')->only(['index', 'show']);
Route::resource('comments', 'CommentController')->only(['store']);
Route::post('comments/reply', 'CommentController@reply')->name('comments.reply');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'UsersController@index');
    Route::resource('products', 'ProductsController');
    Route::post('/mass_import', 'ProductsController@import')->name('products.import');
    Route::get('/example_excel', 'ProductsController@download_excel')->name('products.download.example');
    Route::resource('brands', 'BrandsController');
    Route::resource('types', 'TypesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('orders', 'OrdersController');
    Route::resource('services', 'ServicesController');
    Route::resource('guides', 'GuidesController');
    Route::resource('informations', 'InformationsController');
    Route::resource('information_categories', 'InformationCategoriesController')->except(['destroy', 'create']);
    Route::resource('article_categories', 'ArticleCategoriesController')->except(['destroy']);
    Route::resource('articles', 'ArticlesController');
    Route::resource('users', 'UsersController')->only(['index', 'edit', 'update']);
    Route::resource('mails', 'MailController')->only(['edit', 'update']);
    Route::resource('banners', 'BannersController')->only(['index', 'edit', 'update']);
    Route::resource('banner_items', 'BannerItemsController')->only(['index', 'edit', 'update']);
    Route::get('/banners/{bannerId}/banner_items', 'BannerItemsController@index')->name('banner_items.index');
    Route::get('/banners/{bannerId}/banner_items/{id}', 'BannerItemsController@edit')->name('banner_items.edit');
    Route::put('/banners/{bannerId}/banner_items/{id}', 'BannerItemsController@update')->name('banner_items.update');
    Route::get('/list', 'UsersController@admins')->name('user.admins.list');
    Route::get('/change-password', 'UsersController@showChangePasswordForm');
    Route::post('/change-password', 'UsersController@changePassword')->name('current.change_password');
    Route::delete('/user/{id}', 'UsersController@destroy')->name('user.delete');
    Route::post('/user/{id}', 'UsersController@edit_role')->name('user.demote');
    Route::resource('settings', 'SettingsController')->only(['index', 'edit', 'update']);
    Route::resource('online_support_informations', 'OnlineSupportInformationsController');
    Route::get('/settings/{settingId}/online_support_informations', 'OnlineSupportInformationsController@index')->name('online_support_informations.index');
    Route::get('/settings/{settingId}/online_support_informations/{id}', 'OnlineSupportInformationsController@edit')->name('online_support_informations.edit');
    Route::get('/settings/online_support_informations/create', 'OnlineSupportInformationsController@create')->name('online_support_informations.create');
    Route::post('/settings/{settingId}/online_support_informations/', 'OnlineSupportInformationsController@store')->name('online_support_informations.store');
    Route::put('/settings/{settingId}/online_support_informations/{id}', 'OnlineSupportInformationsController@update')->name('online_support_informations.update');
    Route::delete('/settings/{settingId}/online_support_informations/{id}', 'OnlineSupportInformationsController@destroy')->name('online_support_informations.destroy');
});

Route::get('/news', 'ArticleController@index');
Route::get('/news/{id}', 'ArticleController@category_details')->name('article_category_details');
Route::get('/news-detail/{id}', 'ArticleController@show');
