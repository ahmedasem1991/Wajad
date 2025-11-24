<?php

namespace App\Http\Controllers\Api\Auth;

use App\AssignQrcode;
use App\Country;
use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Jobs\PrepereNewUser;
use App\Services\SmsProvider;
use App\Services\UserService;
use App\User;
use App\UserVerifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Auth
 */
class AuthController extends Controller
{
    /**
     * Login
     *
     * @bodyParam user numeric,email,min:9,max:14 required phone number or email for the user. Example:00966236363256
     * @bodyParam password string required min:6 password. Example: 123456789
     * @bodyParam device_type string required android or ios
     * @bodyParam mobile_country_id numeric required
     *
     * @response {
     *      "token_type": "Bearer",
     *      "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3NTM2OTMzMSwiZXhwIjoxNTc1NTg1MzMxLCJuYmYiOjE1NzUzNjkzMzEsImp0aSI6InQ2eTB2Q0JvWHMzYllYcjEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.LEWVdQFO7AMtEPjx8IlnfbAzRKlrSqAdvs_lSWF9Cqs",
     *      "expires_in": 216000,
     *      "user": {
     *          "id": 1,
     *          "name": "Api User",
     *          "email": "api_user_@wajad.co",
     *          "status": 1,
     *          "mobile_number": "1006994920",
     *          "receive_emails": false,
     *          "receive_push_notifications": false,
     *          "is_email_verified": false,
     *          "is_mobile_number_verified": false,
     *          "default_distance_unit": "kilo",
     *          "image":"image.png"
     *      }
     * }
     * @response 401 {
     *    "success": false,
     *    "message": "These credentials do not match our records.",
     *    "status_code": 401
     * }
     * @response 400 {
     *    "success": false,
     *    "message": "please enter a valid email address or phone number.",
     *    "status_code": 400
     * }
     *
     * @return void
     */
    public function login()
    {
        $validate_password = Validator::make(request()->all(), [
            'password' => ['required', 'max:255', 'min:6'],
            'device_type' => ['required', 'string', 'in:android,ios'],
        ]);

        if ($validate_password->fails()) {
            throw new ApiException($validate_password->errors()->first(), 400);
        }

        if (is_numeric(request('user'))) {
            request()->merge([
                'user' => ltrim((string) request('user'), 0),
            ]);

            $validate_mobile_number = Validator::make(
                request()->all(),
                ['user' => ['required', 'digits_between:9,14', 'exists:users,mobile_number']],
                ['mobile_country_id' => ['required', 'exists:countries,id']],
                ['user.exists' => trans('auth.failed')]
            );

            if ($validate_mobile_number->fails()) {
                throw new ApiException($validate_mobile_number->errors()->first(), 400);
            } else {
                $User = User::where('mobile_number', request('user'))->normalusers()->where('deleted_at', null)->first();
                if (! $User) {
                    throw new ApiException('Sorry, Credentials not match our records', 400);
                }
            }
            $User = User::where('mobile_number', request('user'))->where('mobile_country_id', request('mobile_country_id'))->normalusers()->where('deleted_at', null)->first();
            if (! $User) {
                throw new ApiException('the mobile country code do not match with  the mobile numer', 400);
            }
            $request = ['mobile_number' => request('user'), 'password' => request('password')];
        }

        if (filter_var(request('user'), FILTER_VALIDATE_EMAIL)) {
            $validate_email = Validator::make(
                request()->all(),
                ['user' => ['required', 'email', 'exists:users,email']],
                ['user.exists' => trans('auth.failed')]
            );

            if ($validate_email->fails()) {
                throw new ApiException($validate_email->errors()->first(), 400);
            }

            $request = ['email' => request('user'), 'password' => request('password')];
        }

        if (! isset($request)) {
            throw new ApiException(trans('auth.notvalid'), 400);
        }

        $request['type'] = User::Types['user'];

        if (! $token = auth('api')->attempt($request)) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        if (! auth('api')->user()->isUser()) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        auth('api')->user()->userDevices()->firstOrCreate([
            'device_type' => request('device_type'),
        ]);

        auth('api')->user()->activeLogin()->Create([
            'user_id' => auth('api')->user()->id,
        ]);

        $langHeader = request()->header('Content-Language');
        if ($langHeader != 'ar') {
            $langHeader = 'en';
        }
        auth('api')->user()->setLanguage($langHeader);

        return $this->respondWithToken($token);
    }

    /**
     * Register
     *
     * @bodyParam name string required 'min:6','max:255' . Example:Api Username
     * @bodyParam email email required email,unique:users,email. Example: api@wajad.com
     * @bodyParam password string required min:6 . Example: 123456789
     * @bodyParam mobile_number numeric required min:6,unique:users,mobile_number,digits_between:9,14. Example: 123456789
     * @bodyParam device_type string required android or ios
     * @bodyParam mobile_country_id int required exists:countries,id
     *
     * @response {
     *     "token_type": "Bearer",
     *     "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU3NTM2OTk2NCwiZXhwIjoxNTc1NTg1OTY0LCJuYmYiOjE1NzUzNjk5NjQsImp0aSI6IjU0dEQ5WDU5NHROd212QngiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.tja6CsTMHh2NIOYpCfAFVbshcX4DWRc2HQ4zYwid6zQ",
     *     "expires_in": 216000,
     *     "user": {
     *         "id": 1,
     *         "name": "Api User",
     *         "email": "api_user_@wajad.co",
     *         "status": 1,
     *         "mobile_number": "1006994920",
     *         "receive_emails": false,
     *         "receive_push_notifications": false,
     *         "is_email_verified": false,
     *         "is_mobile_number_verified": false,
     *         "default_distance_unit": "kilo",
     *         "image":"image.png",
     *         "country": {
     *              "id": 64,
     *              "name_ar": "مصر",
     *              "name_en": "Egypt",
     *              "iso_code": "EG",
     *              "country_code": "20",
     *              "deleted_at": null,
     *              "created_at": null,
     *              "updated_at": null
     *          }
     *     }
     * }
     *
     * @return void
     */
    public function register(Request $request)
    {
        $mobile_number = ltrim((string) $request->mobile_number, 0);

        logger($mobile_number);
        $DeletedUser = \App\User::where('email', $request->email)
            ->orWhere('mobile_number', $mobile_number)
            ->where('deleted_at', '!=', null)->withTrashed()->first();

        $NormalUserCount = \App\User::where('email', $request->email)
            ->orWhere('mobile_number', $mobile_number)
            ->where('deleted_at', null)->count();

        if ($DeletedUser && $NormalUserCount < 1) {
            $validate_request = Validator::make($request->all(), [
                'name' => ['required', 'min:6', 'max:255'],
                'email' => ['required', 'email:rfc,dns'],
                'password' => ['required', 'min:6', 'max:255'],
                'mobile_number' => ['required'],
                'device_type' => ['required', 'string', 'in:android,ios'],
                'mobile_country_id' => ['required', 'int', 'exists:countries,id'],
            ]);

        } else {
            $validate_request = Validator::make($request->all(), [
                'name' => ['required', 'min:6', 'max:255'],
                'email' => ['required', 'email:rfc,dns', 'unique:users,email,NULL,id,type,1,deleted_at,NULL'],
                'password' => ['required', 'min:6', 'max:255'],
                'mobile_number' => ['required', 'unique:users,mobile_number,NULL,id,type,1,deleted_at,NULL'],
                'device_type' => ['required', 'string', 'in:android,ios'],
                'mobile_country_id' => ['required', 'int', 'exists:countries,id'],
            ]);
        }

        if ($validate_request->fails()) {
            throw new ApiException($validate_request->errors()->first(), 400);
        }

        $NormalUserMobileCount = \App\User::Where('mobile_number', $mobile_number)
            ->where('deleted_at', null)->NormalUsers()->count();

        if ($NormalUserMobileCount > 0) {
            throw new ApiException('Mobile Number Already Taken', 400);
        }

        $result = true;
        $result = filter_var($request->email, FILTER_VALIDATE_EMAIL);
        if (! $result) {
            throw new ApiException('Not Valid Email', 400);
        }
        $user = User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'mobile_country_id' => $request->mobile_country_id,
            'mobile_number' => $mobile_number,
            'type' => User::Types['user'],
            'is_mobile_number_verified' => false,
            'posts_number' => 0,
            'max_posts_number' => defaultGroup()->limitation_of_posts,

        ]);

        (new UserService)->createAndSendActivationCode($user, 'phone');

        request()->merge(['user' => request('email')]);

        $langHeader = request()->header('Content-Language');
        if ($langHeader != 'ar') {
            $langHeader = 'en';
        }
        $user->setLanguage($langHeader);

        // PrepereNewUser::dispatch($user);
        // $url = "https://api.mesibo.com/api.php?op=useradd&token=".env('MESIBO_APP_TOKEN')."&addr=".$user->name.'-'.$user->id."&appid=com.smartappco.wajad&name=".$user->name;
        // $client = new \GuzzleHttp\Client([
        //     'headers' => ['Content-Type' => 'application/json']
        // ]);

        $url = 'https://api.mesibo.com/backend/';
        $userArray = [
            'address' => $user->name.'-'.$user->id,
            'name' => $user->name,
            'token' => [
                'appid' => 'com.smartappco.wajad',
                'expiry' => 5256000,
            ],

        ];

        $data = [
            'op' => 'useradd',
            'token' => env('MESIBO_APP_TOKEN'),
            'user' => $userArray,
        ];
        $client = new \GuzzleHttp\Client([
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($data),
        ]);

        $response = $client->get($url);
        $response = json_decode($response->getBody(), true);
        $user->mesibo_uid = $response['user']['uid'] ?? null;
        $user->mesibo_token = $response['user']['token'] ?? null;
        $user->mesibo_address = $user->name.'-'.$user->id;
        $user->save();

        if (count($user->qrcodes) == 0) {
            AssignQrcode::create([
                'assign_to' => 1,
                'type' => 1,
                'user_id' => $user->id,
                'quantity' => defaultGroup()->free_qrcodes,
                'available_period' => defaultGroup()->available_period_qrcodes,
                'created_from' => 'new_register',
            ]);
        }

        return $this->login();
    }

    /**
     * Logout
     *
     * @bodyParam token Barier-token required
     *
     * @response
     * {
     *  "success": true,
     *  "message": "User logged out successfully.",
     *  "status_code": 200
     *}
     *
     * @return void
     */
    public function logout()
    {
        auth('api')->logout();

        $this->addResponse(trans('messages.logged_out', ['model' => trans('messages.attributes.user')]))->addStatusCode(200);

        return $this->response();
    }

    /**
     * Refresh Token
     * [Refresh the current API Beaerer Token]
     *
     * @bodyParam token Barier-token required
     *
     * @response {
     *     "token_type": "Bearer",
     *     "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU3NTM2OTk2NCwiZXhwIjoxNTc1NTg1OTY0LCJuYmYiOjE1NzUzNjk5NjQsImp0aSI6IjU0dEQ5WDU5NHROd212QngiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.tja6CsTMHh2NIOYpCfAFVbshcX4DWRc2HQ4zYwid6zQ",
     *     "expires_in": 216000,
     *     "user": {
     *         "id": 1,
     *         "name": "Api User",
     *         "email": "api_user_@wajad.co",
     *         "status": 1,
     *         "mobile_number": "1006994920",
     *         "receive_emails": false,
     *         "receive_push_notifications": false,
     *         "is_email_verified": false,
     *         "is_mobile_number_verified": false,
     *         "default_distance_unit": "kilo"
     *     }
     * }
     *
     * @return void
     */
    public function refresh()
    {
        try {
            return $this->respondWithToken(auth('api')->refresh(), false);
        } catch (\Throwable $th) {
            throw new ApiException($th->getMessage(), 400);
        }
    }

    protected function respondWithToken($token, $include_user = true)
    {
        $response = [
            'token_type' => 'Bearer',
            'access_token' => $token,
            'expires_in' => config('jwt.ttl') * 60,
        ];

        if ($include_user) {
            $response['user'] = new UserResource(auth('api')->user()) ?? null;
        }

        return response()->json($response);
    }

    /**
     * Countries
     */
    public function getCountries()
    {
        $countries = Country::all();
        foreach ($countries as $country) {
            $country->flag = env('APP_URL').'/images/flags/'.strtolower($country->iso_code).'.png';
        }

        return $this->jsonResponse($countries);
    }

    /**
     * Social Login
     *
     * @urlParam driver string required
     *
     * @bodyParam token string required
     * @bodyParam device_type string required
     *
     * @response {
     *  "token_type": "Bearer",
     *  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9zb2NpYWxMb2dpblwvZmFjZWJvb2siLCJpYXQiOjE1OTg1MjM2MjMsImV4cCI6MTU5ODczOTYyMywibmJmIjoxNTk4NTIzNjIzLCJqdGkiOiJYUURhRGpRVFpoQjNNRWNYIiwic3ViIjoyNCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dQ-bgytx50E5tF42VxLFNwICdOrOjCguZReTC7AGKt8",
     *  "expires_in": 216000,
     *  "user": {
     *      "id": 24,
     *      "name": "Smart AppCo",
     *      "email": "a.shafik@smartappco.com",
     *      "status": null,
     *      "mobile_number": "",
     *      "receive_emails": false,
     *      "receive_push_notifications": false,
     *      "is_email_verified": false,
     *      "is_mobile_number_verified": false,
     *      "default_distance_unit": null,
     *      "quick_user_id": null,
     *      "quick_user_email": "a.shafik@smartappco.com",
     *      "quick_user_password": null,
     *      "image": "https://graph.facebook.com/v3.3/100385468456652/picture?type=normal",
     *      "country": null
     *    }
     * }
     */
    public function socialLogin($driver)
    {

        $login_user = Socialite::driver($driver)->userFromToken(request()->input('token'));

        $DeletedUser = \App\User::where('email', '=', $login_user->email)
            ->where('deleted_at', '!=', null)->withTrashed()->first();

        $NormalUserCount = \App\User::where('email', '=', $login_user->email)
            ->where('deleted_at', null)->count();

        $user = User::where('name', '=', $login_user->name)->where('email', '=', $login_user->email)->where('deleted_at', null)->first();

        // if( $DeletedUser &&  $NormalUserCount<1)
        // {
        if (is_null($user)) {
            $avatar = is_null($login_user->avatar) ? User::DEFAULT_PHOTO : $login_user->avatar;

            $user = User::create([
                'name' => $login_user->name,
                'email' => $login_user->email,
                'image' => $avatar,
                'password' => null,
                'is_social_user' => true,
                'mobile_number' => null,
                'social_name' => $driver,
                'type' => User::Types['user'],
                'is_mobile_number_verified' => false,
                'posts_number' => 0,
                'max_posts_number' => defaultGroup()->limitation_of_posts,
            ]);

            $langHeader = request()->header('Content-Language');
            if ($langHeader != 'ar') {
                $langHeader = 'en';
            }
            // PrepereNewUser::dispatch($user);
            // $url = "https://api.mesibo.com/api.php?op=useradd&token=".env('MESIBO_APP_TOKEN')."&addr=".$user->name.'-'.$user->id."&appid=com.smartappco.wajad&name=".$user->name;
            // $client = new \GuzzleHttp\Client([
            //     'headers' => ['Content-Type' => 'application/json']
            // ]);
            $url = 'https://api.mesibo.com/backend/';
            $userArray = [
                'address' => $user->name.'-'.$user->id,
                'name' => $user->name,
                'token' => [
                    'appid' => 'com.smartappco.wajad',
                    'expiry' => 5256000,
                ],

            ];

            $data = [
                'op' => 'useradd',
                'token' => env('MESIBO_APP_TOKEN'),
                'user' => $userArray,
            ];
            $client = new \GuzzleHttp\Client([
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data),
            ]);

            $response = $client->get($url);
            $response = json_decode($response->getBody(), true);
            $user->mesibo_uid = $response['user']['uid'] ?? null;
            $user->mesibo_token = $response['user']['token'] ?? null;
            $user->mesibo_address = $user->name.'-'.$user->id;
            $user->save();

            if (count($user->qrcodes) == 0) {
                AssignQrcode::create([
                    'assign_to' => 1,
                    'type' => 1,
                    'user_id' => $user->id,
                    'quantity' => defaultGroup()->free_qrcodes,
                    'available_period' => defaultGroup()->available_period_qrcodes,
                    'created_from' => 'new_register',
                ]);
            }

        }
        // }

        if (! $token = auth('api')->login($user)) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        if (! auth('api')->user()->isUser()) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        auth('api')->user()->userDevices()->firstOrCreate([
            'device_type' => request('device_type'),
        ]);

        auth('api')->user()->activeLogin()->Create([
            'user_id' => auth('api')->user()->id,
        ]);

        $langHeader = request()->header('Content-Language');
        if ($langHeader != 'ar') {
            $langHeader = 'en';
        }

        return $this->respondWithToken($token);
    }

    /**
     * Apple Login
     *
     * @bodyParam token string required
     * @bodyParam device_type string required
     * @bodyParam name string
     * @bodyParam email string
     *
     * @response {
     *  "token_type": "Bearer",
     *  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9zb2NpYWxMb2dpblwvZmFjZWJvb2siLCJpYXQiOjE1OTg1MjM2MjMsImV4cCI6MTU5ODczOTYyMywibmJmIjoxNTk4NTIzNjIzLCJqdGkiOiJYUURhRGpRVFpoQjNNRWNYIiwic3ViIjoyNCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.dQ-bgytx50E5tF42VxLFNwICdOrOjCguZReTC7AGKt8",
     *  "expires_in": 216000,
     *  "user": {
     *      "id": 24,
     *      "name": "Smart AppCo",
     *      "email": "a.shafik@smartappco.com",
     *      "status": null,
     *      "mobile_number": "",
     *      "receive_emails": false,
     *      "receive_push_notifications": false,
     *      "is_email_verified": false,
     *      "is_mobile_number_verified": false,
     *      "default_distance_unit": null,
     *      "quick_user_id": null,
     *      "quick_user_email": "a.shafik@smartappco.com",
     *      "quick_user_password": null,
     *      "image": null,
     *      "country": null
     *    }
     * }
     */
    public function appleLogin(Request $request)
    {
        $login_user = Socialite::driver('apple')->userFromToken($request->input('token'));

        $user = User::where('social_id', '=', $login_user->id)->first();
        if (is_null($user)) {
            $avatar = is_null($login_user->avatar) ? User::DEFAULT_PHOTO : $login_user->avatar;

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email') ?? $login_user->email,
                'image' => $avatar,
                'is_social_user' => true,
                'mobile_number' => null,
                'social_name' => 'apple',
                'type' => User::Types['user'],
                'is_mobile_number_verified' => false,
                'posts_number' => 0,
                'max_posts_number' => defaultGroup()->limitation_of_posts,
                'social_id' => $login_user->id,
            ]);

            $langHeader = request()->header('Content-Language');
            if ($langHeader != 'ar') {
                $langHeader = 'en';
            }
            // PrepereNewUser::dispatch($user);
            // $url = "https://api.mesibo.com/api.php?op=useradd&token=".env('MESIBO_APP_TOKEN')."&addr=".$user->name.'-'.$user->id."&appid=com.smartappco.wajad&name=".$user->name;
            // $client = new \GuzzleHttp\Client([
            //     'headers' => ['Content-Type' => 'application/json']
            // ]);
            $url = 'https://api.mesibo.com/backend/';
            $userArray = [
                'address' => $user->name.'-'.$user->id,
                'name' => $user->name,
                'token' => [
                    'appid' => 'com.smartappco.wajad',
                    'expiry' => 5256000,
                ],

            ];

            $data = [
                'op' => 'useradd',
                'token' => env('MESIBO_APP_TOKEN'),
                'user' => $userArray,
            ];
            $client = new \GuzzleHttp\Client([
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($data),
            ]);

            $response = $client->get($url);
            $response = json_decode($response->getBody(), true);
            $user->mesibo_uid = $response['user']['uid'] ?? null;
            $user->mesibo_token = $response['user']['token'] ?? null;
            $user->mesibo_address = $user->name.'-'.$user->id;
            $user->save();

            if (count($user->qrcodes) == 0) {
                AssignQrcode::create([
                    'assign_to' => 1,
                    'type' => 1,
                    'user_id' => $user->id,
                    'quantity' => defaultGroup()->free_qrcodes,
                    'available_period' => defaultGroup()->available_period_qrcodes,
                    'created_from' => 'new_register',
                ]);
            }

        }

        if (! $token = auth('api')->login($user)) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        if (! auth('api')->user()->isUser()) {
            throw new ApiException(trans('auth.failed'), 400);
        }

        auth('api')->user()->userDevices()->firstOrCreate([
            'device_type' => $request->input('device_type'),
        ]);

        auth('api')->user()->activeLogin()->Create([
            'user_id' => auth('api')->user()->id,
        ]);

        $langHeader = request()->header('Content-Language');
        if ($langHeader != 'ar') {
            $langHeader = 'en';
        }

        return $this->respondWithToken($token);
    }

    /**
     * Verfify delete account
     *
     * @bodyParam type string required email or phone
     * @bodyParam phone string
     * @bodyParam email string
     *
     * @response {
     * success: true
     * }
     */
    public function verifyDeleteAccount(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'mobile_number' => 'nullable|string',
            'country_code' => 'nullable|string',
        ]);

        // Ensure at least one method is provided
        if (empty($request->email) && (empty($request->mobile_number) || empty($request->country_code))) {
            return response()->json(['message' => 'Either email or mobile number (with country) is required'], 422);
        }

        $user = null;
        $method = null;
        $contact = null;

        if (! empty($request->email)) {
            $user = User::where('email', $request->email)->first();
            $method = 'email';
            $contact = $request->email;
        } else {
            // Verify by phone
            $fullPhone = $request->country_code.$request->mobile_number;
            $user = User::where('mobile_number', $request->mobile_number)
                ->first();
            $method = 'phone';
            $contact = $fullPhone;
        }

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Generate 6-digit code
        $code = rand(1000, 9999);
        $verify = new UserVerifications([
            'user_id' => $user->id,
            'code_valid_for' => $method,
            'verification_code' => $code,
        ]);
        $verify->save();

        if ($method === 'phone') {
            if ($user->country->country_code === '966' || $user->country->country_code === '+966') {
                \Unifonic::send($user->country->country_code.$user->mobile_number, "Your account deletion verification code is: $code", 'WAJAD');
                // new SendSMSEvent( $user->country->country_code. $user->mobile_number,$message);
            } else {
                \Unifonic::send($user->country->country_code.$user->mobile_number, "Your account deletion verification code is: $code", 'WAJAD');
                // (new SmsProvider)->sendMessage($code, $user->country->country_code. $user->mobile_number);
            }
            // SmsService::send($user->phone, "Your delete verification code is $code");
            Log::info("Delete code sent to phone {$user->phone}: $code");
        } else {
            // Send email
            Mail::raw("Your account deletion verification code is: $code", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Account Deletion Verification Code');
            });
            Log::info("Delete code sent to email {$user->email}: $code");
        }
        // } catch (\Exception $e) {
        //     return response()->json(['message' => 'Failed to send verification code'], 500);
        // }

        return response()->json([
            'message' => 'Verification code sent successfully',
            'method' => $method,
        ]);
    }

    public function confirmDeleteAccount(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'mobile_number' => 'nullable|string',
            'country_code' => 'nullable|string',
            'verification_code' => 'required|numeric',
        ]);

        // Ensure at least one method is provided
        if (empty($request->email) && (empty($request->mobile_number) || empty($request->country_code))) {
            return response()->json(['message' => 'Either email or mobile number (with country) is required'], 422);
        }

        $user = null;

        if (! empty($request->email)) {
            $user = User::where('email', $request->email)->first();
        } else {
            $user = User::where('mobile_number', $request->mobile_number)->first();
        }

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        // Find latest verification record for this user
        $verification = UserVerifications::where('user_id', $user->id)
            ->where('verification_code', $request->verification_code)
            ->orderByDesc('created_at')
            ->first();

        if (! $verification) {
            return response()->json(['message' => 'Invalid verification code'], 400);
        }

        // Optionally, check if code expired (if you store expiry info)
        if ($verification->created_at->diffInMinutes(now()) > 10) {
            return response()->json(['message' => 'Verification code expired'], 400);
        }
        // Delete the user safely inside a transaction
        DB::transaction(function () use ($user) {
            // You can perform any cleanup here (logs, related data, etc.)
            $user->delete();
        });

        // Optionally mark the verification as used
        $verification->delete();

        return response()->json([
            'message' => 'Account deleted successfully',
        ]);

    }
}
