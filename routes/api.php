<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/refreshToken', 'AuthController@refresh');
    Route::post('/resendCode', 'ResendCodeController');
    Route::post('/resetPassword', 'ResetPasswordController');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('/verify/{type}', 'VerifyPhoneOrEmailController');
        Route::post('/updateUserProfile', 'UserController@updateUserProfile');
        Route::post('/changePassword', 'ChangePasswordController');
        Route::post('/changePhone', 'ChangePhoneNumberController');
        Route::post('/changeEmail', 'UserController@changeEmail');
        Route::post('/logout', 'AuthController@logout');
    });
});

# Home Page
Route::prefix('home')->group(function () {
    Route::get('/banners', 'BannerController');
    Route::get('/posts/{status}/{subcategory_id?}', 'SubCategoryPostController@index');
});

# Categories
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{category}', 'CategoryController@show');

# Sub Categories
Route::get('/subCategories/{type?}', 'SubCategoryController@index');
Route::get('/subCategories/{subCategory}', 'SubCategoryController@show');

# Brands
Route::get('/brands/{subcategory_id?}', 'BrandController@index');
Route::get('/brands/{brand}', 'BrandController@show');

# Models
Route::get('/models/{brand_id?}', 'ModelController@index');
Route::get('/models/{model}', 'ModelController@show');

# Colors
Route::get('/colors', 'ColorController@index');
Route::get('/colors/{color}', 'ColorController@show');

# Wajad Offices
Route::get('/offices', 'OfficeController@index');

# Maps
Route::get('/maps/{type?}', 'MapController');

# Posts
Route::prefix('posts')->group(function () {
    Route::get('/{post}', 'PostsController@show');
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('/add/{type}', 'PostsController@store');
        Route::put('/{post}', 'PostsController@update');
        Route::delete('/{post}', 'PostsController@destroy');
        Route::get('/user/posts/{type}', 'UserController@userPosts');
      });
}); 
  
    Route::post('/report/post', 'PostsController@reportPost');

Route::group(['prefix' => 'search'], function () {
    Route::get('/keywords', 'SearchController@searchByKeyWords');
});

# Items
Route::group(['middleware' => ['auth:api']], function () {
    Route::prefix('items')->group(function () {
        Route::put('/{id}', 'ItemsController@update');
        Route::get('/{item}', 'ItemsController@show');
        Route::get('/', 'ItemsController@index');
        Route::post('/', 'ItemsController@store');
        Route::delete('/{id}', 'ItemsController@destroy');
    });
});
Route::get('/user/items', 'ItemsController@userItems');

# Countries
Route::get('/countries', 'LocationsController@index');

# Regions
Route::get('/regions', 'RegionController@index');

# Support
Route::post('/contact-us', 'SupportController@store');

# Qr Code
Route::get('/scan-qr-code/{qr_code?}', 'QrcodeController')->name('scan-qrcode-api');

# Pages
// Route::get('/pages/{page?}', 'PageController');

Route::group(['middleware' => ['auth:api']], function () {

    // phone_verified

    Route::get('/user', function (Request $request) {
        return auth('api')->user();
    });

    Route::post('details', 'DetailsController@index');

    Route::get('/user/{user_id}/qrcodes', 'QrcodeController@userQrcodes');

    Route::post('/qrcodes/create', 'GenerateAndAssignQRCodeController@store');
    Route::post('/qrcodes/register/', 'QrcodeController@registerQrcodes');
});
