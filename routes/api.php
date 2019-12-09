<?php
# Auth
Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/resetPassword', 'ResetPasswordController');
    Route::post('/refreshToken', 'AuthController@refresh');

    Route::middleware(['auth:api'])->group(function () {
        Route::get('/userData', 'UserDataController');
        Route::post('/refreshToken', 'AuthController@refresh');
        Route::post('/verify/{type}', 'VerifyPhoneOrEmailController');
        Route::post('/sendCode/{type}', 'SendCodeController');
        Route::post('/updateUserProfile', 'UpdateUserProfileController');
        Route::post('/changePassword', 'ChangePasswordController');
        Route::post('/changePhone', 'ChangePhoneNumberController');
        Route::post('/changeEmail', 'ChangeEmailController');
        Route::post('/logout', 'AuthController@logout');
        Route::get('/userPosts/{type}', 'UserPostController');
        Route::get('/userItems', 'UserItemController');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('items')->group(function () {
        Route::get('/{item}', 'ItemsController@show');
        Route::post('/', 'ItemsController@store');
        Route::put('/{item}', 'ItemsController@update');
        Route::delete('/{item}', 'ItemsController@destroy');
    });

    Route::post('/report/post/{post}', 'PostsController@reportPost');
    Route::post('/request/post/{post}', 'PostRequestController');
    Route::post('/request/{post}/accept', 'AcceptPostRequestController');
    Route::post('/request/{post}/reject', 'RejectPostRequestController');
    Route::post('/post/{post}/answer', 'AnswerController');
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
        Route::get('/data', 'SearchController@fetchSearchData');
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

Route::view('mario', 'mario');
