<?php

use App\Http\Controllers\Api\AnswerController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\MapController;
use App\Http\Controllers\Api\MesiboNotificationController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PostRequestController;
use App\Http\Controllers\Api\RegisterQRCodeController;
use App\Http\Controllers\Api\ReregisterQRCodeController;
use App\Http\Controllers\Api\ScanQrcodeController;
use App\Http\Controllers\Api\SharePostController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\UnRegisterQRCodeController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FcmController;
use App\Http\Controllers\GenerateAndAssignQRCodeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\MesiboFileUploadController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\QrcodeLogController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubCategoryPostController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

Route::post('csrf-token', function () {
    return 'we are done';
})->middleware('csrf_api_token');
// Auth
Route::get('/countrycodes', [Auth\AuthController::class, 'getCountries']);
Route::post('/login', [Auth\AuthController::class, 'login']);
Route::post('/register', [Auth\AuthController::class, 'register']);
Route::post('/resetPassword', Auth\ResetPasswordController::class);
Route::post('/refreshToken', [Auth\AuthController::class, 'refresh']);
Route::post('/socialLogin/{driver}', [Auth\AuthController::class, 'socialLogin']);
Route::post('/appleLogin', [Auth\AuthController::class, 'appleLogin']);
Route::post('/newresetPassword', 'SendResetPasswordController');
Route::post('/verify_password', 'VerifyPasswordController');
Route::post('/newchangePassword', 'NewChangePasswordController');
Route::post('/delete-account/request', [Auth\AuthController::class, 'verifyDeleteAccount'])->name('delete-account-verify');
Route::post('/delete-account/verify', [Auth\AuthController::class, 'confirmDeleteAccount']);
Route::middleware(['auth:api'])->group(function () {
    Route::get('/userData', 'UserDataController');
    Route::post('/verify/{type}', 'VerifyPhoneOrEmailController');
    Route::post('/sendCode/{type}', 'SendCodeController');
    Route::post('/updateUserProfile', 'UpdateUserProfileController');
    Route::post('/changePassword', 'ChangePasswordController');
    Route::post('/changePhone', 'ChangePhoneNumberController');
    Route::post('/changeEmail', 'ChangeEmailController');
    Route::post('/logout', [Auth\AuthController::class, 'logout']);
    Route::get('/userPosts/{type}', 'UserPostController');
    Route::get('/userItems', 'UserItemController');
    Route::get('/userQRCodes', 'UserQRCodeController');
    Route::get('/quickUser', 'QuickUserController');
    Route::get('/mesiboUser', 'MesiboUserController');
});

Route::middleware('auth:api')->group(function () {
    Route::post('mesibo_upload', [MesiboFileUploadController::class, 'upload']);
    Route::prefix('items')->group(function () {
        Route::get('/{item}', [ItemsController::class, 'show']);
        Route::middleware('phone_verified')->group(function () {
            Route::post('/', [ItemsController::class, 'store']);
            Route::post('/{item}', [ItemsController::class, 'update']);
            Route::delete('/{item}', [ItemsController::class, 'destroy']);
        });
    });
    Route::prefix('fcm')->group(function () {
        Route::get('/', [FcmController::class, 'index']);
        Route::post('/create', [FcmController::class, 'store']);
        Route::delete('/delete', [FcmController::class, 'destroy']);
        Route::post('/readfcm', [FcmController::class, 'readfcm']);
    });
    // Route::post('request/{post}/accept', 'PostsController@testAccept');
    Route::middleware('phone_verified')->group(function () {
        Route::prefix('request')->group(function () {

            // accept this request send fcm
            Route::post('/post/{post}', PostRequestController::class);

            // accept this request send fcm
            Route::post('/{post}/accept', [PostsController::class, 'acceptRequest']);

            // reject this request send fcm
            Route::post('/{post}/reject', [PostsController::class, 'rejectRequest']);
        });

        // report  this post send fcm
        Route::post('/report/post/{post}', [PostsController::class, 'report']);

        // this my item send fcm
        Route::post('/post/{post}/answer', AnswerController::class);
    });

    // Send FCM and SMS
    Route::post('/qrcodes/create', [GenerateAndAssignQRCodeController::class, 'store']);
    Route::post('/qrcodes/rename', [QrcodeController::class, 'rename']);
    Route::post('/qrcodes/renew', [QrcodeController::class, 'renew']);
    Route::post('/qrcodes/assigntome', [QrcodeController::class, 'assignToMe']);
    Route::get('/qrcodelog', [QrcodeLogController::class, 'index']);
    Route::get('/qrcodelog/{qrcode_id}', [QrcodeLogController::class, 'show']);
    // Route::post('/qrcodes/register/', 'ScanQrcodeController@registerQrcodes');

    // Send FCM
    Route::post('/unregister/qrcode', UnRegisterQRCodeController::class);
    Route::post('/register/qrcode', RegisterQRCodeController::class);
    Route::post('/reregister/qrcode', ReregisterQRCodeController::class);
});

Route::prefix('home')->group(function () {
    Route::get('/banners/{banner?}', BannerController::class);
    Route::get('/posts/{status}/{subcategory_id?}', [SubCategoryPostController::class, 'index']);

    Route::prefix('search')->group(function () {
        Route::get('/', [SearchController::class, 'searchFilter']);
        Route::get('/keywords', [SearchController::class, 'searchByKeyWords']);
        Route::get('/data', [SearchController::class, 'fetchSearchData']);
    });
});

// Categories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{category}', [CategoryController::class, 'show']);
});

// Sub Categories
Route::prefix('subCategories')->group(function () {
    Route::get('/{type?}', [SubCategoryController::class, 'index']);
    Route::get('/{subCategory}', [SubCategoryController::class, 'show']);
});

// Brands
Route::prefix('brands')->group(function () {
    Route::get('/{subcategory_id?}', [BrandController::class, 'index']);
    Route::get('/{brand}', [BrandController::class, 'show']);
});

// Models
Route::prefix('models')->group(function () {
    Route::get('/{brand_id?}', [ModelController::class, 'index']);
    Route::get('/{model}', [ModelController::class, 'show']);
});

// Colors
Route::prefix('colors')->group(function () {
    Route::get('/', [ColorController::class, 'index']);
    Route::get('/{color}', [ColorController::class, 'show']);
});

// Wajad Offices
Route::get('/offices', [OfficeController::class, 'index']);

// Maps
Route::get('/maps/{type?}', MapController::class);

// Countries
Route::get('/countries', [LocationsController::class, 'index']);

// Regions
Route::get('/regions', [RegionController::class, 'index']);

// Support
Route::post('/contact-us', [SupportController::class, 'store']);

// Qr Code
Route::get('/scan-qr-code/{qr_code}', ScanQrcodeController::class)->name('scan-qrcode-api');

// Qr Code

// Packages
Route::get('/packages', PackageController::class);

// Pages
Route::get('/pages/{page?}', PageController::class);

// Posts
Route::prefix('posts')->group(function () {
    Route::get('/{post}', [PostsController::class, 'show']);

    // Send FCM
    Route::middleware(['auth:api', 'phone_verified'])->group(function () {
        Route::post('/add/{type}', [PostsController::class, 'store']);
        Route::post('/{post}', [PostsController::class, 'update']);
        Route::post('close/{post}', [PostsController::class, 'close']);
        Route::delete('/{post}', [PostsController::class, 'destroy']);
    });
});

Route::view('mario', 'mario');

Route::post('/test', TestController::class);

/**
 * Fcm APIS
 */
Route::get('paywithpaypal', function () {
    return redirect(Nova::path());
});

Route::match(['get', 'post'], '/mesibo/notification', MesiboNotificationController::class);

Route::get('/share-post/{id}', SharePostController::class)->name('share-post');

Route::get('mesibo_add', function () {
    $url = 'https://api.mesibo.com/api.php?op=useradd&token=kyiy639elg9i7g4r4wes6swhknerfgzhr1enoorf1zwc67eitl1wj5kkg3vnop2j&addr=ahmed-test555&appid=com.smartappco.wajad&name=ahmed';
    $client = new \GuzzleHttp\Client([
        'headers' => ['Content-Type' => 'application/json'],
    ]);

    $response = $client->get($url);
    dd($response);

});
