<?php
# Auth
Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/resetPassword', 'ResetPasswordController');
    Route::post('/refreshToken', 'AuthController@refresh');

    Route::middleware(['auth:api'])->group(function () {
        Route::get('/userData', 'UserDataController');
        Route::post('/verify/{type}', 'VerifyPhoneOrEmailController');
        Route::post('/sendCode/{type}', 'SendCodeController');
        Route::post('/updateUserProfile', 'UpdateUserProfileController');
        Route::post('/changePassword', 'ChangePasswordController');
        Route::post('/changePhone', 'ChangePhoneNumberController');
        Route::post('/changeEmail', 'ChangeEmailController');
        Route::post('/logout', 'AuthController@logout');
        Route::get('/userPosts/{type}', 'UserPostController');
        Route::get('/userItems', 'UserItemController');
        Route::get('/userQRCodes', 'UserQRCodeController');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('items')->group(function () {
        Route::get('/{item}', 'ItemsController@show');
        Route::middleware('phone_verified')->group(function () {
            Route::post('/', 'ItemsController@store');
            Route::post('/{item}', 'ItemsController@update');
            Route::delete('/{item}', 'ItemsController@destroy');
        });
    });

    Route::middleware('phone_verified')->group(function () {
        Route::prefix('request')->group(function () {
            Route::post('/post/{post}', 'PostRequestController');
            Route::post('/{post}/accept', 'AcceptPostRequestController');
            Route::post('/{post}/reject', 'RejectPostRequestController');
        });

        Route::post('/report/post/{post}', 'PostsController@report');
        Route::post('/post/{post}/answer', 'AnswerController');
    });

    Route::post('/qrcodes/create', 'GenerateAndAssignQRCodeController@store');
    // Route::post('/qrcodes/register/', 'ScanQrcodeController@registerQrcodes');
    Route::post('/register/qrcode', 'RegisterQRCodeController');
    Route::post('/reregister/qrcode', 'ReregisterQRCodeController');
});

Route::prefix('home')->group(function () {
    Route::get('/banners/{banner?}', 'BannerController');
    Route::get('/posts/{status}/{subcategory_id?}', 'SubCategoryPostController@index');

    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'SearchController@searchFilter');
        Route::get('/keywords', 'SearchController@searchByKeyWords');
        Route::get('/data', 'SearchController@fetchSearchData');
    });
});

# Categories
Route::prefix('categories')->group(function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/{category}', 'CategoryController@show');
});

# Sub Categories
Route::prefix('subCategories')->group(function () {
    Route::get('/{type?}', 'SubCategoryController@index');
    Route::get('/{subCategory}', 'SubCategoryController@show');
});

# Brands
Route::prefix('brands')->group(function () {
    Route::get('/{subcategory_id?}', 'BrandController@index');
    Route::get('/{brand}', 'BrandController@show');
});

# Models
Route::prefix('models')->group(function () {
    Route::get('/{brand_id?}', 'ModelController@index');
    Route::get('/{model}', 'ModelController@show');
});

# Colors
Route::prefix('colors')->group(function () {
    Route::get('/', 'ColorController@index');
    Route::get('/{color}', 'ColorController@show');
});

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
Route::get('/scan-qr-code/{qr_code}', 'ScanQrcodeController')->name('scan-qrcode-api');

# Packages
Route::get('/packages', 'PackageController');

# Pages
Route::get('/pages/{page?}', 'PageController');

# Posts
Route::prefix('posts')->group(function () {
    Route::get('/{post}', 'PostsController@show');

    Route::middleware(['auth:api', 'phone_verified'])->group(function () {
        Route::post('/add/{type}', 'PostsController@store');
        Route::post('/{post}', 'PostsController@update');
        Route::delete('/{post}', 'PostsController@destroy');
    });
});
