<?php
# Auth
Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/resetPassword', 'ResetPasswordController');

    Route::middleware(['auth:api'])->group(function () {
        Route::post('/refreshToken', 'AuthController@refresh');
        Route::get('/userData', 'UserDataController');
        Route::post('/refreshToken', 'AuthController@refresh');
        Route::post('/verify/{type}', 'VerifyPhoneOrEmailController');
        Route::post('/resendCode/{type}', 'ResendCodeController');
        Route::post('/updateUserProfile', 'UpdateUserProfileController');
        Route::post('/changePassword', 'ChangePasswordController');
        Route::post('/changePhone', 'ChangePhoneNumberController');
        Route::post('/sendEmailVerification', 'RequestEmailVerification');
        Route::post('/logout', 'AuthController@logout');
        Route::get('/userPosts/{type?}', 'UserPostController');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('items', 'ItemsController');


    Route::post('/report/post/{post}', 'PostsController@reportPost');;

    Route::post('/qrcodes/create', 'GenerateAndAssignQRCodeController@store');
    Route::post('/qrcodes/register/', 'QrcodeController@registerQrcodes');
    // Route::get('/user/{user_id}/qrcodes', 'QrcodeController@userQrcodes');
});

Route::prefix('home')->group(function () {
    Route::get('/banners', 'BannerController');
    Route::get('/posts/{status}/{subcategory_id?}', 'SubCategoryPostController@index');

    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'SearchController@searchFilter');
        Route::get('/keywords', 'SearchController@searchByKeyWords');
    });
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

# Countries
Route::get('/countries', 'LocationsController@index');

# Regions
Route::get('/regions', 'RegionController@index');

# Support
Route::post('/contact-us', 'SupportController@store');

# Qr Code
Route::get('/scan-qr-code/{qr_code?}', 'QrcodeController')->name('scan-qrcode-api');

# Pages
Route::get('/pages/{page?}', 'PageController');

# Posts
Route::prefix('posts')->group(function () {
    Route::get('/{post}', 'PostsController@show');
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('/add/{type}', 'PostsController@store');
        Route::put('/{post}', 'PostsController@update');
        Route::delete('/{post}', 'PostsController@destroy');
    });
});
