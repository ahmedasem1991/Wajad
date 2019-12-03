---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://api.wajad.test/docs/collection.json)

<!-- END_INFO -->

#Auth


<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"00966236363256","password":"123456789"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user": "00966236363256",
    "password": "123456789"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9sb2dpbiIsImlhdCI6MTU3NTM2OTMzMSwiZXhwIjoxNTc1NTg1MzMxLCJuYmYiOjE1NzUzNjkzMzEsImp0aSI6InQ2eTB2Q0JvWHMzYllYcjEiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.LEWVdQFO7AMtEPjx8IlnfbAzRKlrSqAdvs_lSWF9Cqs",
    "expires_in": 216000,
    "user": {
        "id": 1,
        "name": "Api User",
        "email": "api_user_@wajad.co",
        "status": 1,
        "mobile_number": "1006994920",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo"
    }
}
```
> Example response (401):

```json
{
    "success": false,
    "message": "These credentials do not match our records.",
    "code": 401
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "please enter a valid email address or phone number.",
    "code": 400
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | numeric,email,min:9,max:14 |  required  | phone number or email for the user.
        `password` | string |  required  | min:6 password.
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Api Username","email":"api@wajad.com","password":"123456789","mobile_number":"123456789"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Api Username",
    "email": "api@wajad.com",
    "password": "123456789",
    "mobile_number": "123456789"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU3NTM2OTk2NCwiZXhwIjoxNTc1NTg1OTY0LCJuYmYiOjE1NzUzNjk5NjQsImp0aSI6IjU0dEQ5WDU5NHROd212QngiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.tja6CsTMHh2NIOYpCfAFVbshcX4DWRc2HQ4zYwid6zQ",
    "expires_in": 216000,
    "user": {
        "id": 1,
        "name": "Api User",
        "email": "api_user_@wajad.co",
        "status": 1,
        "mobile_number": "1006994920",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo"
    }
}
```

### HTTP Request
`POST api/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | 'min:6','max:255' .
        `email` | email |  required  | email,unique:users,email.
        `password` | string |  required  | min:6 .
        `mobile_number` | numeric |  required  | min:6,unique:users,mobile_number,digits_between:9,14.
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_406e4552819a456070d1f6c93688188d -->
## Refresh Token
[Refresh the current API Beaerer Token]

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/refreshToken?Old=aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "aut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcGkud2FqYWQudGVzdFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTU3NTM2OTk2NCwiZXhwIjoxNTc1NTg1OTY0LCJuYmYiOjE1NzUzNjk5NjQsImp0aSI6IjU0dEQ5WDU5NHROd212QngiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.tja6CsTMHh2NIOYpCfAFVbshcX4DWRc2HQ4zYwid6zQ",
    "expires_in": 216000,
    "user": {
        "id": 1,
        "name": "Api User",
        "email": "api_user_@wajad.co",
        "status": 1,
        "mobile_number": "1006994920",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo"
    }
}
```

### HTTP Request
`POST api/refreshToken`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `Old` |  optional  | Bearer Token

<!-- END_406e4552819a456070d1f6c93688188d -->

<!-- START_61739f3220a224b34228600649230ad1 -->
## Logout
[Destroy The Token]

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logout`


<!-- END_61739f3220a224b34228600649230ad1 -->

#general


<!-- START_e2ccdd59a86128e0e9bc37a7668fdac1 -->
## nova-vendor/nova-button/{resource}/{resourceId}/{buttonKey}
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-vendor/nova-button/1/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/nova-button/1/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-vendor/nova-button/{resource}/{resourceId}/{buttonKey}`


<!-- END_e2ccdd59a86128e0e9bc37a7668fdac1 -->

<!-- START_ffeb21a323d661b8d5ed8072620cc36e -->
## laravel-websockets
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/laravel-websockets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/laravel-websockets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET laravel-websockets`


<!-- END_ffeb21a323d661b8d5ed8072620cc36e -->

<!-- START_7a96267d047ecbef5cd21c3dd1691fe0 -->
## laravel-websockets/api/{appId}/statistics
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/laravel-websockets/api/1/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/laravel-websockets/api/1/statistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET laravel-websockets/api/{appId}/statistics`


<!-- END_7a96267d047ecbef5cd21c3dd1691fe0 -->

<!-- START_69dd61efc04363546d99d1d7cba7bf4c -->
## laravel-websockets/auth
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/laravel-websockets/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/laravel-websockets/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST laravel-websockets/auth`


<!-- END_69dd61efc04363546d99d1d7cba7bf4c -->

<!-- START_5f593177feb1276b604ea7c2cec73a03 -->
## laravel-websockets/event
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/laravel-websockets/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/laravel-websockets/event"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST laravel-websockets/event`


<!-- END_5f593177feb1276b604ea7c2cec73a03 -->

<!-- START_a114cbb106b4fbbabe00910c4c3fa19c -->
## laravel-websockets/statistics
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/laravel-websockets/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/laravel-websockets/statistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST laravel-websockets/statistics`


<!-- END_a114cbb106b4fbbabe00910c4c3fa19c -->

<!-- START_f7b7ea397f8939c8bb93e6cab64603ce -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/documentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/documentation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/documentation`


<!-- END_f7b7ea397f8939c8bb93e6cab64603ce -->

<!-- START_1ead214f30a5e235e7140eb2aaa29eee -->
## Dump api-docs.json content endpoint.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/docs/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/docs/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "Cannot find \/home\/vagrant\/code\/web\/storage\/api-docs\/api-docs.json and cannot be generated."
}
```

### HTTP Request
`GET docs/{jsonFile?}`

`POST docs/{jsonFile?}`

`PUT docs/{jsonFile?}`

`PATCH docs/{jsonFile?}`

`DELETE docs/{jsonFile?}`

`OPTIONS docs/{jsonFile?}`


<!-- END_1ead214f30a5e235e7140eb2aaa29eee -->

<!-- START_1a23c1337818a4de9e417863aebaca33 -->
## docs/asset/{asset}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/docs/asset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/docs/asset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "(1) - this L5 Swagger asset is not allowed"
}
```

### HTTP Request
`GET docs/asset/{asset}`


<!-- END_1a23c1337818a4de9e417863aebaca33 -->

<!-- START_a2c4ea37605c6d2e3c93b7269030af0a -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/oauth2-callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/oauth2-callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/oauth2-callback`


<!-- END_a2c4ea37605c6d2e3c93b7269030af0a -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/broadcasting/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->

<!-- START_6edf799215dfab97cdc1910d3a0f1fa0 -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/wajad/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET wajad/login`


<!-- END_6edf799215dfab97cdc1910d3a0f1fa0 -->

<!-- START_af696f06535f90f0e40394eb10dfd0ea -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/wajad/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST wajad/login`


<!-- END_af696f06535f90f0e40394eb10dfd0ea -->

<!-- START_19d6aa599a4436a69fc0e664b56d2dca -->
## Log the user out of the application.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/wajad/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET wajad/logout`


<!-- END_19d6aa599a4436a69fc0e664b56d2dca -->

<!-- START_10259ea894b61e035ed95ae3b4212373 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/wajad/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET wajad/password/reset`


<!-- END_10259ea894b61e035ed95ae3b4212373 -->

<!-- START_b84bbe8d7808f823172b3488b91bf065 -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/wajad/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST wajad/password/email`


<!-- END_b84bbe8d7808f823172b3488b91bf065 -->

<!-- START_5ade73d888f58700ca94fbab24553aca -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/wajad/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET wajad/password/reset/{token}`


<!-- END_5ade73d888f58700ca94fbab24553aca -->

<!-- START_ef35280f3fdc56bb64ff077bb4de4729 -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/wajad/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/wajad/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST wajad/password/reset`


<!-- END_ef35280f3fdc56bb64ff077bb4de4729 -->

<!-- START_b4f4625b609a18310a50b1dddf752a55 -->
## api/resetPassword
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/resetPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/resetPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/resetPassword`


<!-- END_b4f4625b609a18310a50b1dddf752a55 -->

<!-- START_0b828966a9f31e695693fe9650b70eb1 -->
## User Data

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/userData" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/userData"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 2,
        "name": "User",
        "email": "user@nova.com",
        "status": 1,
        "mobile_number": "01142416124",
        "receive_emails": false,
        "receive_push_notifications": false,
        "is_email_verified": false,
        "is_mobile_number_verified": false,
        "default_distance_unit": "kilo"
    }
}
```

### HTTP Request
`GET api/userData`


<!-- END_0b828966a9f31e695693fe9650b70eb1 -->

<!-- START_734623b7e60cc9f20fd5b5b67df87d7d -->
## Verify Phone or Email

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/verify/phone." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"1234"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/verify/phone."
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "1234"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Phone Verified Successfully",
    "status_code": 200
}
```

### HTTP Request
`POST api/verify/{type}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | phone or email.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `code` | digits:4,numeric |  required  | .
    
<!-- END_734623b7e60cc9f20fd5b5b67df87d7d -->

<!-- START_ea7e28be0fe9f5f4f03de00c1544e2c3 -->
## api/sendCode/{type}
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/sendCode/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/sendCode/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sendCode/{type}`


<!-- END_ea7e28be0fe9f5f4f03de00c1544e2c3 -->

<!-- START_72a884b85bf7bf4198984d6ccecce2b7 -->
## Update User Profile

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/updateUserProfile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"1234","receive_emails":true,"receive_push_notifications":true,"default_distance_unit":"mile"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/updateUserProfile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "1234",
    "receive_emails": true,
    "receive_push_notifications": true,
    "default_distance_unit": "mile"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "User updated successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/updateUserProfile`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | min:6,max:255 |  required  | 1 or 0.
        `receive_emails` | boolean |  required  | 1 or 0.
        `receive_push_notifications` | boolean |  required  | 1 or 0.
        `default_distance_unit` | string,in:kilo,mile |  required  | kilo or mile.
    
<!-- END_72a884b85bf7bf4198984d6ccecce2b7 -->

<!-- START_dd73fe89d9872ce37d284636141ae526 -->
## api/changePassword
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changePassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/changePassword`


<!-- END_dd73fe89d9872ce37d284636141ae526 -->

<!-- START_cb0e89a15b080a33f4c18135f097480d -->
## api/changePhone
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changePhone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/changePhone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/changePhone`


<!-- END_cb0e89a15b080a33f4c18135f097480d -->

<!-- START_d0ad6077a075427e4ae216d3352ed1ef -->
## api/changeEmail
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changeEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/changeEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/changeEmail`


<!-- END_d0ad6077a075427e4ae216d3352ed1ef -->

<!-- START_93fe34fffcec9f399970d7fffb9bcc14 -->
## User Posts

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/userPosts/found." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/userPosts/found."
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "title": "Ex atque necessitatibus libero voluptatem magnam et.",
            "approval_status": 1,
            "reward": 0,
            "description": "Et ut quo non sapiente atque voluptatem accusamus. Explicabo voluptas et perferendis aut tempore qui temporibus. Ipsam impedit ipsa voluptates. Non quia non omnis quo aut. Quisquam voluptatem atque et deserunt dignissimos libero ut. Fuga ut ab delectus consequatur est neque. Delectus qui ea consequuntur quasi qui illo. Qui aperiam voluptas nobis voluptas fugiat. Et voluptates est amet. Nam vel voluptatem ab qui qui explicabo. Qui voluptates laboriosam quaerat sunt. Est vel natus vero et eaque autem ipsam sit.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 105,
                "name": "Facilis velit soluta quidem modi quibusdam et.",
                "description": "Rerum quidem consequatur officiis et et aut earum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 52,
                "name": "Hic veritatis recusandae et eveniet aperiam tenetur.",
                "description": "Facere culpa voluptatem quos illum repellendus expedita.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": {
                "id": 1,
                "name": "Red",
                "icon": "images\/colors\/red.png"
            },
            "date": "2019-12-03 17:33:55",
            "images": [
                {
                    "id": 1,
                    "image": "http:\/\/wajad.test\/image.png\r\n"
                }
            ],
            "questions": [
                {
                    "id": 1,
                    "founder_id": {
                        "id": 2,
                        "name": "User",
                        "email": "user@nova.com",
                        "status": 1,
                        "mobile_number": "01142416124",
                        "receive_emails": false,
                        "receive_push_notifications": false,
                        "is_email_verified": false,
                        "is_mobile_number_verified": false,
                        "default_distance_unit": "kilo"
                    },
                    "question": "question1\r\n"
                }
            ],
            "city": {
                "id": 1,
                "name": "Al Riyadh"
            }
        }
    ]
}
```

### HTTP Request
`GET api/userPosts/{type}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  optional  | lost or found.

<!-- END_93fe34fffcec9f399970d7fffb9bcc14 -->

<!-- START_2d89b427b331f35cdded42a87b6e4acc -->
## api/items
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/items`


<!-- END_2d89b427b331f35cdded42a87b6e4acc -->

<!-- START_07fb85e5d8610027392f9f49c33a97c1 -->
## api/items
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/items`


<!-- END_07fb85e5d8610027392f9f49c33a97c1 -->

<!-- START_1f8988f8b514fb2127ba9ed8e2499f98 -->
## api/items/{item}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/items/{item}`


<!-- END_1f8988f8b514fb2127ba9ed8e2499f98 -->

<!-- START_5720c5ba9db8be8b03e436d5f2db2bf1 -->
## api/items/{item}
> Example request:

```bash
curl -X PUT \
    "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/items/{item}`

`PATCH api/items/{item}`


<!-- END_5720c5ba9db8be8b03e436d5f2db2bf1 -->

<!-- START_4ba7e871e55098b0081507ac0b4e478b -->
## api/items/{item}
> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/items/{item}`


<!-- END_4ba7e871e55098b0081507ac0b4e478b -->

<!-- START_98a9f611f7c0880f849db435165db194 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/qrcodes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/qrcodes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/qrcodes/create`


<!-- END_98a9f611f7c0880f849db435165db194 -->

<!-- START_89167602b4f7090b5ae673647a46f9d9 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/qrcodes/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/qrcodes/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/qrcodes/register`


<!-- END_89167602b4f7090b5ae673647a46f9d9 -->

<!-- START_e22799a526b2d5e6c38d0c9ffba872eb -->
## api/home/banners
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/banners" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/banners"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        null,
        null,
        null,
        null,
        null
    ]
}
```

### HTTP Request
`GET api/home/banners`


<!-- END_e22799a526b2d5e6c38d0c9ffba872eb -->

<!-- START_adef4ddd684318346ed10525cf68c6e9 -->
## api/home/posts/{status}/{subcategory_id?}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/posts/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/posts/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "success": false,
    "message": "Category is not found.",
    "code": 404
}
```

### HTTP Request
`GET api/home/posts/{status}/{subcategory_id?}`


<!-- END_adef4ddd684318346ed10525cf68c6e9 -->

<!-- START_9d08a4da7d839136b63a8291497ec010 -->
## api/home/search
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 2,
            "title": "Natus voluptatibus debitis et laborum fugit eveniet nostrum quis.",
            "approval_status": 1,
            "reward": 0,
            "description": "Repellat cupiditate totam corporis distinctio exercitationem architecto excepturi quam. Deserunt id non quod quia commodi molestias. Maxime aut hic aut doloribus quos excepturi. Fugiat quam dolores quis veritatis. Totam aut consequuntur perspiciatis provident consequatur sunt voluptatem. Consequatur similique qui ipsum. Autem unde dolorem facere quos necessitatibus amet. Deleniti est voluptas rem eveniet. Perspiciatis accusamus autem dicta necessitatibus et. Veniam soluta blanditiis voluptas ex. Sit aut et ut eaque laboriosam amet dolor ut. Perspiciatis impedit qui amet. Qui sit corrupti est voluptatem. Qui ipsa natus praesentium magnam unde perferendis laudantium. Iste qui rem perspiciatis architecto omnis facilis culpa adipisci.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 107,
                "name": "Sed voluptas autem quod dignissimos.",
                "description": "Nam quas optio voluptatem aut necessitatibus.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 53,
                "name": "Consequatur voluptatem veritatis alias nulla neque eius quis atque.",
                "description": "Provident consequatur sit maxime aut voluptatum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 3,
            "title": "Cumque ut impedit enim sunt labore.",
            "approval_status": 1,
            "reward": 0,
            "description": "Mollitia sed dolore fuga rerum ut esse dolores. Consequuntur est sunt soluta qui explicabo qui asperiores. Itaque possimus explicabo eligendi explicabo veritatis. Repudiandae veniam in eaque assumenda vel cupiditate. Impedit quos nihil cumque eos. Soluta qui sapiente quia incidunt. Iure doloribus unde vel exercitationem beatae et voluptatem. Voluptas eum omnis dolorem eveniet. Quisquam nisi molestias quia aperiam. Non veniam voluptates voluptatum. Officia eos minus et aut delectus a. Optio enim neque ex doloribus expedita nobis. Aut magni rerum recusandae sunt quaerat et. Dolores placeat amet consequatur ducimus. Vel quibusdam debitis est saepe porro vel qui. Voluptatibus saepe sunt qui maxime et ducimus quibusdam qui. Quidem dolor error dolore possimus quisquam odit dolores. Excepturi voluptatem et in id maxime possimus. Saepe non eveniet blanditiis id minima enim amet.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 109,
                "name": "Tenetur corrupti sint dolores incidunt quia.",
                "description": "Sint vel quod accusantium odio sed.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 54,
                "name": "Voluptate nostrum aliquam qui non architecto debitis.",
                "description": "Eveniet impedit saepe et ut facilis.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 4,
            "title": "Ut ut ratione eius quam dolorem fugit ut.",
            "approval_status": 1,
            "reward": 0,
            "description": "Et omnis et minima sed dolor tempore ratione similique. Dolores facilis dicta esse nisi voluptatem vel. Quis quis sed et illum culpa alias dicta harum. Cum est nostrum ut suscipit molestiae. Assumenda dolorum rerum odit cupiditate. Corporis iste enim voluptatem ullam in maxime et. Hic voluptas qui qui aut. Nisi quos doloremque odio quo dolorem eius alias. Quo eum deserunt qui adipisci necessitatibus laudantium voluptatem. Dicta aut tenetur nihil repellat. Id earum totam deleniti. Quisquam error nemo sit adipisci et. Est esse amet ut eligendi animi in repudiandae quasi. Non odio nisi maxime nihil ipsum quas illum.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 111,
                "name": "Corporis omnis qui velit natus temporibus sint tenetur nisi.",
                "description": "Vero nihil doloribus possimus doloremque.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 55,
                "name": "Dignissimos maiores unde velit occaecati sapiente amet eum.",
                "description": "Suscipit sequi delectus ea sit est animi unde.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 5,
            "title": "Eaque dolorum a cum dolores possimus commodi ut.",
            "approval_status": 1,
            "reward": 0,
            "description": "Deserunt maxime et expedita earum in. Aut eaque possimus eum tenetur animi dolorum suscipit vel. Qui amet quasi in quasi laborum cum rerum. Cum hic ipsum in autem amet nostrum exercitationem et. Voluptates nulla autem rerum eveniet qui vel. Veniam in sit ut corporis sunt deserunt. Rerum quia modi qui in. Est quidem magni laborum eligendi modi sequi. Iure similique rerum molestiae dolor officia et qui. Est assumenda repellendus debitis aut. Quo autem aut beatae. Quia voluptas quia necessitatibus quidem et. Quia deleniti beatae autem est est delectus. Nostrum molestias repellat possimus nisi in autem eum. Veritatis aut nemo at accusantium.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 113,
                "name": "Eum et ipsam odit et ullam.",
                "description": "Aut et aut architecto rerum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 56,
                "name": "Ipsam harum occaecati dolore non provident voluptate et.",
                "description": "Sint earum maxime eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        }
    ]
}
```

### HTTP Request
`GET api/home/search`


<!-- END_9d08a4da7d839136b63a8291497ec010 -->

<!-- START_a381454c94e24449400bd187815c6920 -->
## api/home/search/keywords
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/search/keywords" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/search/keywords"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "title": "Ex atque necessitatibus libero voluptatem magnam et.",
            "approval_status": 1,
            "reward": 0,
            "description": "Et ut quo non sapiente atque voluptatem accusamus. Explicabo voluptas et perferendis aut tempore qui temporibus. Ipsam impedit ipsa voluptates. Non quia non omnis quo aut. Quisquam voluptatem atque et deserunt dignissimos libero ut. Fuga ut ab delectus consequatur est neque. Delectus qui ea consequuntur quasi qui illo. Qui aperiam voluptas nobis voluptas fugiat. Et voluptates est amet. Nam vel voluptatem ab qui qui explicabo. Qui voluptates laboriosam quaerat sunt. Est vel natus vero et eaque autem ipsam sit.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 105,
                "name": "Facilis velit soluta quidem modi quibusdam et.",
                "description": "Rerum quidem consequatur officiis et et aut earum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 52,
                "name": "Hic veritatis recusandae et eveniet aperiam tenetur.",
                "description": "Facere culpa voluptatem quos illum repellendus expedita.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": {
                "id": 1,
                "name": "Red",
                "icon": "images\/colors\/red.png"
            },
            "date": "2019-12-03 17:33:55",
            "images": [
                {
                    "id": 1,
                    "image": "http:\/\/wajad.test\/image.png\r\n"
                }
            ],
            "questions": [
                {
                    "id": 1,
                    "founder_id": {
                        "id": 2,
                        "name": "User",
                        "email": "user@nova.com",
                        "status": 1,
                        "mobile_number": "01142416124",
                        "receive_emails": false,
                        "receive_push_notifications": false,
                        "is_email_verified": false,
                        "is_mobile_number_verified": false,
                        "default_distance_unit": "kilo"
                    },
                    "question": "question1\r\n"
                }
            ],
            "city": {
                "id": 1,
                "name": "Al Riyadh"
            }
        },
        {
            "id": 2,
            "title": "Natus voluptatibus debitis et laborum fugit eveniet nostrum quis.",
            "approval_status": 1,
            "reward": 0,
            "description": "Repellat cupiditate totam corporis distinctio exercitationem architecto excepturi quam. Deserunt id non quod quia commodi molestias. Maxime aut hic aut doloribus quos excepturi. Fugiat quam dolores quis veritatis. Totam aut consequuntur perspiciatis provident consequatur sunt voluptatem. Consequatur similique qui ipsum. Autem unde dolorem facere quos necessitatibus amet. Deleniti est voluptas rem eveniet. Perspiciatis accusamus autem dicta necessitatibus et. Veniam soluta blanditiis voluptas ex. Sit aut et ut eaque laboriosam amet dolor ut. Perspiciatis impedit qui amet. Qui sit corrupti est voluptatem. Qui ipsa natus praesentium magnam unde perferendis laudantium. Iste qui rem perspiciatis architecto omnis facilis culpa adipisci.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 107,
                "name": "Sed voluptas autem quod dignissimos.",
                "description": "Nam quas optio voluptatem aut necessitatibus.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 53,
                "name": "Consequatur voluptatem veritatis alias nulla neque eius quis atque.",
                "description": "Provident consequatur sit maxime aut voluptatum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 3,
            "title": "Cumque ut impedit enim sunt labore.",
            "approval_status": 1,
            "reward": 0,
            "description": "Mollitia sed dolore fuga rerum ut esse dolores. Consequuntur est sunt soluta qui explicabo qui asperiores. Itaque possimus explicabo eligendi explicabo veritatis. Repudiandae veniam in eaque assumenda vel cupiditate. Impedit quos nihil cumque eos. Soluta qui sapiente quia incidunt. Iure doloribus unde vel exercitationem beatae et voluptatem. Voluptas eum omnis dolorem eveniet. Quisquam nisi molestias quia aperiam. Non veniam voluptates voluptatum. Officia eos minus et aut delectus a. Optio enim neque ex doloribus expedita nobis. Aut magni rerum recusandae sunt quaerat et. Dolores placeat amet consequatur ducimus. Vel quibusdam debitis est saepe porro vel qui. Voluptatibus saepe sunt qui maxime et ducimus quibusdam qui. Quidem dolor error dolore possimus quisquam odit dolores. Excepturi voluptatem et in id maxime possimus. Saepe non eveniet blanditiis id minima enim amet.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 109,
                "name": "Tenetur corrupti sint dolores incidunt quia.",
                "description": "Sint vel quod accusantium odio sed.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 54,
                "name": "Voluptate nostrum aliquam qui non architecto debitis.",
                "description": "Eveniet impedit saepe et ut facilis.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 4,
            "title": "Ut ut ratione eius quam dolorem fugit ut.",
            "approval_status": 1,
            "reward": 0,
            "description": "Et omnis et minima sed dolor tempore ratione similique. Dolores facilis dicta esse nisi voluptatem vel. Quis quis sed et illum culpa alias dicta harum. Cum est nostrum ut suscipit molestiae. Assumenda dolorum rerum odit cupiditate. Corporis iste enim voluptatem ullam in maxime et. Hic voluptas qui qui aut. Nisi quos doloremque odio quo dolorem eius alias. Quo eum deserunt qui adipisci necessitatibus laudantium voluptatem. Dicta aut tenetur nihil repellat. Id earum totam deleniti. Quisquam error nemo sit adipisci et. Est esse amet ut eligendi animi in repudiandae quasi. Non odio nisi maxime nihil ipsum quas illum.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 111,
                "name": "Corporis omnis qui velit natus temporibus sint tenetur nisi.",
                "description": "Vero nihil doloribus possimus doloremque.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 55,
                "name": "Dignissimos maiores unde velit occaecati sapiente amet eum.",
                "description": "Suscipit sequi delectus ea sit est animi unde.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 5,
            "title": "Eaque dolorum a cum dolores possimus commodi ut.",
            "approval_status": 1,
            "reward": 0,
            "description": "Deserunt maxime et expedita earum in. Aut eaque possimus eum tenetur animi dolorum suscipit vel. Qui amet quasi in quasi laborum cum rerum. Cum hic ipsum in autem amet nostrum exercitationem et. Voluptates nulla autem rerum eveniet qui vel. Veniam in sit ut corporis sunt deserunt. Rerum quia modi qui in. Est quidem magni laborum eligendi modi sequi. Iure similique rerum molestiae dolor officia et qui. Est assumenda repellendus debitis aut. Quo autem aut beatae. Quia voluptas quia necessitatibus quidem et. Quia deleniti beatae autem est est delectus. Nostrum molestias repellat possimus nisi in autem eum. Veritatis aut nemo at accusantium.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 113,
                "name": "Eum et ipsam odit et ullam.",
                "description": "Aut et aut architecto rerum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 56,
                "name": "Ipsam harum occaecati dolore non provident voluptate et.",
                "description": "Sint earum maxime eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-03 17:33:55",
            "images": [],
            "questions": [],
            "city": null
        }
    ]
}
```

### HTTP Request
`GET api/home/search/keywords`


<!-- END_a381454c94e24449400bd187815c6920 -->

<!-- START_109013899e0bc43247b0f00b67f889cf -->
## api/categories
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Nisi non fugiat laboriosam voluptates temporibus quo deserunt.",
            "description": "Cupiditate quis pariatur quibusdam odit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 2,
            "name": "Quos soluta vitae necessitatibus minus.",
            "description": "Est quis rerum et aliquam.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 3,
            "name": "Sed excepturi ea et qui.",
            "description": "Deserunt animi iusto et quo qui explicabo optio.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 4,
            "name": "Perferendis modi voluptate necessitatibus voluptas occaecati reprehenderit.",
            "description": "Commodi sit provident qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 5,
            "name": "Sunt ut eveniet est cupiditate.",
            "description": "Repudiandae omnis magnam accusamus molestiae non aut.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 6,
            "name": "Eius aperiam dignissimos reiciendis.",
            "description": "Quo odio neque similique beatae enim.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 7,
            "name": "Qui doloremque aliquid animi ut autem.",
            "description": "Nihil atque quasi cumque et exercitationem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 8,
            "name": "Architecto ut natus nihil optio dolore fugit reiciendis quia.",
            "description": "Quidem pariatur reiciendis voluptas repellendus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 9,
            "name": "Sed nihil fugit voluptatum soluta error cum sit enim.",
            "description": "Saepe illo illo est iusto autem exercitationem et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 10,
            "name": "Et vel odit vero dolor repellendus dolore ullam deleniti.",
            "description": "Exercitationem placeat non aut repellendus nam possimus omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 11,
            "name": "Eius voluptatem quo iusto voluptatem.",
            "description": "Rerum provident et consequatur sunt.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 12,
            "name": "Et et impedit explicabo dolorem recusandae.",
            "description": "Sit et vitae ea eos minima qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 13,
            "name": "Perferendis provident deserunt omnis et fuga vel.",
            "description": "Sed itaque rerum dignissimos iste facere ipsa et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 14,
            "name": "Placeat maiores cumque fuga omnis dolor nemo.",
            "description": "Repellat temporibus maiores qui temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 15,
            "name": "Sed voluptas rerum ut.",
            "description": "Perspiciatis quia odio sunt pariatur nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 16,
            "name": "Voluptate corrupti laborum nostrum magni placeat aut.",
            "description": "Libero laudantium numquam aspernatur ab non ex est.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 17,
            "name": "Saepe quis et sint quisquam.",
            "description": "Cum perspiciatis illum et vel.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 18,
            "name": "Maiores molestiae sint autem.",
            "description": "Ipsam corrupti aut aut et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 19,
            "name": "Quae voluptatibus eius quae blanditiis reprehenderit.",
            "description": "Illum autem et veniam rerum illo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 20,
            "name": "Officia vel quod magnam doloribus.",
            "description": "Tenetur cum culpa nam tenetur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 21,
            "name": "At molestias veniam dolor consequuntur laudantium ut esse.",
            "description": "Illum quia nihil dolor voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 22,
            "name": "Natus similique debitis inventore rerum unde aut.",
            "description": "Odit consectetur odit minima qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 23,
            "name": "Rerum dolor nisi facere inventore quisquam tempore.",
            "description": "Nobis culpa numquam tenetur ut dignissimos.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 24,
            "name": "Voluptates illo id optio esse ratione velit ut.",
            "description": "Quod neque est nemo officiis debitis itaque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 25,
            "name": "Et dolores deleniti est eum tempore molestiae quam.",
            "description": "Impedit aut ullam veniam quis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 26,
            "name": "Explicabo impedit velit dignissimos exercitationem dolor.",
            "description": "In et neque maiores dolorem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 27,
            "name": "Fugit totam enim accusamus sapiente quidem voluptate.",
            "description": "Sint qui facilis perferendis in ipsa ea fuga ullam.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 28,
            "name": "Laboriosam fuga et libero distinctio sunt natus.",
            "description": "Dolorem iure ut reiciendis qui esse nihil a.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 29,
            "name": "Aut omnis molestiae voluptatem natus quo ducimus culpa.",
            "description": "Nobis possimus sint corrupti facere.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 30,
            "name": "Et enim molestiae culpa dolores dolor.",
            "description": "Distinctio amet quis consequatur aliquid optio voluptas neque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 31,
            "name": "Ut quia dicta similique nam optio dolor quasi.",
            "description": "Ipsam et totam enim nostrum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 32,
            "name": "Earum et non iusto ut nam.",
            "description": "Et qui sequi mollitia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 33,
            "name": "Tempore distinctio deleniti enim necessitatibus eum error.",
            "description": "Repellendus labore odio facere et ex.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 34,
            "name": "Rem est optio velit voluptatem voluptatem quas incidunt.",
            "description": "Animi adipisci blanditiis est temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 35,
            "name": "Laudantium ut repudiandae voluptate est quisquam est distinctio explicabo.",
            "description": "Odio iste ducimus recusandae iure adipisci.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 36,
            "name": "Quidem est distinctio aut et voluptate cumque.",
            "description": "Numquam dolor facilis vel culpa.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 37,
            "name": "Neque possimus et quis non est porro mollitia.",
            "description": "Occaecati cumque dicta quisquam iste.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 38,
            "name": "Et distinctio omnis et ex vel.",
            "description": "Aliquam dolorem exercitationem et reiciendis vel et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 39,
            "name": "Autem laboriosam quia ullam natus.",
            "description": "Aut quasi quia sit tenetur velit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 40,
            "name": "Sit maiores facere suscipit quidem qui.",
            "description": "Molestiae qui suscipit voluptatem maxime.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 41,
            "name": "Doloremque dignissimos ea aliquid sunt quis placeat minima.",
            "description": "Eius alias et dolorum accusantium.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 42,
            "name": "Tempore eum voluptas ut earum suscipit sit.",
            "description": "Possimus minima deserunt quisquam nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 43,
            "name": "Provident et impedit enim id voluptates nisi nostrum nihil.",
            "description": "Quisquam architecto ipsum aut vitae alias aspernatur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 44,
            "name": "Modi consequatur iste aperiam mollitia sit nihil enim.",
            "description": "Rerum reprehenderit quas commodi alias.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 45,
            "name": "Quia animi aliquid deleniti molestiae mollitia explicabo aut.",
            "description": "Et praesentium ullam voluptas ea sapiente.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 46,
            "name": "Quasi quis maxime dolores omnis et quia possimus.",
            "description": "Quas ab consequuntur qui est.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 47,
            "name": "Totam eveniet tempore et aut quae fuga.",
            "description": "Eum odit nisi asperiores voluptas quia velit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 48,
            "name": "Fugiat aliquam odit similique quasi et dolorem.",
            "description": "Saepe ullam reprehenderit quibusdam error magni quasi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 49,
            "name": "Ut dignissimos dolorem sunt autem ut consequatur.",
            "description": "Dolore quasi reprehenderit praesentium non accusantium qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 50,
            "name": "Provident quo odio quidem ab.",
            "description": "Ut dolores est nemo commodi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 51,
            "name": "Earum a est et aut.",
            "description": "Illo sunt est in cupiditate.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 52,
            "name": "Earum illum aut asperiores perferendis.",
            "description": "Non possimus atque sapiente vel.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 53,
            "name": "Itaque maxime occaecati voluptas in excepturi id sed.",
            "description": "Debitis magni pariatur eos et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 54,
            "name": "Eligendi cumque pariatur esse aut architecto a ut.",
            "description": "Nam eaque dignissimos aut quo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 55,
            "name": "Deleniti amet aliquam numquam atque.",
            "description": "Minima facilis exercitationem ullam maiores quo qui rerum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 56,
            "name": "Expedita nulla minus consequuntur nostrum soluta consequatur.",
            "description": "Repudiandae rerum est molestiae officiis quia consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 57,
            "name": "Sunt voluptas tempore repellendus et placeat eaque earum.",
            "description": "Sed autem officiis nesciunt quas.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 58,
            "name": "Quibusdam officia autem aut voluptate quidem.",
            "description": "Voluptatem eius inventore ratione voluptate commodi qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 59,
            "name": "Incidunt nesciunt atque ut est.",
            "description": "Similique ad quo aut similique enim dolor fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 60,
            "name": "Eum nihil sit aut consequatur odio dignissimos quam.",
            "description": "Sed hic mollitia accusantium qui nostrum minus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 61,
            "name": "Dolorem temporibus soluta ex velit.",
            "description": "Autem sit vel quia optio eaque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 62,
            "name": "Ipsa et est cumque molestias nobis aut placeat.",
            "description": "Non ut voluptatum beatae dolores qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 63,
            "name": "Quis distinctio optio repellendus voluptatibus omnis amet.",
            "description": "Excepturi est alias ex voluptas inventore mollitia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 64,
            "name": "Sint qui quia voluptas molestiae sit nemo.",
            "description": "Dolor dolor laudantium dolores libero.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 65,
            "name": "Enim quo voluptatem totam temporibus est et aperiam.",
            "description": "Mollitia nam harum saepe animi facere.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 66,
            "name": "Harum soluta eaque est perferendis ea minima.",
            "description": "Suscipit sint eum voluptas non velit fuga aliquid maxime.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 67,
            "name": "Molestias ut dolor est illum.",
            "description": "Iusto atque tempore incidunt similique quod.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 68,
            "name": "Perspiciatis laborum non temporibus fugit repellendus et.",
            "description": "Amet ut rerum atque assumenda consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 69,
            "name": "Et ipsum sint sint fugit quasi.",
            "description": "Ex molestiae dolorum est sed autem nihil hic officia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 70,
            "name": "Excepturi eaque assumenda repellendus.",
            "description": "Debitis ut id qui ducimus qui voluptate.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 71,
            "name": "Dolorum quia vero enim delectus quas fuga.",
            "description": "Possimus nihil aliquid aut exercitationem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 72,
            "name": "Voluptatem porro ipsa quia nobis.",
            "description": "Ipsum perferendis dignissimos illum soluta.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 73,
            "name": "Earum et quia velit et sequi vel expedita.",
            "description": "Necessitatibus eum molestiae quia aut omnis in.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 74,
            "name": "Et praesentium dignissimos ut rerum in et aut.",
            "description": "Aut eum deserunt eos molestiae et est nostrum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 75,
            "name": "Voluptas itaque ipsam fuga ut.",
            "description": "Quia animi fuga cumque dolores a.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 76,
            "name": "Et unde est quod error ducimus.",
            "description": "Enim est sed maxime rerum laudantium autem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 77,
            "name": "Autem sit quod voluptas consectetur est minima.",
            "description": "Aut suscipit illum enim ipsum laudantium excepturi voluptatibus nemo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 78,
            "name": "Consequatur magnam ut dolores animi.",
            "description": "Incidunt aperiam dicta doloremque inventore ad amet nesciunt.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 79,
            "name": "Ut ut sapiente deleniti consectetur perspiciatis qui maiores sunt.",
            "description": "Ipsum magnam laudantium aut similique dicta.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 80,
            "name": "Minus eos eius modi dignissimos commodi.",
            "description": "Nam consequatur natus consequuntur repellat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 81,
            "name": "Dolorem ducimus aut quo.",
            "description": "Temporibus quidem et vitae enim.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 82,
            "name": "Inventore nisi hic voluptas soluta et distinctio ipsam.",
            "description": "Eveniet mollitia iste quia neque blanditiis officia distinctio dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 83,
            "name": "Amet amet id omnis facilis in cum.",
            "description": "Blanditiis totam et qui doloremque molestias.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 84,
            "name": "Blanditiis debitis ea dolore ipsum quia.",
            "description": "Voluptatem culpa eum rerum totam vel.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 85,
            "name": "Quidem et magni quisquam aliquid.",
            "description": "Molestiae laboriosam rerum enim iure maiores asperiores reprehenderit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 86,
            "name": "Sed reprehenderit nulla velit nulla.",
            "description": "Est molestias nobis consequuntur debitis voluptatum sint eveniet.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 87,
            "name": "Earum ratione qui voluptates dolor tempora architecto.",
            "description": "Voluptates at dolores ullam velit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 88,
            "name": "Velit quod dolorem laborum.",
            "description": "Exercitationem perspiciatis itaque consequuntur enim.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 89,
            "name": "Quo aliquam nesciunt fugit sed earum.",
            "description": "Sapiente ad fuga voluptatem aperiam ullam.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 90,
            "name": "Voluptate dolor nulla voluptatem id aspernatur.",
            "description": "Iste odio recusandae vel soluta sint veniam.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 91,
            "name": "Nihil ullam quo aperiam a eos nihil eveniet.",
            "description": "Rem at corporis veniam vel ipsam eos minima.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 92,
            "name": "Distinctio modi eaque quia rerum aut aperiam.",
            "description": "Dicta alias earum vitae nihil qui accusamus est.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 93,
            "name": "Itaque temporibus dolore quam quaerat iusto et provident.",
            "description": "Quam minus rerum provident est maxime ea.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 94,
            "name": "Ullam sit quas nihil officiis cupiditate cum.",
            "description": "Rerum nemo explicabo itaque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 95,
            "name": "Blanditiis repudiandae repellendus occaecati error nemo veritatis.",
            "description": "Rerum sint consequatur est modi omnis minima.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 96,
            "name": "Consequatur illo hic quaerat non sequi.",
            "description": "Velit deserunt nihil nemo maiores impedit magni.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 97,
            "name": "Temporibus illo sint officia eaque dolor quibusdam.",
            "description": "Veritatis esse beatae eum dolor ratione omnis est.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 98,
            "name": "Est dolores consequatur omnis a animi non at.",
            "description": "Reprehenderit accusantium animi fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 99,
            "name": "Adipisci magnam aut at aut maxime sequi omnis veniam.",
            "description": "Qui aliquam velit quidem aliquid.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 100,
            "name": "Veritatis minima voluptatum ducimus laudantium praesentium sit.",
            "description": "Perspiciatis aut optio in molestiae omnis inventore itaque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 101,
            "name": "Nostrum commodi cupiditate explicabo vitae harum distinctio.",
            "description": "Magni necessitatibus debitis quo dolores commodi sunt ut.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 102,
            "name": "Neque sint sint nobis dicta ducimus.",
            "description": "Accusamus officia facere consectetur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 103,
            "name": "Harum aut alias facere ut consequuntur voluptatem.",
            "description": "Enim sed odit qui ut vitae quia vitae.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 104,
            "name": "Magni temporibus numquam consequatur aliquam impedit.",
            "description": "Est nemo molestiae voluptas facere et ut modi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 105,
            "name": "Aspernatur voluptatem velit libero aperiam et eos.",
            "description": "Nulla explicabo sunt ea.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 106,
            "name": "Odit dolorem perferendis magnam corrupti rerum molestiae dolorum.",
            "description": "Facere quos facilis mollitia quibusdam delectus beatae sint.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 107,
            "name": "Officia illum rerum qui omnis quia est.",
            "description": "In sit nihil odit aspernatur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 108,
            "name": "Animi facere voluptatibus neque minus quod tempore.",
            "description": "Repudiandae similique nihil tempore earum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 109,
            "name": "Inventore et dignissimos error qui perferendis et labore.",
            "description": "Et similique aut dicta quae modi vitae et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 110,
            "name": "Ratione et optio ut ratione officia quo rerum.",
            "description": "Molestias quia ullam tempore aspernatur facilis rerum excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 111,
            "name": "Dicta sed molestiae dolores fuga.",
            "description": "Dolores aut tempora non.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 112,
            "name": "Doloribus voluptas voluptates non autem.",
            "description": "Voluptas explicabo asperiores facere nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 113,
            "name": "At ad provident rem molestias quam quam magnam recusandae.",
            "description": "Fugiat omnis eos ut blanditiis explicabo error.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 114,
            "name": "Voluptas est commodi rem aliquid.",
            "description": "Repellendus dolor est et sed iusto perferendis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        }
    ]
}
```

### HTTP Request
`GET api/categories`


<!-- END_109013899e0bc43247b0f00b67f889cf -->

<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
## api/categories/{category}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Nisi non fugiat laboriosam voluptates temporibus quo deserunt.",
        "description": "Cupiditate quis pariatur quibusdam odit.",
        "image": "http:\/\/wajad.test\/default-icon.png",
        "item_coount": 0
    }
}
```

### HTTP Request
`GET api/categories/{category}`


<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->

<!-- START_5e5665d3d2e746a7e25d945b8f88e0f6 -->
## api/subCategories/{type?}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/subCategories/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/subCategories/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Placeat voluptatibus maxime et sed molestiae recusandae inventore.",
            "description": "Expedita minus atque modi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Qui deserunt et commodi in libero beatae architecto.",
            "description": "Aut totam odio omnis aut quia error est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Aperiam rerum illum et vel sit.",
            "description": "Non odio corporis consequuntur accusamus optio quos corrupti.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Eum velit aut consectetur id voluptates aut.",
            "description": "Quo consequatur quos voluptas repudiandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Ut aut excepturi et qui.",
            "description": "Maiores maiores aut officia commodi consequatur omnis et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Quia iste repudiandae ab similique dolorem pariatur ipsam necessitatibus.",
            "description": "Porro cumque rem perferendis asperiores commodi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Aspernatur reiciendis atque rerum velit suscipit nesciunt.",
            "description": "Consequatur nihil tempora enim deserunt inventore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Sit accusamus ad ipsam qui quia non.",
            "description": "Voluptates natus quis ut officia in reiciendis enim.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Illum quia voluptatibus qui eveniet dolorem consequatur cum.",
            "description": "Perspiciatis voluptates sunt soluta voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Rerum provident quia consequuntur molestiae illo quisquam.",
            "description": "Distinctio quia nemo aliquam occaecati voluptas sunt doloribus distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Aut aut voluptates maxime tempora dolorem non.",
            "description": "Labore voluptatem non iusto odio iste maiores voluptates.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Repudiandae officia numquam harum et rerum quia.",
            "description": "Natus quia cupiditate unde officia molestiae qui in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Deleniti tempore ea odio modi expedita.",
            "description": "Ad dolor autem cupiditate ipsa dolorem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Totam et officia aut recusandae ut dicta animi.",
            "description": "Praesentium esse nihil tempore est et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Pariatur eum dolores rerum vel ipsam error tempore.",
            "description": "Ut omnis cumque quasi alias quis tempore est excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Vel sequi mollitia deserunt repellendus sit ullam.",
            "description": "Praesentium quia unde mollitia qui esse.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Esse itaque optio labore voluptate totam quis.",
            "description": "In aperiam error saepe praesentium.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Nesciunt aliquam repudiandae error necessitatibus ut ea sit qui.",
            "description": "Nam error provident rerum vel.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Nam ducimus rerum voluptate sit.",
            "description": "Officiis est aut commodi qui soluta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Fugiat aut sequi quia reiciendis quae molestiae.",
            "description": "Dolorem impedit id aut velit et incidunt fuga.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Commodi mollitia et impedit sed excepturi laboriosam et.",
            "description": "Velit aut quos vel dolor et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Est ipsum corporis doloremque qui ab.",
            "description": "Molestiae ipsa qui possimus veritatis consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Asperiores voluptas et quaerat ut voluptas deserunt.",
            "description": "Dignissimos non quo omnis optio quia et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Iure id et facere modi sapiente alias nesciunt dicta.",
            "description": "Tempora nostrum dolorem et est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Ipsa nam odit vel adipisci.",
            "description": "Doloribus sunt voluptas cumque asperiores aut consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Nihil officia nostrum qui.",
            "description": "Et quaerat quis qui corporis est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 27,
            "name": "Praesentium qui sunt sint eveniet quae veritatis neque.",
            "description": "Praesentium placeat esse quia et ea.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 28,
            "name": "Doloribus omnis voluptas voluptas laudantium voluptate.",
            "description": "Omnis at qui ducimus mollitia est error.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 29,
            "name": "Beatae eum harum facilis sit expedita dolorem.",
            "description": "Occaecati et et veniam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 30,
            "name": "Optio asperiores nisi eius velit qui dolor nobis repellendus.",
            "description": "Voluptas quidem odio facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 31,
            "name": "Id omnis mollitia velit est omnis.",
            "description": "Omnis impedit ex quibusdam ullam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 32,
            "name": "Sint necessitatibus ipsam eum inventore illo enim placeat.",
            "description": "Ea quae eius est est quas assumenda.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 33,
            "name": "Doloremque et dolor nihil dolor neque cumque.",
            "description": "Voluptate dolores quidem quo omnis dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 34,
            "name": "Ullam ullam nam nostrum consectetur animi.",
            "description": "Reiciendis blanditiis ut ex.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 35,
            "name": "Et exercitationem veniam unde occaecati.",
            "description": "Ut iste pariatur itaque velit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 36,
            "name": "Et placeat vel officiis nulla tempore ut eligendi neque.",
            "description": "Temporibus ipsam repellendus consequuntur sed assumenda dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 37,
            "name": "Eveniet magnam dolor reprehenderit voluptatem repellat cupiditate id.",
            "description": "Eos atque ut non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 38,
            "name": "Et libero delectus reiciendis autem.",
            "description": "Quod nihil accusantium magni omnis distinctio eius sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 39,
            "name": "Autem error molestias esse odio velit.",
            "description": "Illum harum fugit aut libero.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 40,
            "name": "Delectus sed sit ducimus nulla et sequi.",
            "description": "Rerum cumque eos sed id harum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 41,
            "name": "Ullam quisquam accusamus repellendus rerum soluta dolores dolorem.",
            "description": "Iusto consequuntur atque dolore sequi et rerum animi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 42,
            "name": "Dolorem omnis nobis vel porro.",
            "description": "Molestiae est quo rerum magnam cum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 43,
            "name": "Ab expedita optio sunt vitae ab ut omnis.",
            "description": "Doloremque laboriosam quaerat et nihil veritatis ut natus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 44,
            "name": "Non et iure voluptatem dolor sint officiis dicta quo.",
            "description": "Soluta reiciendis sed sunt ea autem vel.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 45,
            "name": "In ea et nobis tempore velit ea.",
            "description": "Et qui eius atque deserunt omnis ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 46,
            "name": "Dignissimos debitis deserunt sed et eius qui.",
            "description": "Sunt impedit temporibus ea architecto sed recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 47,
            "name": "Aliquid commodi consectetur quia provident cupiditate deserunt eos impedit.",
            "description": "Error ut placeat corporis perspiciatis ipsa qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 48,
            "name": "Temporibus nihil nostrum laboriosam perspiciatis dolorem facilis quia.",
            "description": "Ut optio non nesciunt est magni culpa non eaque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 49,
            "name": "Nobis voluptas eos sint repellendus et id velit.",
            "description": "Voluptatum animi mollitia ab adipisci inventore consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 50,
            "name": "Ullam eos dolores nesciunt quod incidunt.",
            "description": "Reiciendis beatae voluptates ut aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 51,
            "name": "Autem numquam sunt consectetur optio quia velit.",
            "description": "Sunt voluptatum in inventore autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 52,
            "name": "Aperiam minus nisi rerum eos.",
            "description": "Impedit dolorem numquam rem saepe sit facere.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 53,
            "name": "Repudiandae aut iusto nisi odit odio nemo aut animi.",
            "description": "Omnis amet temporibus molestiae quia quo neque eos ipsum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 54,
            "name": "Vel voluptatibus et dignissimos ut corporis eos sunt.",
            "description": "Voluptatem cupiditate dolor et esse consectetur tenetur debitis consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 55,
            "name": "Velit quo alias debitis id reprehenderit non neque.",
            "description": "Quidem recusandae aut et fuga distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 56,
            "name": "Magni consequuntur voluptas earum natus.",
            "description": "Ad ipsa officiis illum eos quo alias voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 57,
            "name": "Excepturi dolorum reprehenderit et accusamus.",
            "description": "Voluptatum qui id eum voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 58,
            "name": "Sunt commodi nobis adipisci quis non.",
            "description": "Et enim architecto facere vero saepe corrupti.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 59,
            "name": "Rerum accusantium cumque maxime recusandae.",
            "description": "Laboriosam aliquid ea dolor eaque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 60,
            "name": "Accusantium assumenda perspiciatis vel et odio ut est.",
            "description": "Ea in repellendus maxime nemo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 61,
            "name": "Voluptatum est aut enim in nihil.",
            "description": "Pariatur error quidem sequi aut sit iusto perferendis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 62,
            "name": "Consequatur vel et et est sed doloribus sunt.",
            "description": "Est et consequatur quia est impedit est dicta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 63,
            "name": "Vitae vel illo qui quos doloremque.",
            "description": "Et alias libero qui repellat velit ea ratione.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 64,
            "name": "Vitae et voluptas ratione et dolorum optio.",
            "description": "Quasi et explicabo ut et nemo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 65,
            "name": "Neque laborum omnis debitis nostrum quisquam veniam quaerat ipsa.",
            "description": "Consequatur ab reiciendis ea eos veniam illum dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 66,
            "name": "Et et enim fugiat qui non similique illum exercitationem.",
            "description": "Facere provident aut accusantium ullam aspernatur aut aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 67,
            "name": "Suscipit est dolorum vel sit.",
            "description": "Repellendus culpa maiores autem maxime.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 68,
            "name": "Error dolorem et esse aut rem.",
            "description": "Modi incidunt exercitationem facere repellat deleniti velit nam quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 69,
            "name": "Iste earum qui reprehenderit sit quaerat dolorem.",
            "description": "Sed nihil nihil et quasi nihil reprehenderit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 70,
            "name": "Tempore soluta aspernatur optio harum quidem non.",
            "description": "Dolorum repellat magnam veritatis explicabo qui est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 71,
            "name": "Nesciunt totam a deserunt optio sunt quia deserunt.",
            "description": "Id quis assumenda dolor earum et facere est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 72,
            "name": "Est facilis totam debitis sint eum.",
            "description": "Corrupti dolores voluptas autem voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 73,
            "name": "Sed odit voluptas odio minima architecto recusandae.",
            "description": "Omnis est dolorem aut aut eaque rerum vitae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 74,
            "name": "Ipsum sapiente harum eos perferendis cumque.",
            "description": "Saepe veritatis cum aliquid veritatis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 75,
            "name": "Rerum facilis praesentium qui nemo minus omnis adipisci.",
            "description": "Doloremque architecto voluptas iure exercitationem repellat voluptas et quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 76,
            "name": "Vel aut inventore iure beatae corrupti et sit.",
            "description": "Mollitia dolor dolor quia ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 77,
            "name": "Eligendi et nisi consequuntur.",
            "description": "Et rerum quae voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 78,
            "name": "Nemo est voluptas minima illum doloremque ea quidem consequatur.",
            "description": "Culpa ab in praesentium rem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 79,
            "name": "Ut quia alias pariatur deserunt est et necessitatibus.",
            "description": "Nisi perferendis sapiente voluptatem qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 80,
            "name": "Iure nesciunt voluptatem est cupiditate ratione.",
            "description": "Aut sequi vel qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 81,
            "name": "Ex omnis omnis vero dolorum amet officia.",
            "description": "Fugit doloremque dolorem hic libero delectus harum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 82,
            "name": "Aut numquam voluptatibus quia facere assumenda quos.",
            "description": "Quam nemo corrupti voluptas sed id maxime tenetur dolorem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 83,
            "name": "Praesentium nihil ut deserunt officia.",
            "description": "At asperiores in architecto recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 84,
            "name": "Aliquam eum qui minus eveniet possimus.",
            "description": "Alias aut ipsa et est amet.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 85,
            "name": "Sit repellat ex eum recusandae ut nesciunt dolores.",
            "description": "Voluptate vitae mollitia voluptas fugit necessitatibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 86,
            "name": "Minus quas eos aut aut dolor.",
            "description": "Sunt nemo autem quo debitis sapiente quia laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 87,
            "name": "Quaerat ea ut recusandae aut illo aut ipsa sed.",
            "description": "Assumenda et quia quia et ipsa numquam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 88,
            "name": "Vero sed fuga aut quia et eum.",
            "description": "Voluptatibus distinctio fugit deleniti dicta assumenda dolorem ipsa.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 89,
            "name": "Laborum minima voluptatibus ut enim voluptas cum perferendis.",
            "description": "Tempora et nam atque sunt et nobis non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 90,
            "name": "Ratione amet libero repellendus dolor.",
            "description": "Facere nemo doloremque alias voluptas dolores voluptates culpa.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 91,
            "name": "Omnis dolor eligendi qui sunt accusamus rerum quibusdam.",
            "description": "Aspernatur impedit unde non et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 92,
            "name": "Magnam id ut accusantium earum laboriosam voluptatum dolorem.",
            "description": "Nihil molestiae doloribus voluptatem quasi architecto praesentium nulla.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 93,
            "name": "Sed voluptate explicabo eius sed cum eum.",
            "description": "Sunt in minus fuga.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 94,
            "name": "Dicta architecto omnis quae quod eveniet totam nesciunt.",
            "description": "Dolorem consequatur voluptatem nisi repellendus blanditiis harum qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 95,
            "name": "Quo enim fuga doloribus dolores ab deserunt.",
            "description": "Cum in repudiandae rerum quibusdam quibusdam iure beatae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 96,
            "name": "Amet ut laboriosam optio nam dignissimos fuga.",
            "description": "Sit aut ut deserunt quidem quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 97,
            "name": "Nesciunt natus tempora omnis dolore esse quaerat.",
            "description": "Voluptatem ut minima sint aut voluptas quisquam temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 98,
            "name": "Error nostrum cum et voluptatem ut eligendi.",
            "description": "Ullam ut praesentium sit vel enim et cum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 99,
            "name": "Asperiores et cumque repellat qui debitis reiciendis.",
            "description": "Cum rerum ex explicabo ipsum quis qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 100,
            "name": "Aliquid expedita corrupti minus aut aspernatur cupiditate.",
            "description": "Aut non earum ut ut et ipsa aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 101,
            "name": "Accusantium molestiae ea provident iste aut et.",
            "description": "Aspernatur nemo aut accusamus reiciendis eum ab enim.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 102,
            "name": "Esse vitae vel et facere.",
            "description": "Molestiae eius molestiae non nostrum recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 103,
            "name": "Sequi praesentium qui numquam iste facere delectus sed id.",
            "description": "Architecto quos consequatur sit animi aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 104,
            "name": "Adipisci dignissimos reiciendis labore aliquam repellendus itaque ratione.",
            "description": "In est possimus nesciunt eligendi molestiae cum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 105,
            "name": "Facilis velit soluta quidem modi quibusdam et.",
            "description": "Rerum quidem consequatur officiis et et aut earum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 106,
            "name": "Et eveniet facere omnis voluptatum consequatur sunt.",
            "description": "Reprehenderit ea laboriosam ullam sit aperiam quibusdam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 107,
            "name": "Sed voluptas autem quod dignissimos.",
            "description": "Nam quas optio voluptatem aut necessitatibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 108,
            "name": "Aut natus est laborum at incidunt.",
            "description": "Aut sunt optio autem ad quasi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 109,
            "name": "Tenetur corrupti sint dolores incidunt quia.",
            "description": "Sint vel quod accusantium odio sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 110,
            "name": "Molestiae ducimus ipsa iste itaque necessitatibus laboriosam.",
            "description": "Sed voluptas ullam velit voluptas pariatur porro dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 111,
            "name": "Corporis omnis qui velit natus temporibus sint tenetur nisi.",
            "description": "Vero nihil doloribus possimus doloremque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 112,
            "name": "Error recusandae aspernatur suscipit ut laboriosam illum eveniet sint.",
            "description": "Fuga assumenda ut tempore doloremque non ratione ad.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 113,
            "name": "Eum et ipsam odit et ullam.",
            "description": "Aut et aut architecto rerum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 114,
            "name": "Et qui neque illo quia accusantium.",
            "description": "Laborum doloremque voluptate et totam hic facilis non sapiente.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        }
    ]
}
```

### HTTP Request
`GET api/subCategories/{type?}`


<!-- END_5e5665d3d2e746a7e25d945b8f88e0f6 -->

<!-- START_9a21b1430b311e3f5c5e91bf23343711 -->
## api/subCategories/{subCategory}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/subCategories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/subCategories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Placeat voluptatibus maxime et sed molestiae recusandae inventore.",
            "description": "Expedita minus atque modi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Qui deserunt et commodi in libero beatae architecto.",
            "description": "Aut totam odio omnis aut quia error est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Aperiam rerum illum et vel sit.",
            "description": "Non odio corporis consequuntur accusamus optio quos corrupti.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Eum velit aut consectetur id voluptates aut.",
            "description": "Quo consequatur quos voluptas repudiandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Ut aut excepturi et qui.",
            "description": "Maiores maiores aut officia commodi consequatur omnis et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Quia iste repudiandae ab similique dolorem pariatur ipsam necessitatibus.",
            "description": "Porro cumque rem perferendis asperiores commodi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Aspernatur reiciendis atque rerum velit suscipit nesciunt.",
            "description": "Consequatur nihil tempora enim deserunt inventore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Sit accusamus ad ipsam qui quia non.",
            "description": "Voluptates natus quis ut officia in reiciendis enim.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Illum quia voluptatibus qui eveniet dolorem consequatur cum.",
            "description": "Perspiciatis voluptates sunt soluta voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Rerum provident quia consequuntur molestiae illo quisquam.",
            "description": "Distinctio quia nemo aliquam occaecati voluptas sunt doloribus distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Aut aut voluptates maxime tempora dolorem non.",
            "description": "Labore voluptatem non iusto odio iste maiores voluptates.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Repudiandae officia numquam harum et rerum quia.",
            "description": "Natus quia cupiditate unde officia molestiae qui in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Deleniti tempore ea odio modi expedita.",
            "description": "Ad dolor autem cupiditate ipsa dolorem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Totam et officia aut recusandae ut dicta animi.",
            "description": "Praesentium esse nihil tempore est et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Pariatur eum dolores rerum vel ipsam error tempore.",
            "description": "Ut omnis cumque quasi alias quis tempore est excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Vel sequi mollitia deserunt repellendus sit ullam.",
            "description": "Praesentium quia unde mollitia qui esse.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Esse itaque optio labore voluptate totam quis.",
            "description": "In aperiam error saepe praesentium.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Nesciunt aliquam repudiandae error necessitatibus ut ea sit qui.",
            "description": "Nam error provident rerum vel.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Nam ducimus rerum voluptate sit.",
            "description": "Officiis est aut commodi qui soluta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Fugiat aut sequi quia reiciendis quae molestiae.",
            "description": "Dolorem impedit id aut velit et incidunt fuga.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Commodi mollitia et impedit sed excepturi laboriosam et.",
            "description": "Velit aut quos vel dolor et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Est ipsum corporis doloremque qui ab.",
            "description": "Molestiae ipsa qui possimus veritatis consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Asperiores voluptas et quaerat ut voluptas deserunt.",
            "description": "Dignissimos non quo omnis optio quia et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Iure id et facere modi sapiente alias nesciunt dicta.",
            "description": "Tempora nostrum dolorem et est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Ipsa nam odit vel adipisci.",
            "description": "Doloribus sunt voluptas cumque asperiores aut consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Nihil officia nostrum qui.",
            "description": "Et quaerat quis qui corporis est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 27,
            "name": "Praesentium qui sunt sint eveniet quae veritatis neque.",
            "description": "Praesentium placeat esse quia et ea.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 28,
            "name": "Doloribus omnis voluptas voluptas laudantium voluptate.",
            "description": "Omnis at qui ducimus mollitia est error.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 29,
            "name": "Beatae eum harum facilis sit expedita dolorem.",
            "description": "Occaecati et et veniam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 30,
            "name": "Optio asperiores nisi eius velit qui dolor nobis repellendus.",
            "description": "Voluptas quidem odio facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 31,
            "name": "Id omnis mollitia velit est omnis.",
            "description": "Omnis impedit ex quibusdam ullam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 32,
            "name": "Sint necessitatibus ipsam eum inventore illo enim placeat.",
            "description": "Ea quae eius est est quas assumenda.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 33,
            "name": "Doloremque et dolor nihil dolor neque cumque.",
            "description": "Voluptate dolores quidem quo omnis dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 34,
            "name": "Ullam ullam nam nostrum consectetur animi.",
            "description": "Reiciendis blanditiis ut ex.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 35,
            "name": "Et exercitationem veniam unde occaecati.",
            "description": "Ut iste pariatur itaque velit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 36,
            "name": "Et placeat vel officiis nulla tempore ut eligendi neque.",
            "description": "Temporibus ipsam repellendus consequuntur sed assumenda dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 37,
            "name": "Eveniet magnam dolor reprehenderit voluptatem repellat cupiditate id.",
            "description": "Eos atque ut non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 38,
            "name": "Et libero delectus reiciendis autem.",
            "description": "Quod nihil accusantium magni omnis distinctio eius sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 39,
            "name": "Autem error molestias esse odio velit.",
            "description": "Illum harum fugit aut libero.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 40,
            "name": "Delectus sed sit ducimus nulla et sequi.",
            "description": "Rerum cumque eos sed id harum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 41,
            "name": "Ullam quisquam accusamus repellendus rerum soluta dolores dolorem.",
            "description": "Iusto consequuntur atque dolore sequi et rerum animi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 42,
            "name": "Dolorem omnis nobis vel porro.",
            "description": "Molestiae est quo rerum magnam cum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 43,
            "name": "Ab expedita optio sunt vitae ab ut omnis.",
            "description": "Doloremque laboriosam quaerat et nihil veritatis ut natus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 44,
            "name": "Non et iure voluptatem dolor sint officiis dicta quo.",
            "description": "Soluta reiciendis sed sunt ea autem vel.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 45,
            "name": "In ea et nobis tempore velit ea.",
            "description": "Et qui eius atque deserunt omnis ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 46,
            "name": "Dignissimos debitis deserunt sed et eius qui.",
            "description": "Sunt impedit temporibus ea architecto sed recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 47,
            "name": "Aliquid commodi consectetur quia provident cupiditate deserunt eos impedit.",
            "description": "Error ut placeat corporis perspiciatis ipsa qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 48,
            "name": "Temporibus nihil nostrum laboriosam perspiciatis dolorem facilis quia.",
            "description": "Ut optio non nesciunt est magni culpa non eaque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 49,
            "name": "Nobis voluptas eos sint repellendus et id velit.",
            "description": "Voluptatum animi mollitia ab adipisci inventore consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 50,
            "name": "Ullam eos dolores nesciunt quod incidunt.",
            "description": "Reiciendis beatae voluptates ut aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 51,
            "name": "Autem numquam sunt consectetur optio quia velit.",
            "description": "Sunt voluptatum in inventore autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 52,
            "name": "Aperiam minus nisi rerum eos.",
            "description": "Impedit dolorem numquam rem saepe sit facere.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 53,
            "name": "Repudiandae aut iusto nisi odit odio nemo aut animi.",
            "description": "Omnis amet temporibus molestiae quia quo neque eos ipsum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 54,
            "name": "Vel voluptatibus et dignissimos ut corporis eos sunt.",
            "description": "Voluptatem cupiditate dolor et esse consectetur tenetur debitis consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 55,
            "name": "Velit quo alias debitis id reprehenderit non neque.",
            "description": "Quidem recusandae aut et fuga distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 56,
            "name": "Magni consequuntur voluptas earum natus.",
            "description": "Ad ipsa officiis illum eos quo alias voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 57,
            "name": "Excepturi dolorum reprehenderit et accusamus.",
            "description": "Voluptatum qui id eum voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 58,
            "name": "Sunt commodi nobis adipisci quis non.",
            "description": "Et enim architecto facere vero saepe corrupti.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 59,
            "name": "Rerum accusantium cumque maxime recusandae.",
            "description": "Laboriosam aliquid ea dolor eaque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 60,
            "name": "Accusantium assumenda perspiciatis vel et odio ut est.",
            "description": "Ea in repellendus maxime nemo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 61,
            "name": "Voluptatum est aut enim in nihil.",
            "description": "Pariatur error quidem sequi aut sit iusto perferendis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 62,
            "name": "Consequatur vel et et est sed doloribus sunt.",
            "description": "Est et consequatur quia est impedit est dicta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 63,
            "name": "Vitae vel illo qui quos doloremque.",
            "description": "Et alias libero qui repellat velit ea ratione.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 64,
            "name": "Vitae et voluptas ratione et dolorum optio.",
            "description": "Quasi et explicabo ut et nemo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 65,
            "name": "Neque laborum omnis debitis nostrum quisquam veniam quaerat ipsa.",
            "description": "Consequatur ab reiciendis ea eos veniam illum dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 66,
            "name": "Et et enim fugiat qui non similique illum exercitationem.",
            "description": "Facere provident aut accusantium ullam aspernatur aut aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 67,
            "name": "Suscipit est dolorum vel sit.",
            "description": "Repellendus culpa maiores autem maxime.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 68,
            "name": "Error dolorem et esse aut rem.",
            "description": "Modi incidunt exercitationem facere repellat deleniti velit nam quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 69,
            "name": "Iste earum qui reprehenderit sit quaerat dolorem.",
            "description": "Sed nihil nihil et quasi nihil reprehenderit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 70,
            "name": "Tempore soluta aspernatur optio harum quidem non.",
            "description": "Dolorum repellat magnam veritatis explicabo qui est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 71,
            "name": "Nesciunt totam a deserunt optio sunt quia deserunt.",
            "description": "Id quis assumenda dolor earum et facere est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 72,
            "name": "Est facilis totam debitis sint eum.",
            "description": "Corrupti dolores voluptas autem voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 73,
            "name": "Sed odit voluptas odio minima architecto recusandae.",
            "description": "Omnis est dolorem aut aut eaque rerum vitae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 74,
            "name": "Ipsum sapiente harum eos perferendis cumque.",
            "description": "Saepe veritatis cum aliquid veritatis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 75,
            "name": "Rerum facilis praesentium qui nemo minus omnis adipisci.",
            "description": "Doloremque architecto voluptas iure exercitationem repellat voluptas et quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 76,
            "name": "Vel aut inventore iure beatae corrupti et sit.",
            "description": "Mollitia dolor dolor quia ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 77,
            "name": "Eligendi et nisi consequuntur.",
            "description": "Et rerum quae voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 78,
            "name": "Nemo est voluptas minima illum doloremque ea quidem consequatur.",
            "description": "Culpa ab in praesentium rem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 79,
            "name": "Ut quia alias pariatur deserunt est et necessitatibus.",
            "description": "Nisi perferendis sapiente voluptatem qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 80,
            "name": "Iure nesciunt voluptatem est cupiditate ratione.",
            "description": "Aut sequi vel qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 81,
            "name": "Ex omnis omnis vero dolorum amet officia.",
            "description": "Fugit doloremque dolorem hic libero delectus harum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 82,
            "name": "Aut numquam voluptatibus quia facere assumenda quos.",
            "description": "Quam nemo corrupti voluptas sed id maxime tenetur dolorem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 83,
            "name": "Praesentium nihil ut deserunt officia.",
            "description": "At asperiores in architecto recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 84,
            "name": "Aliquam eum qui minus eveniet possimus.",
            "description": "Alias aut ipsa et est amet.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 85,
            "name": "Sit repellat ex eum recusandae ut nesciunt dolores.",
            "description": "Voluptate vitae mollitia voluptas fugit necessitatibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 86,
            "name": "Minus quas eos aut aut dolor.",
            "description": "Sunt nemo autem quo debitis sapiente quia laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 87,
            "name": "Quaerat ea ut recusandae aut illo aut ipsa sed.",
            "description": "Assumenda et quia quia et ipsa numquam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 88,
            "name": "Vero sed fuga aut quia et eum.",
            "description": "Voluptatibus distinctio fugit deleniti dicta assumenda dolorem ipsa.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 89,
            "name": "Laborum minima voluptatibus ut enim voluptas cum perferendis.",
            "description": "Tempora et nam atque sunt et nobis non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 90,
            "name": "Ratione amet libero repellendus dolor.",
            "description": "Facere nemo doloremque alias voluptas dolores voluptates culpa.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 91,
            "name": "Omnis dolor eligendi qui sunt accusamus rerum quibusdam.",
            "description": "Aspernatur impedit unde non et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 92,
            "name": "Magnam id ut accusantium earum laboriosam voluptatum dolorem.",
            "description": "Nihil molestiae doloribus voluptatem quasi architecto praesentium nulla.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 93,
            "name": "Sed voluptate explicabo eius sed cum eum.",
            "description": "Sunt in minus fuga.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 94,
            "name": "Dicta architecto omnis quae quod eveniet totam nesciunt.",
            "description": "Dolorem consequatur voluptatem nisi repellendus blanditiis harum qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 95,
            "name": "Quo enim fuga doloribus dolores ab deserunt.",
            "description": "Cum in repudiandae rerum quibusdam quibusdam iure beatae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 96,
            "name": "Amet ut laboriosam optio nam dignissimos fuga.",
            "description": "Sit aut ut deserunt quidem quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 97,
            "name": "Nesciunt natus tempora omnis dolore esse quaerat.",
            "description": "Voluptatem ut minima sint aut voluptas quisquam temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 98,
            "name": "Error nostrum cum et voluptatem ut eligendi.",
            "description": "Ullam ut praesentium sit vel enim et cum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 99,
            "name": "Asperiores et cumque repellat qui debitis reiciendis.",
            "description": "Cum rerum ex explicabo ipsum quis qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 100,
            "name": "Aliquid expedita corrupti minus aut aspernatur cupiditate.",
            "description": "Aut non earum ut ut et ipsa aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 101,
            "name": "Accusantium molestiae ea provident iste aut et.",
            "description": "Aspernatur nemo aut accusamus reiciendis eum ab enim.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 102,
            "name": "Esse vitae vel et facere.",
            "description": "Molestiae eius molestiae non nostrum recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 103,
            "name": "Sequi praesentium qui numquam iste facere delectus sed id.",
            "description": "Architecto quos consequatur sit animi aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 104,
            "name": "Adipisci dignissimos reiciendis labore aliquam repellendus itaque ratione.",
            "description": "In est possimus nesciunt eligendi molestiae cum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 105,
            "name": "Facilis velit soluta quidem modi quibusdam et.",
            "description": "Rerum quidem consequatur officiis et et aut earum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 106,
            "name": "Et eveniet facere omnis voluptatum consequatur sunt.",
            "description": "Reprehenderit ea laboriosam ullam sit aperiam quibusdam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 107,
            "name": "Sed voluptas autem quod dignissimos.",
            "description": "Nam quas optio voluptatem aut necessitatibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 108,
            "name": "Aut natus est laborum at incidunt.",
            "description": "Aut sunt optio autem ad quasi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 109,
            "name": "Tenetur corrupti sint dolores incidunt quia.",
            "description": "Sint vel quod accusantium odio sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 110,
            "name": "Molestiae ducimus ipsa iste itaque necessitatibus laboriosam.",
            "description": "Sed voluptas ullam velit voluptas pariatur porro dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 111,
            "name": "Corporis omnis qui velit natus temporibus sint tenetur nisi.",
            "description": "Vero nihil doloribus possimus doloremque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 112,
            "name": "Error recusandae aspernatur suscipit ut laboriosam illum eveniet sint.",
            "description": "Fuga assumenda ut tempore doloremque non ratione ad.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 113,
            "name": "Eum et ipsam odit et ullam.",
            "description": "Aut et aut architecto rerum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 114,
            "name": "Et qui neque illo quia accusantium.",
            "description": "Laborum doloremque voluptate et totam hic facilis non sapiente.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        }
    ]
}
```

### HTTP Request
`GET api/subCategories/{subCategory}`


<!-- END_9a21b1430b311e3f5c5e91bf23343711 -->

<!-- START_068c0e43d7427c487297faaa68a4489a -->
## api/brands/{subcategory_id?}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/brands/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/brands/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Animi ducimus nobis atque exercitationem ut voluptatem et.",
            "description": "Nihil explicabo perspiciatis repellendus architecto.",
            "image": ""
        },
        {
            "id": 2,
            "name": "Sed nihil fugit esse voluptatem non.",
            "description": "Et qui commodi et vitae corrupti dicta et.",
            "image": ""
        },
        {
            "id": 3,
            "name": "Neque expedita eum cum sit quia.",
            "description": "Cupiditate odio quisquam voluptates ut necessitatibus necessitatibus sit expedita.",
            "image": "http:\/\/wajad.test\/\/tmp\/f9bec83b6d7c336dd9ac813b00d15faf.jpg"
        },
        {
            "id": 4,
            "name": "Iste eaque omnis consequatur velit.",
            "description": "Officia occaecati fugiat praesentium cumque officiis ut.",
            "image": "http:\/\/wajad.test\/\/tmp\/89037b922073cd6434aa3a11a65210de.jpg"
        },
        {
            "id": 5,
            "name": "Et voluptatem consequatur vitae dolor molestiae.",
            "description": "Nobis neque laborum id deleniti ipsum.",
            "image": "http:\/\/wajad.test\/\/tmp\/080fa056377c306c5e515e185ba2d3a8.jpg"
        },
        {
            "id": 6,
            "name": "Exercitationem nam ut incidunt et.",
            "description": "Fuga ut inventore voluptas modi impedit.",
            "image": "http:\/\/wajad.test\/\/tmp\/bad9556b7f82ba1dc3b20e2678f062f7.jpg"
        },
        {
            "id": 7,
            "name": "Temporibus aliquam dolorum quisquam ducimus reprehenderit suscipit sunt ab.",
            "description": "Illum qui saepe explicabo repellat similique.",
            "image": "http:\/\/wajad.test\/\/tmp\/92f388ce36f566ad830d8e4bf5362456.jpg"
        },
        {
            "id": 8,
            "name": "Non officiis et nobis.",
            "description": "Velit odit vel id.",
            "image": "http:\/\/wajad.test\/\/tmp\/94b0d0e0cc91c9a3e8c4780fe32e880c.jpg"
        },
        {
            "id": 9,
            "name": "Quo est sequi voluptatum aspernatur eaque optio.",
            "description": "Soluta ducimus esse odio ipsam sit aliquid.",
            "image": "http:\/\/wajad.test\/\/tmp\/8ccc92f74115f49d11433a7682591d94.jpg"
        },
        {
            "id": 10,
            "name": "Alias sunt nam eum est.",
            "description": "Repudiandae sapiente esse consequatur in vitae.",
            "image": "http:\/\/wajad.test\/\/tmp\/f5f9b3bc9ca447138975cbbe2fb2c165.jpg"
        },
        {
            "id": 11,
            "name": "Repellendus in ipsa laudantium consequuntur quo minima.",
            "description": "Quae tempore voluptatem incidunt aut earum consequatur.",
            "image": "http:\/\/wajad.test\/\/tmp\/e678e0d201d182071964aad2fa332d4e.jpg"
        },
        {
            "id": 12,
            "name": "Ex qui amet dolore facere.",
            "description": "Ut in qui minima harum qui consequatur soluta.",
            "image": "http:\/\/wajad.test\/\/tmp\/b03aa339ae07d33bed6890fcc400e52d.jpg"
        },
        {
            "id": 13,
            "name": "Quas officia alias maxime iure rerum et.",
            "description": "Est excepturi similique repellat sit.",
            "image": "http:\/\/wajad.test\/\/tmp\/d688b896bbdb4a4829e9561b1ab5f189.jpg"
        },
        {
            "id": 14,
            "name": "Aperiam nemo voluptas sed delectus.",
            "description": "Dolorem et fuga sit perspiciatis deleniti vitae repellendus.",
            "image": "http:\/\/wajad.test\/\/tmp\/fe403e2c37a55ba3889a9e7d41e6d01b.jpg"
        },
        {
            "id": 15,
            "name": "Dicta cum consequatur nemo et deserunt.",
            "description": "Repudiandae enim totam est quisquam perferendis recusandae natus.",
            "image": "http:\/\/wajad.test\/\/tmp\/551948b2ff1cf8f5dbb8a642c1e8fc3f.jpg"
        },
        {
            "id": 16,
            "name": "Ut sed ut quod voluptatem saepe.",
            "description": "Occaecati qui expedita eaque est consequuntur consequatur impedit.",
            "image": "http:\/\/wajad.test\/\/tmp\/0c48ee48de6ad2b33f245d9b6639ae5f.jpg"
        },
        {
            "id": 17,
            "name": "Iusto dolores aut libero cumque qui delectus dolorem.",
            "description": "Modi eveniet ipsa voluptates quos voluptatem libero.",
            "image": "http:\/\/wajad.test\/\/tmp\/667043744bef3f72741e341a3606f4dc.jpg"
        },
        {
            "id": 18,
            "name": "Earum voluptatum velit molestiae asperiores ea et.",
            "description": "Impedit aliquid accusantium pariatur nihil ipsam doloremque.",
            "image": "http:\/\/wajad.test\/\/tmp\/f2848abf54ed85fb102e01795c709ded.jpg"
        },
        {
            "id": 19,
            "name": "Laboriosam dolore quam voluptas eveniet vitae et atque.",
            "description": "Nobis aut commodi vel dolorum.",
            "image": "http:\/\/wajad.test\/\/tmp\/21fbf44145d53fe9124494e78c59c991.jpg"
        },
        {
            "id": 20,
            "name": "Ea itaque qui totam ipsa et rem non.",
            "description": "Accusamus perspiciatis tenetur qui voluptatem sequi.",
            "image": "http:\/\/wajad.test\/\/tmp\/f92ed7a05559733e58203c2c37dee74f.jpg"
        },
        {
            "id": 21,
            "name": "Ex autem eos exercitationem quas.",
            "description": "Aut velit natus sapiente rerum deleniti.",
            "image": "http:\/\/wajad.test\/\/tmp\/c685fa4bac2ba320ec2b147bca94eea8.jpg"
        },
        {
            "id": 22,
            "name": "Ea accusantium voluptatum sunt corporis voluptatem quaerat aut.",
            "description": "Quaerat soluta ut non voluptas.",
            "image": "http:\/\/wajad.test\/\/tmp\/cf599be2ed06b5ed712545a4eafca02b.jpg"
        },
        {
            "id": 23,
            "name": "Suscipit temporibus in sed et molestias magnam impedit.",
            "description": "Repellendus quis dolores magni itaque voluptatum cupiditate.",
            "image": "http:\/\/wajad.test\/\/tmp\/7424f0fc978c000bda0e499556717420.jpg"
        },
        {
            "id": 24,
            "name": "Perspiciatis sed nobis et quo necessitatibus.",
            "description": "Debitis libero fuga impedit blanditiis accusantium officiis.",
            "image": "http:\/\/wajad.test\/\/tmp\/7da1ce72668a113e19fe5e0414b40f18.jpg"
        },
        {
            "id": 25,
            "name": "Qui quia quaerat eos dolorum facere dolor pariatur dolor.",
            "description": "Nam sunt omnis perspiciatis temporibus architecto.",
            "image": "http:\/\/wajad.test\/\/tmp\/bce97253493fc4740e86afbb4f5f1d99.jpg"
        },
        {
            "id": 26,
            "name": "Veniam natus numquam sit quo cum.",
            "description": "Dolorum necessitatibus saepe temporibus accusantium at.",
            "image": "http:\/\/wajad.test\/\/tmp\/53cdd6babad444595dbb6ca1d7f7400d.jpg"
        },
        {
            "id": 27,
            "name": "Odio vero velit sapiente id ea porro illo.",
            "description": "Ut omnis velit in minus praesentium quia quis.",
            "image": "http:\/\/wajad.test\/\/tmp\/1c4da0cc7c9dbdf8b245fa6f7adcdcbc.jpg"
        },
        {
            "id": 28,
            "name": "Officiis aut optio commodi deleniti laboriosam.",
            "description": "Ducimus quia dolorum ea soluta corporis.",
            "image": "http:\/\/wajad.test\/\/tmp\/3f4107678da027fb5c8c433d6b1f6610.jpg"
        },
        {
            "id": 29,
            "name": "Delectus nihil et voluptatum consequatur sunt adipisci.",
            "description": "Quo eos vitae et.",
            "image": "http:\/\/wajad.test\/\/tmp\/7920c12bc2dde996a13b3b79b4f82efe.jpg"
        },
        {
            "id": 30,
            "name": "Sit sit voluptas aut expedita sapiente aut.",
            "description": "Autem sed aut rerum numquam ratione.",
            "image": "http:\/\/wajad.test\/\/tmp\/b87497c152c1aba23534eb6be77d1914.jpg"
        },
        {
            "id": 31,
            "name": "Modi quod ullam laborum quos et illo soluta.",
            "description": "Voluptatem eius qui commodi fugit.",
            "image": "http:\/\/wajad.test\/\/tmp\/c63d9a7a63bdb814c33b4ecc7d55c285.jpg"
        },
        {
            "id": 32,
            "name": "Doloremque autem fuga dicta consequatur aut possimus autem sapiente.",
            "description": "Voluptatem ut iusto iste saepe vel.",
            "image": "http:\/\/wajad.test\/\/tmp\/aedee7b47d77eeb08340618cd026cecb.jpg"
        },
        {
            "id": 33,
            "name": "Et nihil perspiciatis excepturi quod amet.",
            "description": "Consequuntur eos eum alias impedit rem aut.",
            "image": "http:\/\/wajad.test\/\/tmp\/9c22da434f4b68aba3098ccbe804bf91.jpg"
        },
        {
            "id": 34,
            "name": "Blanditiis occaecati omnis pariatur consequuntur.",
            "description": "Sunt tempora ratione iure similique omnis harum.",
            "image": "http:\/\/wajad.test\/\/tmp\/3d9d0bde529def92476de63a0cbc4611.jpg"
        },
        {
            "id": 35,
            "name": "Ut fuga accusantium reprehenderit culpa.",
            "description": "Dicta enim delectus nihil modi provident.",
            "image": "http:\/\/wajad.test\/\/tmp\/1eb7a6a188ab0b907a43933774672606.jpg"
        },
        {
            "id": 36,
            "name": "Culpa magnam et cupiditate quod dolores.",
            "description": "Sunt ipsa animi magni nemo consequatur voluptatem quia.",
            "image": "http:\/\/wajad.test\/\/tmp\/e47f23a2d08b4f5625413dbfbd16954d.jpg"
        },
        {
            "id": 37,
            "name": "Id vel non deleniti corrupti adipisci cupiditate aut.",
            "description": "Vel cupiditate minima assumenda officiis illo numquam itaque.",
            "image": "http:\/\/wajad.test\/\/tmp\/9e7dc184c72a42c20ba53c5006199a8f.jpg"
        },
        {
            "id": 38,
            "name": "Occaecati in vel eligendi tempore quos dolorem est.",
            "description": "Fugit consequuntur impedit fuga dolor recusandae praesentium veniam.",
            "image": "http:\/\/wajad.test\/\/tmp\/fe446548c021dd29f110026540b1ee96.jpg"
        },
        {
            "id": 39,
            "name": "Odio ut eos atque.",
            "description": "Optio qui veritatis id accusamus qui ut illo illum.",
            "image": "http:\/\/wajad.test\/\/tmp\/650e6a878b6e80b6d943022cefbfc8ba.jpg"
        },
        {
            "id": 40,
            "name": "Iure itaque sit cupiditate sed optio quia voluptatibus.",
            "description": "Et ex minima sed et voluptas dolor.",
            "image": "http:\/\/wajad.test\/\/tmp\/13a3c38df3f1402c371e2dd342831b0d.jpg"
        },
        {
            "id": 41,
            "name": "Sint perferendis expedita quasi reprehenderit ullam nihil nisi ratione.",
            "description": "Perferendis odio veniam qui autem quod.",
            "image": "http:\/\/wajad.test\/\/tmp\/817293e166ed05227e2d046d434a5605.jpg"
        },
        {
            "id": 42,
            "name": "Enim non et voluptatem sunt assumenda voluptatem.",
            "description": "Nesciunt fuga magnam inventore aut aliquam quae.",
            "image": "http:\/\/wajad.test\/\/tmp\/a013f55362cd638dc8a06f1f7fede016.jpg"
        },
        {
            "id": 43,
            "name": "Sunt deleniti autem voluptatibus et consequatur.",
            "description": "Quisquam qui repellat et dolor.",
            "image": "http:\/\/wajad.test\/\/tmp\/c4b5746e3bfecaeafd8cabfea09e5e25.jpg"
        },
        {
            "id": 44,
            "name": "Ex provident aut dolores nulla.",
            "description": "Voluptas ut harum quidem iste debitis et occaecati suscipit.",
            "image": "http:\/\/wajad.test\/\/tmp\/b17c759ec90d4d854ca7fe800c8943d1.jpg"
        },
        {
            "id": 45,
            "name": "Incidunt eveniet nisi et expedita tenetur veritatis ab.",
            "description": "Mollitia assumenda atque nesciunt et quasi et.",
            "image": "http:\/\/wajad.test\/\/tmp\/3af90bef5a4bfb10c1d4c6320bcc604b.jpg"
        },
        {
            "id": 46,
            "name": "Laudantium ipsum quia omnis eius alias cumque et eius.",
            "description": "Sunt eum quia molestiae quia.",
            "image": "http:\/\/wajad.test\/\/tmp\/6ba108b4701ffccb4edb9e6c0ae7be98.jpg"
        },
        {
            "id": 47,
            "name": "Hic voluptas eveniet rem veritatis omnis molestiae autem.",
            "description": "Ipsum eum dicta et neque.",
            "image": "http:\/\/wajad.test\/\/tmp\/794f4921db9c4ca887e68d7cf909a6a4.jpg"
        },
        {
            "id": 48,
            "name": "Qui voluptas sit dolorem et.",
            "description": "Blanditiis eius exercitationem et.",
            "image": "http:\/\/wajad.test\/\/tmp\/2539178574844198c9a7e9657612df6e.jpg"
        },
        {
            "id": 49,
            "name": "Voluptates ullam dolorem qui dolorum sed ea nostrum.",
            "description": "Et magnam vel totam consectetur sunt delectus.",
            "image": "http:\/\/wajad.test\/\/tmp\/f4324767bbbb6be489f6d238d6c83008.jpg"
        },
        {
            "id": 50,
            "name": "Ea officia quos quia ducimus omnis.",
            "description": "Provident qui libero debitis quas aut.",
            "image": "http:\/\/wajad.test\/\/tmp\/454bf1c970f3e9655c41fb6fb2c5c957.jpg"
        },
        {
            "id": 51,
            "name": "Culpa quas sint rerum excepturi.",
            "description": "Non qui eius reprehenderit non.",
            "image": "http:\/\/wajad.test\/\/tmp\/288c1c8c698f575876792000b75a785e.jpg"
        },
        {
            "id": 52,
            "name": "Unde atque est est sit distinctio vero magnam.",
            "description": "Et aut fugit minus et totam provident ut sed.",
            "image": "http:\/\/wajad.test\/\/tmp\/c0b043dc5d8b2ff063d5863069f6f39e.jpg"
        },
        {
            "id": 53,
            "name": "Animi voluptatem sint dolorem voluptatem.",
            "description": "Modi distinctio eveniet velit iste nihil doloremque perspiciatis.",
            "image": "http:\/\/wajad.test\/\/tmp\/0c281b13e335f687aa4ba33d1f5d3cb0.jpg"
        },
        {
            "id": 54,
            "name": "Sequi voluptates ea maxime autem.",
            "description": "Aliquam dignissimos sed aut sunt.",
            "image": "http:\/\/wajad.test\/\/tmp\/fde5cbd874db99f960ac6b14893afb27.jpg"
        },
        {
            "id": 55,
            "name": "Omnis quibusdam qui itaque aut excepturi molestiae voluptatibus.",
            "description": "Quis libero non sint ut.",
            "image": "http:\/\/wajad.test\/\/tmp\/656c2c321bf6e830f18e0e8d3afe9984.jpg"
        },
        {
            "id": 56,
            "name": "Est atque voluptatibus libero fugit.",
            "description": "Suscipit rem blanditiis nihil sequi minima eum dolor.",
            "image": "http:\/\/wajad.test\/\/tmp\/a85b5ac49822795a177d3dd6666a4ed7.jpg"
        }
    ]
}
```

### HTTP Request
`GET api/brands/{subcategory_id?}`


<!-- END_068c0e43d7427c487297faaa68a4489a -->

<!-- START_9c1f67877e90ac8688a0652bb104ee79 -->
## api/models/{brand_id?}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/models/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/models/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Voluptate occaecati officia aliquam eveniet autem.",
            "description": "Eum qui et sequi iste.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Ad consequuntur et dolore deleniti et aut.",
            "description": "Totam quidem est minima suscipit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Minima adipisci est sit iste saepe libero.",
            "description": "Et molestiae quo est commodi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Voluptatem beatae aliquam rerum libero vel.",
            "description": "Velit voluptas quis quasi magni.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Delectus eos tenetur qui dolorem molestiae dolorem sunt.",
            "description": "Eius repellendus quia aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Magnam voluptatem eum quos id.",
            "description": "Dolores vel nisi tempore necessitatibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Vel blanditiis voluptatibus vel.",
            "description": "In corrupti accusantium eos et voluptatibus aliquid.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Magni quod ex porro rerum explicabo qui sed.",
            "description": "Laborum asperiores labore ipsam aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Quibusdam libero ea iusto suscipit et rem nostrum.",
            "description": "Quasi laudantium at voluptas occaecati nihil voluptatem et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Eveniet ex recusandae optio.",
            "description": "Vero error doloremque omnis nam officia voluptas doloremque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Ad autem nemo commodi excepturi aut ipsam dolorem.",
            "description": "Doloremque unde vel neque excepturi et officiis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Nihil vero voluptatem eius ea ut quam sapiente.",
            "description": "Perspiciatis sed atque velit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Occaecati eveniet fugiat aut velit quasi.",
            "description": "Expedita consequuntur officiis et sit consequatur aspernatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Quod sit est nisi fugit perferendis.",
            "description": "Aut fuga dolor voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Reprehenderit deserunt eos ea rerum officia facere tempora suscipit.",
            "description": "Cupiditate occaecati magnam commodi porro omnis amet.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Error explicabo in blanditiis.",
            "description": "Voluptatem ipsum temporibus velit repellat ratione.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Voluptate reprehenderit quia delectus vel et aperiam.",
            "description": "At quis dolor nisi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Est voluptatum cupiditate aut et sint facilis.",
            "description": "Perspiciatis atque saepe officiis numquam laborum nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Enim asperiores ut voluptatem odio amet sit.",
            "description": "Aliquid iusto illo consectetur expedita.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Est explicabo sint earum consequatur veniam molestiae eum.",
            "description": "Culpa earum consequatur fuga dolorem ullam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Ipsa eos tenetur dolorem quo et.",
            "description": "Neque sint dolorem aperiam ea ut quibusdam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Id quia quos placeat sit aut.",
            "description": "Est est quis architecto minima et nesciunt quidem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Eum hic tempore nihil perspiciatis dolorem earum.",
            "description": "Sed deserunt quia pariatur autem doloremque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Quidem praesentium quia aut omnis saepe veritatis dolor.",
            "description": "Minima omnis voluptatum porro.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Molestiae nostrum officia et perspiciatis blanditiis.",
            "description": "Suscipit temporibus corporis aut id corporis et ab.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Odio qui et eveniet provident ad explicabo recusandae.",
            "description": "Quia et quidem vel nesciunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 27,
            "name": "Temporibus quia nisi quos ut amet occaecati eos.",
            "description": "In accusantium quae voluptas quia ipsa totam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 28,
            "name": "Aut maiores facere at perferendis.",
            "description": "Aspernatur molestias officia et fugit voluptas debitis voluptatum repellendus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 29,
            "name": "Sapiente maxime nihil qui molestias esse molestias laudantium.",
            "description": "Sit vitae dolorem esse.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 30,
            "name": "Qui molestiae magni aut doloremque tempore amet est.",
            "description": "Nostrum dolorem vero laudantium.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 31,
            "name": "Nihil et magni et rerum enim deleniti.",
            "description": "Perferendis qui laboriosam ipsa voluptates et odit fugiat voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 32,
            "name": "Facere nobis quasi quam magnam unde.",
            "description": "Ut dolores ut id eius sed tenetur vel.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 33,
            "name": "Ab quidem animi et unde quia qui omnis.",
            "description": "Eum itaque et perspiciatis ut aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 34,
            "name": "Eligendi mollitia repellendus nihil.",
            "description": "Officiis sequi architecto ab suscipit tenetur et eligendi itaque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 35,
            "name": "Et quam doloremque illo dolorum sed mollitia.",
            "description": "Qui fuga enim dolor harum tempore sequi iure.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 36,
            "name": "Sit qui quam sint molestiae labore ea ducimus molestiae.",
            "description": "Aut dolores tempore aut et libero voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 37,
            "name": "Quidem ullam sunt amet assumenda quia est ut.",
            "description": "Provident assumenda et quas occaecati voluptas nesciunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 38,
            "name": "Ab reiciendis occaecati modi.",
            "description": "Cumque quis explicabo ab quasi sit ea maxime.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 39,
            "name": "Qui ex voluptas qui fuga eos itaque quis.",
            "description": "Vitae rerum occaecati debitis sit itaque perferendis est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 40,
            "name": "Sequi ex dolores itaque maiores blanditiis vel eum.",
            "description": "Et est et aut rerum provident excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 41,
            "name": "Quo eveniet esse libero blanditiis velit voluptatibus ratione.",
            "description": "Facilis et maxime qui et possimus qui nisi cupiditate.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 42,
            "name": "Aliquam hic non id voluptate.",
            "description": "Magni doloremque dolores quidem modi qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 43,
            "name": "Accusantium corrupti possimus repellendus.",
            "description": "Odit aperiam ut error quidem totam illo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 44,
            "name": "Minima nulla debitis ullam.",
            "description": "Dolorem porro omnis in praesentium non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 45,
            "name": "Consequatur sit enim dolore.",
            "description": "Ex cupiditate qui id expedita soluta ipsa labore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 46,
            "name": "Ducimus neque ipsum molestiae eligendi et libero.",
            "description": "Omnis modi autem velit ut voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 47,
            "name": "Sunt iure deleniti expedita voluptate.",
            "description": "Officiis omnis ut dolores quae repellat dolorem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 48,
            "name": "Enim in modi aut et cum provident.",
            "description": "Consequatur sint voluptates natus est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 49,
            "name": "Officiis id aliquid qui quae.",
            "description": "Voluptate quam eaque aliquid fugit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 50,
            "name": "Sint nemo odio odit maxime blanditiis alias natus.",
            "description": "Quia voluptatem repudiandae ut provident maxime voluptas dignissimos.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 51,
            "name": "Et deleniti iusto reprehenderit consequatur.",
            "description": "Possimus eum et exercitationem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 52,
            "name": "Hic veritatis recusandae et eveniet aperiam tenetur.",
            "description": "Facere culpa voluptatem quos illum repellendus expedita.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 53,
            "name": "Consequatur voluptatem veritatis alias nulla neque eius quis atque.",
            "description": "Provident consequatur sit maxime aut voluptatum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 54,
            "name": "Voluptate nostrum aliquam qui non architecto debitis.",
            "description": "Eveniet impedit saepe et ut facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 55,
            "name": "Dignissimos maiores unde velit occaecati sapiente amet eum.",
            "description": "Suscipit sequi delectus ea sit est animi unde.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 56,
            "name": "Ipsam harum occaecati dolore non provident voluptate et.",
            "description": "Sint earum maxime eum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        }
    ]
}
```

### HTTP Request
`GET api/models/{brand_id?}`


<!-- END_9c1f67877e90ac8688a0652bb104ee79 -->

<!-- START_02ab26dc9c34cdbbe59219b9bdec9be5 -->
## api/models/{model}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/models/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/models/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Voluptate occaecati officia aliquam eveniet autem.",
            "description": "Eum qui et sequi iste.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        }
    ]
}
```

### HTTP Request
`GET api/models/{model}`


<!-- END_02ab26dc9c34cdbbe59219b9bdec9be5 -->

<!-- START_657bc03edc12abbb56cd6cba090a5f5d -->
## api/colors
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/colors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/colors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        },
        {
            "id": 2,
            "name": "Black",
            "icon": "images\/colors\/black.png"
        },
        {
            "id": 3,
            "name": "Blue",
            "icon": "images\/colors\/blue.png"
        },
        {
            "id": 4,
            "name": "Brown",
            "icon": "images\/colors\/brown.png"
        },
        {
            "id": 5,
            "name": "Gold",
            "icon": "images\/colors\/gold.png"
        },
        {
            "id": 6,
            "name": "Green",
            "icon": "images\/colors\/green.png"
        },
        {
            "id": 7,
            "name": "Orange",
            "icon": "images\/colors\/orange.png"
        },
        {
            "id": 8,
            "name": "Pink",
            "icon": "images\/colors\/pink.png"
        },
        {
            "id": 9,
            "name": "Silver",
            "icon": "images\/colors\/silver.png"
        },
        {
            "id": 10,
            "name": "White",
            "icon": "images\/colors\/white.png"
        },
        {
            "id": 11,
            "name": "Yellow",
            "icon": "images\/colors\/yellow.png"
        },
        {
            "id": 12,
            "name": "Crimson",
            "icon": "images\/colors\/crimson.png"
        }
    ]
}
```

### HTTP Request
`GET api/colors`


<!-- END_657bc03edc12abbb56cd6cba090a5f5d -->

<!-- START_f7434b1702d26d8f9b8761c51d1b63b4 -->
## api/colors/{color}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/colors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/colors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Red",
        "icon": "images\/colors\/red.png"
    }
}
```

### HTTP Request
`GET api/colors/{color}`


<!-- END_f7434b1702d26d8f9b8761c51d1b63b4 -->

<!-- START_f23167370c8a1250be599e87d07e6451 -->
## api/offices
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/offices" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/offices"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Qui mollitia tenetur quod corrupti.",
            "details": "Voluptatum velit molestiae quas dolores. Et consequatur numquam et laborum saepe dolor aut. Accusamus quaerat quas est eveniet quisquam possimus libero deleniti. Repellat perspiciatis et voluptas delectus. Dolore molestiae quam eligendi est consequatur necessitatibus dolorem. Commodi laboriosam id est ut. Dolores modi doloribus corrupti pariatur culpa soluta non facere. Quia fugit aliquid aut doloribus facilis. Dolore vel voluptas enim ut omnis. Omnis optio pariatur aut non sunt illo distinctio illum. Consequatur facere totam dolores facere est. Quia enim autem laborum.",
            "address": "Atque ipsa quia corporis. Officiis nulla vero rerum sed quia. Vitae sequi voluptatem est.",
            "image": "default.png",
            "latitude": 65.645272,
            "longitude": 118.030815,
            "status": 1
        },
        {
            "id": 2,
            "name": "Voluptate et itaque recusandae.",
            "details": "Et enim est error nobis sit omnis voluptatem. Occaecati commodi excepturi eum quaerat non. Voluptatem architecto voluptatem modi commodi animi quam nihil. Ut occaecati qui laborum placeat illum. Eligendi soluta assumenda non porro tenetur. Est explicabo rerum facere labore vel suscipit. Aut minus perferendis sunt. Officiis sint accusamus non id dolore. Earum quod minima ullam aut repellendus. Qui molestiae assumenda ut tenetur doloribus. Sit esse asperiores aut qui magnam. Quia cupiditate hic magni neque aliquid unde ab dolor. Ab aut placeat tempora omnis velit vitae est. Non eum sint ad est optio. Quam minus incidunt non earum asperiores accusamus. Ut cupiditate fuga perferendis molestiae et consequuntur. Atque recusandae animi et consequuntur. Vel magni perferendis nostrum iusto.",
            "address": "Voluptatibus soluta eos animi et sit. Nihil quidem quisquam aut. Distinctio aut nulla unde necessitatibus cupiditate rerum. Quos ullam magni sint commodi ipsum.",
            "image": "default.png",
            "latitude": 57.074909,
            "longitude": -87.280324,
            "status": 1
        },
        {
            "id": 3,
            "name": "Earum aspernatur est et rerum itaque deserunt.",
            "details": "Saepe ducimus sint voluptatem et quia veniam. Quia animi qui ut rerum. Quis qui nobis voluptatum est. Libero esse aut quis ut sit. Placeat voluptatem aperiam suscipit distinctio ea optio quis minus. Veniam iure numquam delectus molestias aliquid. Id et aspernatur alias aut vel. Porro ut rerum et. Hic voluptas porro reprehenderit voluptatem molestiae amet possimus. Esse aut magnam magnam nulla sed numquam. Voluptas et quae iusto est neque quas. Dolor praesentium quaerat est provident ut. Nihil dolorem eaque soluta dolorum odit minus est. Explicabo consequatur iste architecto vitae dolores sint iusto. Explicabo et illum ad necessitatibus. Qui reiciendis sunt exercitationem. Illo odio et et optio voluptatem error est quibusdam.",
            "address": "Occaecati at hic voluptas. Quasi quibusdam fuga et. Quis magnam distinctio dolores rerum impedit libero sint neque. Explicabo minima animi omnis odio et et quo.",
            "image": "default.png",
            "latitude": 8.830148,
            "longitude": 102.220338,
            "status": 1
        },
        {
            "id": 4,
            "name": "Dignissimos fugiat cupiditate officia et incidunt.",
            "details": "Temporibus at fugit quibusdam ea recusandae. Sapiente error cum sit unde similique necessitatibus voluptas. Nisi libero hic et. Distinctio ipsam et eum quam magni. Aut earum amet nihil fugit veniam omnis sunt. Quis fugiat nemo quis. Ducimus esse molestias perspiciatis voluptatem. Omnis fugiat nobis ipsa rerum libero excepturi rerum. Ut sapiente ipsam et fuga omnis. Et molestias sed aut tempore qui est quod voluptatibus. Quis nihil consequatur est rerum mollitia. Amet suscipit et similique molestiae odio rerum. Ipsam explicabo molestiae voluptas quia nostrum voluptatum.",
            "address": "Sit accusantium temporibus modi ut. Esse aliquam dolor corporis aut facilis quisquam aut. Dignissimos magnam commodi tempora et earum eius.",
            "image": "default.png",
            "latitude": 72.277981,
            "longitude": 82.867864,
            "status": 1
        },
        {
            "id": 5,
            "name": "Et enim et recusandae consequatur natus.",
            "details": "Iusto sequi officia quas illo rem dolorum. Recusandae debitis odio quia ut numquam consectetur. Id sit ab est aut. Esse ut ullam quia ut veniam. Ipsam dolorem veritatis quo harum adipisci molestias. Nihil non voluptas rerum nihil placeat repellendus dolorum. Ut aut reiciendis numquam. Sint placeat velit quia minus alias ab. Nesciunt commodi vitae sapiente reiciendis consequatur eos quae. Ut deserunt qui ut ab nam impedit aut. Assumenda ducimus rerum et et. Aliquam provident soluta omnis rerum eveniet maiores. Corporis libero consequuntur rerum minima eos facere rem aut. Sit debitis nihil delectus et quis in vitae.",
            "address": "Sunt nesciunt expedita placeat sunt. Officiis adipisci quia minus excepturi. Non distinctio magnam est sint. Aliquam dolores nisi quae necessitatibus. Esse asperiores repellat rerum cumque.",
            "image": "default.png",
            "latitude": 35.568172,
            "longitude": 73.099193,
            "status": 1
        }
    ]
}
```

### HTTP Request
`GET api/offices`


<!-- END_f23167370c8a1250be599e87d07e6451 -->

<!-- START_bd6ef4ad5e299a34f4c6db1eb27ba327 -->
## api/maps/{type?}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/maps/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/maps/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/maps/{type?}`


<!-- END_bd6ef4ad5e299a34f4c6db1eb27ba327 -->

<!-- START_316a4c3b4f6a4c4ff34e5893943cdebd -->
## api/countries
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/countries"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Afghanistan",
            "iso_code": "AF",
            "country_code": "93"
        },
        {
            "id": 2,
            "name": "Albania",
            "iso_code": "AL",
            "country_code": "355"
        },
        {
            "id": 3,
            "name": "Algeria",
            "iso_code": "DZ",
            "country_code": "213"
        },
        {
            "id": 4,
            "name": "American Samoa",
            "iso_code": "AS",
            "country_code": "684"
        },
        {
            "id": 5,
            "name": "Andorra",
            "iso_code": "AD",
            "country_code": "376"
        },
        {
            "id": 6,
            "name": "Angola",
            "iso_code": "AO",
            "country_code": "244"
        },
        {
            "id": 7,
            "name": "Anguilla",
            "iso_code": "AI",
            "country_code": "1"
        },
        {
            "id": 8,
            "name": "Antarctica",
            "iso_code": "AQ",
            "country_code": "268"
        },
        {
            "id": 9,
            "name": "Antigua and Barbuda",
            "iso_code": "AG",
            "country_code": "1"
        },
        {
            "id": 10,
            "name": "Argentina",
            "iso_code": "AR",
            "country_code": "54"
        },
        {
            "id": 11,
            "name": "Armenia",
            "iso_code": "AM",
            "country_code": "374"
        },
        {
            "id": 12,
            "name": "Aruba",
            "iso_code": "AW",
            "country_code": "297"
        },
        {
            "id": 13,
            "name": "Australia",
            "iso_code": "AU",
            "country_code": "61"
        },
        {
            "id": 14,
            "name": "Austria",
            "iso_code": "AT",
            "country_code": "43"
        },
        {
            "id": 15,
            "name": "Azerbaijan",
            "iso_code": "AZ",
            "country_code": "994"
        },
        {
            "id": 16,
            "name": "Bahamas",
            "iso_code": "BS",
            "country_code": "1"
        },
        {
            "id": 17,
            "name": "Bahrain",
            "iso_code": "BH",
            "country_code": "973"
        },
        {
            "id": 18,
            "name": "Bangladesh",
            "iso_code": "BD",
            "country_code": "880"
        },
        {
            "id": 19,
            "name": "Barbados",
            "iso_code": "BB",
            "country_code": "1"
        },
        {
            "id": 20,
            "name": "Belarus",
            "iso_code": "BY",
            "country_code": "375"
        },
        {
            "id": 21,
            "name": "Belgium",
            "iso_code": "BE",
            "country_code": "32"
        },
        {
            "id": 22,
            "name": "Belize",
            "iso_code": "BZ",
            "country_code": "501"
        },
        {
            "id": 23,
            "name": "Benin",
            "iso_code": "BJ",
            "country_code": "229"
        },
        {
            "id": 24,
            "name": "Bermuda",
            "iso_code": "BM",
            "country_code": "1"
        },
        {
            "id": 25,
            "name": "Bhutan",
            "iso_code": "BT",
            "country_code": "975"
        },
        {
            "id": 26,
            "name": "Bolivia",
            "iso_code": "BO",
            "country_code": "591"
        },
        {
            "id": 27,
            "name": "Bosnia and Herzegovina",
            "iso_code": "BA",
            "country_code": "387"
        },
        {
            "id": 28,
            "name": "Botswana",
            "iso_code": "BW",
            "country_code": "267"
        },
        {
            "id": 29,
            "name": "Bouvet Island",
            "iso_code": "BV",
            "country_code": "1"
        },
        {
            "id": 30,
            "name": "Brazil",
            "iso_code": "BR",
            "country_code": "55"
        },
        {
            "id": 31,
            "name": "British Indian Ocean Territory",
            "iso_code": "IO",
            "country_code": "246"
        },
        {
            "id": 32,
            "name": "British Virgin Islands",
            "iso_code": "VG",
            "country_code": "1"
        },
        {
            "id": 33,
            "name": "Brunei",
            "iso_code": "BN",
            "country_code": "1"
        },
        {
            "id": 34,
            "name": "Bulgaria",
            "iso_code": "BG",
            "country_code": "359"
        },
        {
            "id": 35,
            "name": "Burkina Faso",
            "iso_code": "BF",
            "country_code": "226"
        },
        {
            "id": 36,
            "name": "Burundi",
            "iso_code": "BI",
            "country_code": "257"
        },
        {
            "id": 37,
            "name": "Cambodia",
            "iso_code": "KH",
            "country_code": "855"
        },
        {
            "id": 38,
            "name": "Cameroon",
            "iso_code": "CM",
            "country_code": "237"
        },
        {
            "id": 39,
            "name": "Canada",
            "iso_code": "CA",
            "country_code": "1"
        },
        {
            "id": 40,
            "name": "Cape Verde",
            "iso_code": "CV",
            "country_code": "238"
        },
        {
            "id": 41,
            "name": "Cayman Islands",
            "iso_code": "KY",
            "country_code": "1"
        },
        {
            "id": 42,
            "name": "Central African Republic",
            "iso_code": "CF",
            "country_code": "236"
        },
        {
            "id": 43,
            "name": "Chad",
            "iso_code": "TD",
            "country_code": "235"
        },
        {
            "id": 44,
            "name": "Chile",
            "iso_code": "CL",
            "country_code": "56"
        },
        {
            "id": 45,
            "name": "China",
            "iso_code": "CN",
            "country_code": "86"
        },
        {
            "id": 46,
            "name": "Christmas Island",
            "iso_code": "CX",
            "country_code": "16"
        },
        {
            "id": 47,
            "name": "Cocos [Keeling] Islands",
            "iso_code": "CC",
            "country_code": "16"
        },
        {
            "id": 48,
            "name": "Colombia",
            "iso_code": "CO",
            "country_code": "57"
        },
        {
            "id": 49,
            "name": "Comoros",
            "iso_code": "KM",
            "country_code": "269"
        },
        {
            "id": 50,
            "name": "Congo - Brazzaville",
            "iso_code": "CG",
            "country_code": "242"
        },
        {
            "id": 51,
            "name": "Congo - Kinshasa",
            "iso_code": "CD",
            "country_code": "243"
        },
        {
            "id": 52,
            "name": "Cook Islands",
            "iso_code": "CK",
            "country_code": "682"
        },
        {
            "id": 53,
            "name": "Costa Rica",
            "iso_code": "CR",
            "country_code": "506"
        },
        {
            "id": 54,
            "name": "Croatia",
            "iso_code": "HR",
            "country_code": "385"
        },
        {
            "id": 55,
            "name": "Cuba",
            "iso_code": "CU",
            "country_code": "53"
        },
        {
            "id": 56,
            "name": "Cyprus",
            "iso_code": "CY",
            "country_code": "357"
        },
        {
            "id": 57,
            "name": "Czech Republic",
            "iso_code": "CZ",
            "country_code": "420"
        },
        {
            "id": 58,
            "name": "Côte d’Ivoire",
            "iso_code": "CI",
            "country_code": "225"
        },
        {
            "id": 59,
            "name": "Denmark",
            "iso_code": "DK",
            "country_code": "45"
        },
        {
            "id": 60,
            "name": "Djibouti",
            "iso_code": "DJ",
            "country_code": "253"
        },
        {
            "id": 61,
            "name": "Dominica",
            "iso_code": "DM",
            "country_code": "1"
        },
        {
            "id": 62,
            "name": "Dominican Republic",
            "iso_code": "DO",
            "country_code": "1"
        },
        {
            "id": 63,
            "name": "Ecuador",
            "iso_code": "EC",
            "country_code": "593"
        },
        {
            "id": 64,
            "name": "Egypt",
            "iso_code": "EG",
            "country_code": "20"
        },
        {
            "id": 65,
            "name": "El Salvador",
            "iso_code": "SV",
            "country_code": "503"
        },
        {
            "id": 66,
            "name": "Equatorial Guinea",
            "iso_code": "GQ",
            "country_code": "240"
        },
        {
            "id": 67,
            "name": "Eritrea",
            "iso_code": "ER",
            "country_code": "291"
        },
        {
            "id": 68,
            "name": "Estonia",
            "iso_code": "EE",
            "country_code": "372"
        },
        {
            "id": 69,
            "name": "Ethiopia",
            "iso_code": "ET",
            "country_code": "251"
        },
        {
            "id": 70,
            "name": "Falkland Islands",
            "iso_code": "FK",
            "country_code": "500"
        },
        {
            "id": 71,
            "name": "Faroe Islands",
            "iso_code": "FO",
            "country_code": "298"
        },
        {
            "id": 72,
            "name": "Fiji",
            "iso_code": "FJ",
            "country_code": "679"
        },
        {
            "id": 73,
            "name": "Finland",
            "iso_code": "FI",
            "country_code": "358"
        },
        {
            "id": 74,
            "name": "France",
            "iso_code": "FR",
            "country_code": "33"
        },
        {
            "id": 75,
            "name": "French Guiana",
            "iso_code": "GF",
            "country_code": "594"
        },
        {
            "id": 76,
            "name": "French Polynesia",
            "iso_code": "PF",
            "country_code": "689"
        },
        {
            "id": 77,
            "name": "French Southern Territories",
            "iso_code": "TF",
            "country_code": "1"
        },
        {
            "id": 78,
            "name": "Gabon",
            "iso_code": "GA",
            "country_code": "241"
        },
        {
            "id": 79,
            "name": "Gambia",
            "iso_code": "GM",
            "country_code": "220"
        },
        {
            "id": 80,
            "name": "Georgia",
            "iso_code": "GE",
            "country_code": "995"
        },
        {
            "id": 81,
            "name": "Germany",
            "iso_code": "DE",
            "country_code": "49"
        },
        {
            "id": 82,
            "name": "Ghana",
            "iso_code": "GH",
            "country_code": "233"
        },
        {
            "id": 83,
            "name": "Gibraltar",
            "iso_code": "GI",
            "country_code": "350"
        },
        {
            "id": 84,
            "name": "Greece",
            "iso_code": "GR",
            "country_code": "30"
        },
        {
            "id": 85,
            "name": "Greenland",
            "iso_code": "GL",
            "country_code": "299"
        },
        {
            "id": 86,
            "name": "Grenada",
            "iso_code": "GD",
            "country_code": "1"
        },
        {
            "id": 87,
            "name": "Guadeloupe",
            "iso_code": "GP",
            "country_code": "590"
        },
        {
            "id": 88,
            "name": "Guam",
            "iso_code": "GU",
            "country_code": "1"
        },
        {
            "id": 89,
            "name": "Guatemala",
            "iso_code": "GT",
            "country_code": "502"
        },
        {
            "id": 90,
            "name": "Guinea",
            "iso_code": "GN",
            "country_code": "224"
        },
        {
            "id": 91,
            "name": "Guinea-Bissau",
            "iso_code": "GW",
            "country_code": "245"
        },
        {
            "id": 92,
            "name": "Guyana",
            "iso_code": "GY",
            "country_code": "592"
        },
        {
            "id": 93,
            "name": "Haiti",
            "iso_code": "HT",
            "country_code": "509"
        },
        {
            "id": 94,
            "name": "Heard Island and McDonald Islands",
            "iso_code": "HM",
            "country_code": "1"
        },
        {
            "id": 95,
            "name": "Honduras",
            "iso_code": "HN",
            "country_code": "504"
        },
        {
            "id": 96,
            "name": "Hong Kong SAR China",
            "iso_code": "HK",
            "country_code": "852"
        },
        {
            "id": 97,
            "name": "Hungary",
            "iso_code": "HU",
            "country_code": "36"
        },
        {
            "id": 98,
            "name": "Iceland",
            "iso_code": "IS",
            "country_code": "354"
        },
        {
            "id": 99,
            "name": "India",
            "iso_code": "IN",
            "country_code": "91"
        },
        {
            "id": 100,
            "name": "Indonesia",
            "iso_code": "ID",
            "country_code": "62"
        },
        {
            "id": 101,
            "name": "Iran",
            "iso_code": "IR",
            "country_code": "98"
        },
        {
            "id": 102,
            "name": "Iraq",
            "iso_code": "IQ",
            "country_code": "964"
        },
        {
            "id": 103,
            "name": "Ireland",
            "iso_code": "IE",
            "country_code": "353"
        },
        {
            "id": 104,
            "name": "Isle of Man",
            "iso_code": "IM",
            "country_code": "1"
        },
        {
            "id": 105,
            "name": "Israel",
            "iso_code": "IL",
            "country_code": "972"
        },
        {
            "id": 106,
            "name": "Italy",
            "iso_code": "IT",
            "country_code": "39"
        },
        {
            "id": 107,
            "name": "Jamaica",
            "iso_code": "JM",
            "country_code": "1"
        },
        {
            "id": 108,
            "name": "Japan",
            "iso_code": "JP",
            "country_code": "81"
        },
        {
            "id": 109,
            "name": "Jersey",
            "iso_code": "JE",
            "country_code": "1"
        },
        {
            "id": 110,
            "name": "Jordan",
            "iso_code": "JO",
            "country_code": "962"
        },
        {
            "id": 111,
            "name": "Kazakhstan",
            "iso_code": "KZ",
            "country_code": "7"
        },
        {
            "id": 112,
            "name": "Kenya",
            "iso_code": "KE",
            "country_code": "254"
        },
        {
            "id": 113,
            "name": "Kiribati",
            "iso_code": "KI",
            "country_code": "686"
        },
        {
            "id": 114,
            "name": "Kuwait",
            "iso_code": "KW",
            "country_code": "59"
        },
        {
            "id": 115,
            "name": "Kyrgyzstan",
            "iso_code": "KG",
            "country_code": "996"
        },
        {
            "id": 116,
            "name": "Laos",
            "iso_code": "LA",
            "country_code": "856"
        },
        {
            "id": 117,
            "name": "Latvia",
            "iso_code": "LV",
            "country_code": "371"
        },
        {
            "id": 118,
            "name": "Lebanon",
            "iso_code": "LB",
            "country_code": "961"
        },
        {
            "id": 119,
            "name": "Lesotho",
            "iso_code": "LS",
            "country_code": "266"
        },
        {
            "id": 120,
            "name": "Liberia",
            "iso_code": "LR",
            "country_code": "231"
        },
        {
            "id": 121,
            "name": "Libya",
            "iso_code": "LY",
            "country_code": "218"
        },
        {
            "id": 122,
            "name": "Liechtenstein",
            "iso_code": "LI",
            "country_code": "243"
        },
        {
            "id": 123,
            "name": "Lithuania",
            "iso_code": "LT",
            "country_code": "370"
        },
        {
            "id": 124,
            "name": "Luxembourg",
            "iso_code": "LU",
            "country_code": "352"
        },
        {
            "id": 125,
            "name": "Macau SAR China",
            "iso_code": "MO",
            "country_code": "853"
        },
        {
            "id": 126,
            "name": "Macedonia",
            "iso_code": "MK",
            "country_code": "389"
        },
        {
            "id": 127,
            "name": "Madagascar",
            "iso_code": "MG",
            "country_code": "261"
        },
        {
            "id": 128,
            "name": "Malawi",
            "iso_code": "MW",
            "country_code": "265"
        },
        {
            "id": 129,
            "name": "Malaysia",
            "iso_code": "MY",
            "country_code": "60"
        },
        {
            "id": 130,
            "name": "Maldives",
            "iso_code": "MV",
            "country_code": "960"
        },
        {
            "id": 131,
            "name": "Mali",
            "iso_code": "ML",
            "country_code": "223"
        },
        {
            "id": 132,
            "name": "Malta",
            "iso_code": "MT",
            "country_code": "356"
        },
        {
            "id": 133,
            "name": "Marshall Islands",
            "iso_code": "MH",
            "country_code": "692"
        },
        {
            "id": 134,
            "name": "Martinique",
            "iso_code": "MQ",
            "country_code": "596"
        },
        {
            "id": 135,
            "name": "Mauritania",
            "iso_code": "MR",
            "country_code": "222"
        },
        {
            "id": 136,
            "name": "Mauritius",
            "iso_code": "MU",
            "country_code": "230"
        },
        {
            "id": 137,
            "name": "Mayotte",
            "iso_code": "YT",
            "country_code": "262"
        },
        {
            "id": 138,
            "name": "Mexico",
            "iso_code": "MX",
            "country_code": "52"
        },
        {
            "id": 139,
            "name": "Micronesia",
            "iso_code": "FM",
            "country_code": "691"
        },
        {
            "id": 140,
            "name": "Moldova",
            "iso_code": "MD",
            "country_code": "373"
        },
        {
            "id": 141,
            "name": "Monaco",
            "iso_code": "MC",
            "country_code": "377"
        },
        {
            "id": 142,
            "name": "Mongolia",
            "iso_code": "MN",
            "country_code": "976"
        },
        {
            "id": 143,
            "name": "Montenegro",
            "iso_code": "ME",
            "country_code": "382"
        },
        {
            "id": 144,
            "name": "Montserrat",
            "iso_code": "MS",
            "country_code": "1"
        },
        {
            "id": 145,
            "name": "Morocco",
            "iso_code": "MA",
            "country_code": "212"
        },
        {
            "id": 146,
            "name": "Mozambique",
            "iso_code": "MZ",
            "country_code": "258"
        },
        {
            "id": 147,
            "name": "Myanmar [Burma]",
            "iso_code": "MM",
            "country_code": "95"
        },
        {
            "id": 148,
            "name": "Namibia",
            "iso_code": "NA",
            "country_code": "264"
        },
        {
            "id": 149,
            "name": "Nauru",
            "iso_code": "NR",
            "country_code": "674"
        },
        {
            "id": 150,
            "name": "Nepal",
            "iso_code": "NP",
            "country_code": "977"
        },
        {
            "id": 151,
            "name": "Netherlands",
            "iso_code": "NL",
            "country_code": "31"
        },
        {
            "id": 152,
            "name": "Netherlands Antilles",
            "iso_code": "AN",
            "country_code": "599"
        },
        {
            "id": 153,
            "name": "New Caledonia",
            "iso_code": "NC",
            "country_code": "687"
        },
        {
            "id": 154,
            "name": "New Zealand",
            "iso_code": "NZ",
            "country_code": "64"
        },
        {
            "id": 155,
            "name": "Nicaragua",
            "iso_code": "NI",
            "country_code": "505"
        },
        {
            "id": 156,
            "name": "Niger",
            "iso_code": "NE",
            "country_code": "227"
        },
        {
            "id": 157,
            "name": "Nigeria",
            "iso_code": "NG",
            "country_code": "234"
        },
        {
            "id": 158,
            "name": "Niue",
            "iso_code": "NU",
            "country_code": "683"
        },
        {
            "id": 159,
            "name": "Norfolk Island",
            "iso_code": "NF",
            "country_code": "672"
        },
        {
            "id": 160,
            "name": "North Korea",
            "iso_code": "KP",
            "country_code": "850"
        },
        {
            "id": 161,
            "name": "Northern Mariana Islands",
            "iso_code": "MP",
            "country_code": "1"
        },
        {
            "id": 162,
            "name": "Norway",
            "iso_code": "NO",
            "country_code": "47"
        },
        {
            "id": 163,
            "name": "Oman",
            "iso_code": "OM",
            "country_code": "968"
        },
        {
            "id": 164,
            "name": "Pakistan",
            "iso_code": "PK",
            "country_code": "92"
        },
        {
            "id": 165,
            "name": "Palau",
            "iso_code": "PW",
            "country_code": "680"
        },
        {
            "id": 166,
            "name": "Palestinian Territories",
            "iso_code": "PS",
            "country_code": "970"
        },
        {
            "id": 167,
            "name": "Panama",
            "iso_code": "PA",
            "country_code": "507"
        },
        {
            "id": 168,
            "name": "Papua New Guinea",
            "iso_code": "PG",
            "country_code": "675"
        },
        {
            "id": 169,
            "name": "Paraguay",
            "iso_code": "PY",
            "country_code": "595"
        },
        {
            "id": 170,
            "name": "Peru",
            "iso_code": "PE",
            "country_code": "51"
        },
        {
            "id": 171,
            "name": "Philippines",
            "iso_code": "PH",
            "country_code": "63"
        },
        {
            "id": 172,
            "name": "Pitcairn Islands",
            "iso_code": "PN",
            "country_code": "870"
        },
        {
            "id": 173,
            "name": "Poland",
            "iso_code": "PL",
            "country_code": "48"
        },
        {
            "id": 174,
            "name": "Portugal",
            "iso_code": "PT",
            "country_code": "351"
        },
        {
            "id": 175,
            "name": "Puerto Rico",
            "iso_code": "PR",
            "country_code": "1"
        },
        {
            "id": 176,
            "name": "Qatar",
            "iso_code": "QA",
            "country_code": "974"
        },
        {
            "id": 177,
            "name": "Romania",
            "iso_code": "RO",
            "country_code": "40"
        },
        {
            "id": 178,
            "name": "Russia",
            "iso_code": "RU",
            "country_code": "7"
        },
        {
            "id": 179,
            "name": "Rwanda",
            "iso_code": "RW",
            "country_code": "250"
        },
        {
            "id": 180,
            "name": "Réunion",
            "iso_code": "RE",
            "country_code": "262"
        },
        {
            "id": 181,
            "name": "Saint Helena",
            "iso_code": "SH",
            "country_code": "290"
        },
        {
            "id": 182,
            "name": "Saint Kitts and Nevis",
            "iso_code": "KN",
            "country_code": "1"
        },
        {
            "id": 183,
            "name": "Saint Lucia",
            "iso_code": "LC",
            "country_code": "1"
        },
        {
            "id": 184,
            "name": "Saint Martin",
            "iso_code": "MF",
            "country_code": "1"
        },
        {
            "id": 185,
            "name": "Saint Pierre and Miquelon",
            "iso_code": "PM",
            "country_code": "508"
        },
        {
            "id": 186,
            "name": "Saint Vincent and the Grenadines",
            "iso_code": "VC",
            "country_code": "1"
        },
        {
            "id": 187,
            "name": "Samoa",
            "iso_code": "WS",
            "country_code": "685"
        },
        {
            "id": 188,
            "name": "San Marino",
            "iso_code": "SM",
            "country_code": "378"
        },
        {
            "id": 189,
            "name": "Saudi Arabia",
            "iso_code": "SA",
            "country_code": "966"
        },
        {
            "id": 190,
            "name": "Senegal",
            "iso_code": "SN",
            "country_code": "221"
        },
        {
            "id": 191,
            "name": "Serbia",
            "iso_code": "RS",
            "country_code": "381"
        },
        {
            "id": 192,
            "name": "Serbia and Montenegro",
            "iso_code": "CS",
            "country_code": "1"
        },
        {
            "id": 193,
            "name": "Seychelles",
            "iso_code": "SC",
            "country_code": "248"
        },
        {
            "id": 194,
            "name": "Sierra Leone",
            "iso_code": "SL",
            "country_code": "232"
        },
        {
            "id": 195,
            "name": "Singapore",
            "iso_code": "SG",
            "country_code": "65"
        },
        {
            "id": 196,
            "name": "Slovakia",
            "iso_code": "SK",
            "country_code": "421"
        },
        {
            "id": 197,
            "name": "Slovenia",
            "iso_code": "SI",
            "country_code": "386"
        },
        {
            "id": 198,
            "name": "Solomon Islands",
            "iso_code": "SB",
            "country_code": "677"
        },
        {
            "id": 199,
            "name": "Somalia",
            "iso_code": "SO",
            "country_code": "252"
        },
        {
            "id": 200,
            "name": "South Africa",
            "iso_code": "ZA",
            "country_code": "27"
        },
        {
            "id": 201,
            "name": "South Georgia and the South Sandwich Islands",
            "iso_code": "GS",
            "country_code": "1"
        },
        {
            "id": 202,
            "name": "South Korea",
            "iso_code": "KR",
            "country_code": "82"
        },
        {
            "id": 203,
            "name": "Spain",
            "iso_code": "ES",
            "country_code": "34"
        },
        {
            "id": 204,
            "name": "Sri Lanka",
            "iso_code": "LK",
            "country_code": "94"
        },
        {
            "id": 205,
            "name": "Sudan",
            "iso_code": "SD",
            "country_code": "249"
        },
        {
            "id": 206,
            "name": "Suriname",
            "iso_code": "SR",
            "country_code": "597"
        },
        {
            "id": 207,
            "name": "Svalbard and Jan Mayen",
            "iso_code": "SJ",
            "country_code": "47"
        },
        {
            "id": 208,
            "name": "Swaziland",
            "iso_code": "SZ",
            "country_code": "268"
        },
        {
            "id": 209,
            "name": "Sweden",
            "iso_code": "SE",
            "country_code": "46"
        },
        {
            "id": 210,
            "name": "Switzerland",
            "iso_code": "CH",
            "country_code": "41"
        },
        {
            "id": 211,
            "name": "Syria",
            "iso_code": "SY",
            "country_code": "963"
        },
        {
            "id": 212,
            "name": "São Tomé and Príncipe",
            "iso_code": "ST",
            "country_code": "1"
        },
        {
            "id": 213,
            "name": "Taiwan",
            "iso_code": "TW",
            "country_code": "886"
        },
        {
            "id": 214,
            "name": "Tajikistan",
            "iso_code": "TJ",
            "country_code": "992"
        },
        {
            "id": 215,
            "name": "Tanzania",
            "iso_code": "TZ",
            "country_code": "255"
        },
        {
            "id": 216,
            "name": "Thailand",
            "iso_code": "TH",
            "country_code": "66"
        },
        {
            "id": 217,
            "name": "Timor-Leste",
            "iso_code": "TL",
            "country_code": "670"
        },
        {
            "id": 218,
            "name": "Togo",
            "iso_code": "TG",
            "country_code": "228"
        },
        {
            "id": 219,
            "name": "Tokelau",
            "iso_code": "TK",
            "country_code": "690"
        },
        {
            "id": 220,
            "name": "Tonga",
            "iso_code": "TO",
            "country_code": "676"
        },
        {
            "id": 221,
            "name": "Trinidad and Tobago",
            "iso_code": "TT",
            "country_code": "1"
        },
        {
            "id": 222,
            "name": "Tunisia",
            "iso_code": "TN",
            "country_code": "216"
        },
        {
            "id": 223,
            "name": "Turkey",
            "iso_code": "TR",
            "country_code": "90"
        },
        {
            "id": 224,
            "name": "Turkmenistan",
            "iso_code": "TM",
            "country_code": "993"
        },
        {
            "id": 225,
            "name": "Turks and Caicos Islands",
            "iso_code": "TC",
            "country_code": "1"
        },
        {
            "id": 226,
            "name": "Tuvalu",
            "iso_code": "TV",
            "country_code": "688"
        },
        {
            "id": 227,
            "name": "U.S. Minor Outlying Islands",
            "iso_code": "UM",
            "country_code": "1"
        },
        {
            "id": 228,
            "name": "U.S. Virgin Islands",
            "iso_code": "VI",
            "country_code": "1"
        },
        {
            "id": 229,
            "name": "Uganda",
            "iso_code": "UG",
            "country_code": "256"
        },
        {
            "id": 230,
            "name": "Ukraine",
            "iso_code": "UA",
            "country_code": "380"
        },
        {
            "id": 231,
            "name": "United Arab Emirates",
            "iso_code": "AE",
            "country_code": "971"
        },
        {
            "id": 232,
            "name": "United Kingdom",
            "iso_code": "GB",
            "country_code": "44"
        },
        {
            "id": 233,
            "name": "United States",
            "iso_code": "US",
            "country_code": "1"
        },
        {
            "id": 234,
            "name": "Unknown or Invalid Region",
            "iso_code": "ZZ",
            "country_code": "1"
        },
        {
            "id": 235,
            "name": "Uruguay",
            "iso_code": "UY",
            "country_code": "598"
        },
        {
            "id": 236,
            "name": "Uzbekistan",
            "iso_code": "UZ",
            "country_code": "998"
        },
        {
            "id": 237,
            "name": "Vanuatu",
            "iso_code": "VU",
            "country_code": "678"
        },
        {
            "id": 238,
            "name": "Vatican City",
            "iso_code": "VA",
            "country_code": "379"
        },
        {
            "id": 239,
            "name": "Venezuela",
            "iso_code": "VE",
            "country_code": "58"
        },
        {
            "id": 240,
            "name": "Vietnam",
            "iso_code": "VN",
            "country_code": "84"
        },
        {
            "id": 241,
            "name": "Wallis and Futuna",
            "iso_code": "WF",
            "country_code": "681"
        },
        {
            "id": 242,
            "name": "Western Sahara",
            "iso_code": "EH",
            "country_code": "212"
        },
        {
            "id": 243,
            "name": "Yemen",
            "iso_code": "YE",
            "country_code": "967"
        },
        {
            "id": 244,
            "name": "Zambia",
            "iso_code": "ZM",
            "country_code": "260"
        },
        {
            "id": 245,
            "name": "Zimbabwe",
            "iso_code": "ZW",
            "country_code": "236"
        },
        {
            "id": 246,
            "name": "Åland Islands",
            "iso_code": "AX",
            "country_code": "358"
        }
    ]
}
```

### HTTP Request
`GET api/countries`


<!-- END_316a4c3b4f6a4c4ff34e5893943cdebd -->

<!-- START_d3a06985ef377a31eecb832106f4a5e6 -->
## api/regions
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/regions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Al Riyadh Region"
        },
        {
            "id": 2,
            "name": "Makkah Region"
        },
        {
            "id": 3,
            "name": "Al Madinah Region"
        },
        {
            "id": 4,
            "name": "Al-Qassim Region"
        },
        {
            "id": 5,
            "name": "Eastern Province"
        },
        {
            "id": 6,
            "name": "Asir Region"
        },
        {
            "id": 7,
            "name": "Tabuk Region"
        },
        {
            "id": 8,
            "name": "Hail Region"
        },
        {
            "id": 9,
            "name": "Northern Borders Region"
        },
        {
            "id": 10,
            "name": "Jizan Region"
        },
        {
            "id": 11,
            "name": "Najran Region"
        },
        {
            "id": 12,
            "name": "Al Bahah Region"
        },
        {
            "id": 13,
            "name": "Al Jawf Region"
        }
    ]
}
```

### HTTP Request
`GET api/regions`


<!-- END_d3a06985ef377a31eecb832106f4a5e6 -->

<!-- START_e0cc7781f77aa50d54a15c7851b36d0b -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/contact-us" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/contact-us"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/contact-us`


<!-- END_e0cc7781f77aa50d54a15c7851b36d0b -->

<!-- START_2bcf7e87aec832345867dfd3f2da84e7 -->
## Handle the incoming request.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/scan-qr-code/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/scan-qr-code/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": null,
        "url": "http:\/\/api.wajad.test\/api\/scan-qr-code",
        "user": null,
        "item": null
    }
}
```

### HTTP Request
`GET api/scan-qr-code/{qr_code?}`


<!-- END_2bcf7e87aec832345867dfd3f2da84e7 -->

<!-- START_727da77b51e4f96916de138b4b71c037 -->
## api/pages/{page?}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/pages/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/pages/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "success": false,
    "message": "",
    "code": 404
}
```

### HTTP Request
`GET api/pages/{page?}`


<!-- END_727da77b51e4f96916de138b4b71c037 -->

<!-- START_726b7bf93b3209836a1cbcda5b3b6703 -->
## api/posts/{post}
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "title": "Ex atque necessitatibus libero voluptatem magnam et.",
        "approval_status": 1,
        "reward": 0,
        "description": "Et ut quo non sapiente atque voluptatem accusamus. Explicabo voluptas et perferendis aut tempore qui temporibus. Ipsam impedit ipsa voluptates. Non quia non omnis quo aut. Quisquam voluptatem atque et deserunt dignissimos libero ut. Fuga ut ab delectus consequatur est neque. Delectus qui ea consequuntur quasi qui illo. Qui aperiam voluptas nobis voluptas fugiat. Et voluptates est amet. Nam vel voluptatem ab qui qui explicabo. Qui voluptates laboriosam quaerat sunt. Est vel natus vero et eaque autem ipsam sit.",
        "status": "found",
        "attached_to_item": false,
        "item": null,
        "subCategory": {
            "id": 105,
            "name": "Facilis velit soluta quidem modi quibusdam et.",
            "description": "Rerum quidem consequatur officiis et et aut earum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        "model": {
            "id": 52,
            "name": "Hic veritatis recusandae et eveniet aperiam tenetur.",
            "description": "Facere culpa voluptatem quos illum repellendus expedita.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        "color": {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        },
        "date": "2019-12-03 17:33:55",
        "images": [
            {
                "id": 1,
                "image": "http:\/\/wajad.test\/image.png\r\n"
            }
        ],
        "questions": [
            {
                "id": 1,
                "founder_id": {
                    "id": 2,
                    "name": "User",
                    "email": "user@nova.com",
                    "status": 1,
                    "mobile_number": "01142416124",
                    "receive_emails": false,
                    "receive_push_notifications": false,
                    "is_email_verified": false,
                    "is_mobile_number_verified": false,
                    "default_distance_unit": "kilo"
                },
                "question": "question1\r\n"
            }
        ],
        "city": {
            "id": 1,
            "name": "Al Riyadh"
        }
    }
}
```

### HTTP Request
`GET api/posts/{post}`


<!-- END_726b7bf93b3209836a1cbcda5b3b6703 -->

<!-- START_f01269a1d8321c0c8787967b5346c585 -->
## api/posts/add/{type}
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/posts/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/posts/add/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/posts/add/{type}`


<!-- END_f01269a1d8321c0c8787967b5346c585 -->

<!-- START_753caa181befa10f8d0e0f5ca0e5b46f -->
## api/posts/{post}
> Example request:

```bash
curl -X PUT \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/posts/{post}`


<!-- END_753caa181befa10f8d0e0f5ca0e5b46f -->

<!-- START_790d23dbb8c799c36c70f7133a51e7a5 -->
## api/posts/{post}
> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/posts/{post}`


<!-- END_790d23dbb8c799c36c70f7133a51e7a5 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_0fd80093bf108730b9b2c913c6f734f1 -->
## sendsms
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/sendsms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/sendsms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET sendsms`


<!-- END_0fd80093bf108730b9b2c913c6f734f1 -->

<!-- START_c6e224c9623de9ff0bdc0c6384f0724d -->
## paypal
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/paypal" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/paypal"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET paypal`


<!-- END_c6e224c9623de9ff0bdc0c6384f0724d -->

<!-- START_fa0b0e896e8da187f79ea741feec06cd -->
## status
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET status`


<!-- END_fa0b0e896e8da187f79ea741feec06cd -->

<!-- START_680679dc9303b57fe96f1e0fb246e710 -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/corporate/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET corporate/login`


<!-- END_680679dc9303b57fe96f1e0fb246e710 -->

<!-- START_dc990bb3170837edf7c6a994623dc57e -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/corporate/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST corporate/login`


<!-- END_dc990bb3170837edf7c6a994623dc57e -->

<!-- START_a804eca1e072e393baa86b7566fffb05 -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/corporate/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST corporate/logout`


<!-- END_a804eca1e072e393baa86b7566fffb05 -->

<!-- START_cbc4f63eedadf1508d8883317578442e -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/corporate/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET corporate/register`


<!-- END_cbc4f63eedadf1508d8883317578442e -->

<!-- START_6ef3c36dea8310b6af65a00b6720ce6b -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/corporate/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST corporate/register`


<!-- END_6ef3c36dea8310b6af65a00b6720ce6b -->

<!-- START_6fbc8d95c9f0c923c9508409b886baa7 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/corporate/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET corporate/password/reset`


<!-- END_6fbc8d95c9f0c923c9508409b886baa7 -->

<!-- START_4cecf8dbcaa32e7e714c9a0a317f1b4a -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/corporate/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST corporate/password/email`


<!-- END_4cecf8dbcaa32e7e714c9a0a317f1b4a -->

<!-- START_4eb39746ea8847980a0db9dd9831a456 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/corporate/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET corporate/password/reset/{token}`


<!-- END_4eb39746ea8847980a0db9dd9831a456 -->

<!-- START_842077b5a9f2b581fbdfe430ee2b3d67 -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/corporate/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST corporate/password/reset`


<!-- END_842077b5a9f2b581fbdfe430ee2b3d67 -->

<!-- START_27c0fe0fcb96489ee5bc17dc629f7af6 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/corporate/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/corporate/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET corporate/home`


<!-- END_27c0fe0fcb96489ee5bc17dc629f7af6 -->

<!-- START_79d86f213803f548497f14069ec8b08e -->
## Serve the requested script.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/scripts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/scripts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/scripts/{script}`


<!-- END_79d86f213803f548497f14069ec8b08e -->

<!-- START_14c7923e3b5502655b24066cf1b67810 -->
## Serve the requested stylesheet.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/styles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/styles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/styles/{style}`


<!-- END_14c7923e3b5502655b24066cf1b67810 -->

<!-- START_80081775aa0827e347f90afe872da89b -->
## Get the global search results for the given query.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/search`


<!-- END_80081775aa0827e347f90afe872da89b -->

<!-- START_6cd8cf948ba414938392215203474d06 -->
## Retrieve the given field for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/field/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/field/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/field/{field}`


<!-- END_6cd8cf948ba414938392215203474d06 -->

<!-- START_6077a5200bce4afe7ac6556686bc785e -->
## Store an attachment for a Trix field.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1/trix-attachment/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/trix-attachment/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}/trix-attachment/{field}`


<!-- END_6077a5200bce4afe7ac6556686bc785e -->

<!-- START_f008dc4b31ae78415850959a19b338e1 -->
## Delete a single, persisted attachment for a Trix field by URL.

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/trix-attachment/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/trix-attachment/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/trix-attachment/{field}`


<!-- END_f008dc4b31ae78415850959a19b338e1 -->

<!-- START_8c3d5df29b9442263602dde3a4d603bd -->
## Purge all pending attachments for a Trix field.

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/trix-attachment/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/trix-attachment/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/trix-attachment/{field}/{draftId}`


<!-- END_8c3d5df29b9442263602dde3a4d603bd -->

<!-- START_992b5301f6403a06f6cc4af58372af9d -->
## List the creation fields for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/creation-fields" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/creation-fields"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/creation-fields`


<!-- END_992b5301f6403a06f6cc4af58372af9d -->

<!-- START_3871ef8cb78628e41d82cf8e76698a79 -->
## List the update fields for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/1/update-fields" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/update-fields"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/{resourceId}/update-fields`


<!-- END_3871ef8cb78628e41d82cf8e76698a79 -->

<!-- START_59877c48b1507d5133097bc53a71f0e3 -->
## List the pivot fields for the given resource and relation.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/creation-pivot-fields/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/creation-pivot-fields/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/creation-pivot-fields/{relatedResource}`


<!-- END_59877c48b1507d5133097bc53a71f0e3 -->

<!-- START_08f6159703ef1adc6d51e0f949e1762c -->
## List the pivot fields for the given resource and relation.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/1/update-pivot-fields/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/update-pivot-fields/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/{resourceId}/update-pivot-fields/{relatedResource}/{relatedResourceId}`


<!-- END_08f6159703ef1adc6d51e0f949e1762c -->

<!-- START_bd5ef285cb2e43fa47f026fb97a55928 -->
## Download the given field&#039;s contents.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/1/download/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/download/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/{resourceId}/download/{field}`


<!-- END_bd5ef285cb2e43fa47f026fb97a55928 -->

<!-- START_ab931e7189a47e57ee6f5b02d1893d62 -->
## Delete the file at the given field.

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/1/field/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/field/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/{resourceId}/field/{field}`


<!-- END_ab931e7189a47e57ee6f5b02d1893d62 -->

<!-- START_be1f76f9f573694d57da082688496d04 -->
## Delete the file at the given field.

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/1/1/1/field/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/1/1/field/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/{resourceId}/{relatedResource}/{relatedResourceId}/field/{field}`


<!-- END_be1f76f9f573694d57da082688496d04 -->

<!-- START_0215cdeaf318fd3133db3a29b8054edf -->
## List the actions for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/actions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/actions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/actions`


<!-- END_0215cdeaf318fd3133db3a29b8054edf -->

<!-- START_32113e2f4db6497fec36070b604c8be1 -->
## Perform an action on the specified resources.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}/action`


<!-- END_32113e2f4db6497fec36070b604c8be1 -->

<!-- START_0da2251d1f16623f906912c21352dcb4 -->
## List the filters for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/filters" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/filters"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/filters`


<!-- END_0da2251d1f16623f906912c21352dcb4 -->

<!-- START_096fbeef76f891c93dd0d3ed6a3c5ef0 -->
## List the lenses for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lenses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lenses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lenses`


<!-- END_096fbeef76f891c93dd0d3ed6a3c5ef0 -->

<!-- START_613f1a2b7e28728f0329ef0680527337 -->
## Get the specified lens and its resources.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}`


<!-- END_613f1a2b7e28728f0329ef0680527337 -->

<!-- START_21bc420204d58be09ed91179c139662c -->
## Get the resource count for a given query.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1/count" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/count"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}/count`


<!-- END_21bc420204d58be09ed91179c139662c -->

<!-- START_41622df71bb072c48242ce35aabf7593 -->
## Destroy the given resource(s).

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/lens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/lens/{lens}`


<!-- END_41622df71bb072c48242ce35aabf7593 -->

<!-- START_9b7bc8e4b07ac6861fc6443360a894af -->
## Force delete the given resource(s).

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/lens/1/force" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/force"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/lens/{lens}/force`


<!-- END_9b7bc8e4b07ac6861fc6443360a894af -->

<!-- START_629e9a6fc1fd2cb20ffbc40f5a66f739 -->
## Force delete the given resource(s).

> Example request:

```bash
curl -X PUT \
    "http://api.wajad.test/nova-api/1/lens/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT nova-api/{resource}/lens/{lens}/restore`


<!-- END_629e9a6fc1fd2cb20ffbc40f5a66f739 -->

<!-- START_42051a84b727379d9d6d47939af715cc -->
## List the actions for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1/actions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/actions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}/actions`


<!-- END_42051a84b727379d9d6d47939af715cc -->

<!-- START_b452f36baaee907a9a79d25a0bc9829e -->
## Perform an action on the specified resources.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1/lens/1/action" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/action"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}/lens/{lens}/action`


<!-- END_b452f36baaee907a9a79d25a0bc9829e -->

<!-- START_e75026a9764e7e6a854e4bab11d3349a -->
## List the lenses for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1/filters" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/filters"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}/filters`


<!-- END_e75026a9764e7e6a854e4bab11d3349a -->

<!-- START_235cf358d7f10a4cf4b88a67f8882463 -->
## List the metrics for the dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/metrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/metrics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/metrics`


<!-- END_235cf358d7f10a4cf4b88a67f8882463 -->

<!-- START_75c5d25d695314622793891375f05d70 -->
## Get the specified metric&#039;s value.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/metrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/metrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/metrics/{metric}`


<!-- END_75c5d25d695314622793891375f05d70 -->

<!-- START_b3c6aa2e1ba698059b02637a6fbfab0a -->
## List the metrics for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/metrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/metrics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/metrics`


<!-- END_b3c6aa2e1ba698059b02637a6fbfab0a -->

<!-- START_ef3e144b9d7139e8309d09926d5cc4b4 -->
## Get the specified metric&#039;s value.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/metrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/metrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/metrics/{metric}`


<!-- END_ef3e144b9d7139e8309d09926d5cc4b4 -->

<!-- START_7a48f293e49f8b5475dc501dba358969 -->
## Get the specified metric&#039;s value.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/1/metrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/metrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/{resourceId}/metrics/{metric}`


<!-- END_7a48f293e49f8b5475dc501dba358969 -->

<!-- START_8240d2d0d0bec42cf7ea9c6c2b0d8d8a -->
## List the metrics for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1/metrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/metrics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}/metrics`


<!-- END_8240d2d0d0bec42cf7ea9c6c2b0d8d8a -->

<!-- START_b213450aeb55f0eb908460ca7f2d7e6d -->
## Get the specified metric&#039;s value.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1/metrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/metrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}/metrics/{metric}`


<!-- END_b213450aeb55f0eb908460ca7f2d7e6d -->

<!-- START_567ca3916789cfa96cf5eccedbce68e7 -->
## List the cards for the dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/cards" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/cards"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/cards`


<!-- END_567ca3916789cfa96cf5eccedbce68e7 -->

<!-- START_587cd409ce2ffad1567ff6b36daf3811 -->
## List the cards for the given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/cards" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/cards"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/cards`


<!-- END_587cd409ce2ffad1567ff6b36daf3811 -->

<!-- START_e9939b815e2b11da167025ad4d570261 -->
## List the cards for the given lens.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/lens/1/cards" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/lens/1/cards"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/lens/{lens}/cards`


<!-- END_e9939b815e2b11da167025ad4d570261 -->

<!-- START_d7e0827b96ec78707b6cecaf34e4e306 -->
## Get the relatable authorization status for the resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/relate-authorization" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/relate-authorization"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/relate-authorization`


<!-- END_d7e0827b96ec78707b6cecaf34e4e306 -->

<!-- START_a160117fa2d3e2115fc7b5a2b607676e -->
## Determine if the resource is soft deleting.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/soft-deletes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/soft-deletes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/soft-deletes`


<!-- END_a160117fa2d3e2115fc7b5a2b607676e -->

<!-- START_eb108dc56b9f0c5dfa3a78f5e7586610 -->
## List the resources for administration.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}`


<!-- END_eb108dc56b9f0c5dfa3a78f5e7586610 -->

<!-- START_4eb281ca4afee5992f97aa98f719074e -->
## Get the resource count for a given query.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/count" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/count"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/count`


<!-- END_4eb281ca4afee5992f97aa98f719074e -->

<!-- START_09f4bce311c0fd4956e7a96f3c0d36fc -->
## Detach the given resource(s).

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/detach" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/detach"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/detach`


<!-- END_09f4bce311c0fd4956e7a96f3c0d36fc -->

<!-- START_ed76d718a2a090310a3ab9d44f69d327 -->
## Restore the given resource(s).

> Example request:

```bash
curl -X PUT \
    "http://api.wajad.test/nova-api/1/restore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/restore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT nova-api/{resource}/restore`


<!-- END_ed76d718a2a090310a3ab9d44f69d327 -->

<!-- START_2f147b24869b3fe200508da5f1657340 -->
## Force delete the given resource(s).

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1/force" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/force"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}/force`


<!-- END_2f147b24869b3fe200508da5f1657340 -->

<!-- START_d0280474e7873b30fccbadd73e4cc960 -->
## Display the resource for administration.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/{resourceId}`


<!-- END_d0280474e7873b30fccbadd73e4cc960 -->

<!-- START_0f89fc774dcfa10bbc6ff863f5cd28c8 -->
## Create a new resource.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}`


<!-- END_0f89fc774dcfa10bbc6ff863f5cd28c8 -->

<!-- START_a8a4f5fbc49548f23f5f23f5594b33a0 -->
## Create a new resource.

> Example request:

```bash
curl -X PUT \
    "http://api.wajad.test/nova-api/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT nova-api/{resource}/{resourceId}`


<!-- END_a8a4f5fbc49548f23f5f23f5594b33a0 -->

<!-- START_b53bb26c185afadb6ccf7bc5995481d6 -->
## Destroy the given resource(s).

> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-api/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-api/{resource}`


<!-- END_b53bb26c185afadb6ccf7bc5995481d6 -->

<!-- START_15aaacadfc567304ae119259f48a0e36 -->
## List the available related resources for a given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/associatable/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/associatable/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/associatable/{field}`


<!-- END_15aaacadfc567304ae119259f48a0e36 -->

<!-- START_5f8105e4a4d9182a7abacb3d2bed69db -->
## List the available related resources for a given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/1/attachable/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/attachable/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/{resourceId}/attachable/{field}`


<!-- END_5f8105e4a4d9182a7abacb3d2bed69db -->

<!-- START_6f3024a2b6509eea4d1ecc788b71397e -->
## List the available morphable resources for a given resource.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-api/1/morphable/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/morphable/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-api/{resource}/morphable/{field}`


<!-- END_6f3024a2b6509eea4d1ecc788b71397e -->

<!-- START_dfd68f36b4a7683331938d017e3a9cab -->
## Attach a related resource to the given resource.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1/1/attach/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/attach/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}/{resourceId}/attach/{relatedResource}`


<!-- END_dfd68f36b4a7683331938d017e3a9cab -->

<!-- START_32c33752c37071b57f8ce2f6314979c3 -->
## Update an attached resource pivot record.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1/1/update-attached/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/update-attached/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}/{resourceId}/update-attached/{relatedResource}/{relatedResourceId}`


<!-- END_32c33752c37071b57f8ce2f6314979c3 -->

<!-- START_6b1a68d5e7891e4bdda3b955535b045d -->
## Attach a related resource to the given resource.

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-api/1/1/attach-morphed/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-api/1/1/attach-morphed/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-api/{resource}/{resourceId}/attach-morphed/{relatedResource}`


<!-- END_6b1a68d5e7891e4bdda3b955535b045d -->

<!-- START_71affce8b391d1f3a3fd496dacf1e4b0 -->
## nova-vendor/nova-notifications/notifications
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-vendor/nova-notifications/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/nova-notifications/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-vendor/nova-notifications/notifications`


<!-- END_71affce8b391d1f3a3fd496dacf1e4b0 -->

<!-- START_ecf3e73be1f28950e55bad64d17c103b -->
## upload selected images

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-vendor/array-images/upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/array-images/upload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-vendor/array-images/upload`


<!-- END_ecf3e73be1f28950e55bad64d17c103b -->

<!-- START_7db849e7b481544f8a0dbe659c8ac39f -->
## nova-vendor/array-images/delete/{image}
> Example request:

```bash
curl -X DELETE \
    "http://api.wajad.test/nova-vendor/array-images/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/array-images/delete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE nova-vendor/array-images/delete/{image}`


<!-- END_7db849e7b481544f8a0dbe659c8ac39f -->

<!-- START_e161d97aa213594029c10831cf786bd7 -->
## nova-vendor/maatwebsite/laravel-nova-excel/download
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-vendor/maatwebsite/laravel-nova-excel/download" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/maatwebsite/laravel-nova-excel/download"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-vendor/maatwebsite/laravel-nova-excel/download`


<!-- END_e161d97aa213594029c10831cf786bd7 -->

<!-- START_e4d254a9bffa34bfa2bc82a6028fbf5c -->
## nova-vendor/paypal/getData
> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/nova-vendor/paypal/getData" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/paypal/getData"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET nova-vendor/paypal/getData`


<!-- END_e4d254a9bffa34bfa2bc82a6028fbf5c -->

<!-- START_cc7baf90522508d12fa20b6c17eda93c -->
## nova-vendor/nova-belongsto-depend
> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/nova-vendor/nova-belongsto-depend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/nova-vendor/nova-belongsto-depend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST nova-vendor/nova-belongsto-depend`


<!-- END_cc7baf90522508d12fa20b6c17eda93c -->


