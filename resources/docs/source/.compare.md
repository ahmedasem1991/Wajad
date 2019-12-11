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

#Answers


<!-- START_b8c093319f63f6104bb55df0e5169242 -->
## Answer question

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/post/1/answer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/post/1/answer"
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


> Example response (200):

```json
{
    "success": true,
    "message": "Answers created successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/post/{post}/answer`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `post_id` |  required  | int, exists in posts

<!-- END_b8c093319f63f6104bb55df0e5169242 -->

#Auth


<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"00966236363256","password":"123456789","device_type":"est"}'

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
    "password": "123456789",
    "device_type": "est"
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
        "default_distance_unit": "kilo",
        "image": "image.png"
    }
}
```
> Example response (401):

```json
{
    "success": false,
    "message": "These credentials do not match our records.",
    "status_code": 401
}
```
> Example response (400):

```json
{
    "success": false,
    "message": "please enter a valid email address or phone number.",
    "status_code": 400
}
```

### HTTP Request
`POST api/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | numeric,email,min:9,max:14 |  required  | phone number or email for the user.
        `password` | string |  required  | min:6 password.
        `device_type` | string |  required  | android or ios
    
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Api Username","email":"api@wajad.com","password":"123456789","mobile_number":"123456789","device_type":"possimus"}'

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
    "mobile_number": "123456789",
    "device_type": "possimus"
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
        "default_distance_unit": "kilo",
        "image": "image.png"
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
        `device_type` | string |  required  | android or ios
    
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_406e4552819a456070d1f6c93688188d -->
## Refresh Token
[Refresh the current API Beaerer Token]

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/refreshToken?Old=consequatur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "consequatur",
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

<!-- START_ea7e28be0fe9f5f4f03de00c1544e2c3 -->
## Send Code

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/sendCode/phone." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/sendCode/phone."
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


> Example response (200):

```json
{
    "success": true,
    "message": "Verification code sent.",
    "status_code": 200
}
```

### HTTP Request
`POST api/sendCode/{type}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | phone or email.

<!-- END_ea7e28be0fe9f5f4f03de00c1544e2c3 -->

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

#Home


<!-- START_e22799a526b2d5e6c38d0c9ffba872eb -->
## Banners

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
        {
            "type": "url",
            "image": "http:\/\/wajad.test\/ddd",
            "url": "c dvd"
        }
    ]
}
```

### HTTP Request
`GET api/home/banners`


<!-- END_e22799a526b2d5e6c38d0c9ffba872eb -->

<!-- START_adef4ddd684318346ed10525cf68c6e9 -->
## Posts

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/posts/numquam/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/posts/numquam/1"
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
            "subCategoryName": "opjmp",
            "subCategoryIcon": "http:\/\/wajad.test\/images\/default.png",
            "subCategoryPostsCount": 3
        }
    ],
    "parentCategory": {
        "subCategoryName": "All",
        "subCategoryIcon": "http:\/\/wajad.test\/subcategories\/all.png",
        "subCategoryPostsCount": 3
    },
    "posts": [
        {
            "id": 3,
            "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
            "approval_status": 1,
            "reward": 0,
            "description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
            "status": "found",
            "attached_to_item": true,
            "item": {
                "id": 1,
                "title": "poj",
                "details": "pokpo",
                "status": "found",
                "owner": {
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
                "model": {
                    "id": 3,
                    "name": "Explicabo rerum ut et dolores officiis et.",
                    "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                    "image": "http:\/\/wajad.test\/default-icon.png"
                },
                "color": {
                    "id": 1,
                    "name": "Red",
                    "icon": "images\/colors\/red.png"
                },
                "brand": {
                    "id": 2,
                    "name": "Et dicta similique adipisci ut autem deleniti qui.",
                    "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
                    "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
                },
                "date": "2019-12-13 00:00:00",
                "images": []
            },
            "sub_category": {
                "id": 5,
                "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
                "description": "Quia impedit hic nesciunt quis eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 3,
                "name": "Explicabo rerum ut et dolores officiis et.",
                "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-08 15:40:37",
            "images": [],
            "post_requests": [
                {
                    "id": 3,
                    "is_request_valid": 0,
                    "cliamers": {
                        "questions": [
                            {
                                "id": 1,
                                "question": "kp'[k'[p\r\n",
                                "answers": [
                                    {
                                        "id": 1,
                                        "answer": ";lokpok",
                                        "date": "2019-12-10 00:00:00"
                                    }
                                ]
                            }
                        ],
                        "id": 1,
                        "name": "Admin",
                        "email": "admin@nova.com",
                        "status": 1,
                        "mobile_number": "01111086890",
                        "receive_emails": false,
                        "receive_push_notifications": false,
                        "is_email_verified": false,
                        "is_mobile_number_verified": false,
                        "default_distance_unit": "kilo"
                    },
                    "date": "2019-12-10 00:00:00"
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
`GET api/home/posts/{status}/{subcategory_id?}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `status` |  required  | string lost or found
    `subcategory_id` |  optional  | int, sub_category_id, exists in sub_categories

<!-- END_adef4ddd684318346ed10525cf68c6e9 -->

#Items


<!-- START_e18d215dd04344daa68de35e381670fd -->
## User Items

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/userItems" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/userItems"
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
            "title": "hiughiu",
            "details": "oihiojjjjjjjjjjjjjjhioj",
            "status": "found",
            "owner": {
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
            "model": {
                "id": 1,
                "name": "jhinoi",
                "description": "pjipo",
                "image": "http:\/\/wajad.test\/images\/default.png"
            },
            "color": {
                "id": 1,
                "name": "Red",
                "icon": "images\/colors\/red.png"
            },
            "brand": {
                "id": 1,
                "name": "pojmop",
                "description": "ijoi",
                "image": "http:\/\/wajad.test\/images\/default.png"
            },
            "qrcode": {
                "id": 1,
                "url": "http:\/\/api.wajad.test\/api\/scan-qr-code",
                "user": null,
                "item": {
                    "id": 1,
                    "title": "Porro est dolores at perferendis tempora.",
                    "details": "Corrupti velit alias sit a omnis illo. Soluta veritatis nihil incidunt at sit illum ad. Et voluptas earum explicabo cum sunt. Impedit ullam aliquam velit excepturi soluta. Quae atque ut perspiciatis magni. Eligendi error eius sit. Fuga minus voluptatem harum veritatis mollitia deleniti. Sequi eligendi voluptatem minus ipsum cum non ut. Eos veniam quia et est. Qui non nemo eum ducimus. Aut non ducimus et aut. Ea repellendus eaque nostrum quidem mollitia quaerat. Aliquid qui ut beatae et quidem iure quod dolor. Minima porro iure autem distinctio temporibus ut nobis. Hic accusamus veniam voluptas ipsum quisquam. Suscipit omnis id sed in. Reprehenderit cum dolorem adipisci earum sunt ullam. Est debitis numquam voluptatem dicta quia est dolore officia. Quia ducimus qui dolor esse ea eius. Velit itaque consequatur cum eaque consequatur.",
                    "status": 3,
                    "owner_id": 4,
                    "model_id": 6,
                    "color_id": 13,
                    "sub_category_id": null,
                    "brand_id": null,
                    "deleted_at": null,
                    "created_at": "2019-12-10 17:20:28",
                    "updated_at": "2019-12-10 17:20:28"
                }
            },
            "date": "2019-12-04 14:23:43",
            "images": []
        }
    ]
}
```

### HTTP Request
`GET api/userItems`


<!-- END_e18d215dd04344daa68de35e381670fd -->

<!-- START_1f8988f8b514fb2127ba9ed8e2499f98 -->
## Show Item

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


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "title": "hiughiu",
        "details": "oihiojjjjjjjjjjjjjjhioj",
        "status": "found",
        "owner": {
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
        "model": {
            "id": 1,
            "name": "jhinoi",
            "description": "pjipo",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        "color": {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        },
        "brand": {
            "id": 1,
            "name": "pojmop",
            "description": "ijoi",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        "qrcode": {
            "id": 1,
            "url": "http:\/\/api.wajad.test\/api\/scan-qr-code",
            "user": null,
            "item": {
                "id": 1,
                "title": "Porro est dolores at perferendis tempora.",
                "details": "Corrupti velit alias sit a omnis illo. Soluta veritatis nihil incidunt at sit illum ad. Et voluptas earum explicabo cum sunt. Impedit ullam aliquam velit excepturi soluta. Quae atque ut perspiciatis magni. Eligendi error eius sit. Fuga minus voluptatem harum veritatis mollitia deleniti. Sequi eligendi voluptatem minus ipsum cum non ut. Eos veniam quia et est. Qui non nemo eum ducimus. Aut non ducimus et aut. Ea repellendus eaque nostrum quidem mollitia quaerat. Aliquid qui ut beatae et quidem iure quod dolor. Minima porro iure autem distinctio temporibus ut nobis. Hic accusamus veniam voluptas ipsum quisquam. Suscipit omnis id sed in. Reprehenderit cum dolorem adipisci earum sunt ullam. Est debitis numquam voluptatem dicta quia est dolore officia. Quia ducimus qui dolor esse ea eius. Velit itaque consequatur cum eaque consequatur.",
                "status": 3,
                "owner_id": 4,
                "model_id": 6,
                "color_id": 13,
                "sub_category_id": null,
                "brand_id": null,
                "deleted_at": null,
                "created_at": "2019-12-10 17:20:28",
                "updated_at": "2019-12-10 17:20:28"
            }
        },
        "date": "2019-12-04 14:17:09",
        "images": [
            {
                "id": 1,
                "image": "http:\/\/wajad.test\/images\/items\/E9S8p3Z5R7GLR1qc1xBcECGZjHBALeDLU9KtvSCN.jpeg"
            },
            {
                "id": 2,
                "image": "http:\/\/wajad.test\/images\/items\/EJgxxfyHErwzc3cPTGpCKmihIgcX8hNdYX4DirAo.jpeg"
            },
            {
                "id": 3,
                "image": "http:\/\/wajad.test\/images\/items\/GxwJYCc5eSSUj585huRcVks8m17DUwCGhEUDNubN.jpeg"
            },
            {
                "id": 4,
                "image": "http:\/\/wajad.test\/images\/items\/sp0KWN5ryd0VN6xzdIVbm9hY9dYemUlfDMD5LTmY.jpeg"
            },
            {
                "id": 5,
                "image": "http:\/\/wajad.test\/images\/items\/1hancpYm0XR8HjjK4Iz8AVAUyMqkQPOubagobDxs.jpeg"
            }
        ]
    }
}
```

### HTTP Request
`GET api/items/{item}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `item` |  required  | int Item id.

<!-- END_1f8988f8b514fb2127ba9ed8e2499f98 -->

<!-- START_07fb85e5d8610027392f9f49c33a97c1 -->
## Create Item

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"ea","details":"dolores","color_id":"ut","brand_id":"aut","model_id":"eligendi","sub_category_id":"aliquid"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "ea",
    "details": "dolores",
    "color_id": "ut",
    "brand_id": "aut",
    "model_id": "eligendi",
    "sub_category_id": "aliquid"
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
    "message": "Item created successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/items`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | min:6,max:255 |  required  | 
        `details` | min:20,max:500 |  required  | 
        `color_id` | exists:colors,id |  required  | 
        `brand_id` | exists:brands,id |  required  | 
        `model_id` | exists:models,id |  required  | 
        `sub_category_id` | exists:sub_category,id |  required  | 
    
<!-- END_07fb85e5d8610027392f9f49c33a97c1 -->

<!-- START_e34601ed139d88ac1613ec4df2056baa -->
## Edit Item

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


> Example response (200):

```json
{
    "success": true,
    "message": "Item updated successfully.",
    "status_code": 200
}
```

### HTTP Request
`PUT api/items/{item}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `item` |  required  | int Item id.

<!-- END_e34601ed139d88ac1613ec4df2056baa -->

<!-- START_4ba7e871e55098b0081507ac0b4e478b -->
## Delete Item

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


> Example response (200):

```json
{
    "success": true,
    "message": "Item deleted successfully.",
    "status_code": 200
}
```

### HTTP Request
`DELETE api/items/{item}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `item` |  required  | Item id.

<!-- END_4ba7e871e55098b0081507ac0b4e478b -->

#Packages


<!-- START_c9db6d511dc413ffed938cbd76dd5af7 -->
## Packages

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/packages"
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
            "name": "Platinum Package",
            "description": "Get 25 QrCodes As Sticker To Sticker it on any item to protect it Activated for one year.",
            "qrcodes_count": 1500,
            "price": 1500,
            "currency": "USD",
            "period": "12 days",
            "type": "single",
            "incrementally": true
        }
    ]
}
```

### HTTP Request
`GET api/packages`


<!-- END_c9db6d511dc413ffed938cbd76dd5af7 -->

#Pages


<!-- START_727da77b51e4f96916de138b4b71c037 -->
## Pages

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


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "page": "about-us",
        "title": "okpokmj",
        "body": "ppojpoj"
    }
}
```

### HTTP Request
`GET api/pages/{page?}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `type` |  required  | about-us or contact-us or privacy-policy

<!-- END_727da77b51e4f96916de138b4b71c037 -->

#Post Request


<!-- START_e4d239ac8a5a2883bb4c41b1264d1930 -->
## This item is mine

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/request/post/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/request/post/1"
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


> Example response (200):

```json
{
    "success": true,
    "message": "Post request created successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/request/post/{post}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `post_id` |  required  | int, exists in posts

<!-- END_e4d239ac8a5a2883bb4c41b1264d1930 -->

<!-- START_af5dda572adce7d093ba91ef873857b9 -->
## This Post Request is his

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/request/1/accept" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"ut"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/request/1/accept"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "ut"
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
    "message": "Post request accepted successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/request/{post}/accept`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `post_id` |  required  | int exists in posts
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | required |  optional  | int exists in users
    
<!-- END_af5dda572adce7d093ba91ef873857b9 -->

<!-- START_d6b20bbd04c0424e02089d99a282853f -->
## Reject Post Request

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/request/1/reject" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/request/1/reject"
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


> Example response (200):

```json
{
    "success": true,
    "message": "Post request rejected successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/request/{post}/reject`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `post_id` |  required  | int exists in posts

<!-- END_d6b20bbd04c0424e02089d99a282853f -->

#Posts


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
            "id": 3,
            "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
            "approval_status": 1,
            "reward": 0,
            "description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
            "status": "found",
            "attached_to_item": true,
            "item": {
                "id": 1,
                "title": "poj",
                "details": "pokpo",
                "status": "found",
                "owner": {
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
                "model": {
                    "id": 3,
                    "name": "Explicabo rerum ut et dolores officiis et.",
                    "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                    "image": "http:\/\/wajad.test\/default-icon.png"
                },
                "color": {
                    "id": 1,
                    "name": "Red",
                    "icon": "images\/colors\/red.png"
                },
                "brand": {
                    "id": 2,
                    "name": "Et dicta similique adipisci ut autem deleniti qui.",
                    "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
                    "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
                },
                "date": "2019-12-13 00:00:00",
                "images": []
            },
            "sub_category": {
                "id": 5,
                "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
                "description": "Quia impedit hic nesciunt quis eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 3,
                "name": "Explicabo rerum ut et dolores officiis et.",
                "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-08 15:40:37",
            "images": [],
            "post_requests": [
                {
                    "id": 3,
                    "is_request_valid": 0,
                    "cliamers": {
                        "questions": [
                            {
                                "id": 1,
                                "question": "kp'[k'[p\r\n",
                                "answers": [
                                    {
                                        "id": 1,
                                        "answer": ";lokpok",
                                        "date": "2019-12-10 00:00:00"
                                    }
                                ]
                            }
                        ],
                        "id": 1,
                        "name": "Admin",
                        "email": "admin@nova.com",
                        "status": 1,
                        "mobile_number": "01111086890",
                        "receive_emails": false,
                        "receive_push_notifications": false,
                        "is_email_verified": false,
                        "is_mobile_number_verified": false,
                        "default_distance_unit": "kilo"
                    },
                    "date": "2019-12-10 00:00:00"
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
    `type` |  required  | lost or found.

<!-- END_93fe34fffcec9f399970d7fffb9bcc14 -->

<!-- START_744b6fe741992bf8fdb4f532ceaa3586 -->
## Report Post

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/report/post/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"details":"voluptatem","image":"voluptatem"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/report/post/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "details": "voluptatem",
    "image": "voluptatem"
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
    "message": "Post reported successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/report/post/{post}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | int Post Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `details` | string |  optional  | nullable max:1000
        `image` | image |  optional  | sometimes mimes:jpeg,jpg,png,gif max:5102
    
<!-- END_744b6fe741992bf8fdb4f532ceaa3586 -->

<!-- START_726b7bf93b3209836a1cbcda5b3b6703 -->
## Show Post

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
    "data": [
        {
            "id": 3,
            "title": "Quibusdam aliquid omnis quia quibusdam molestiae placeat voluptatum consequatur.",
            "approval_status": 1,
            "reward": 0,
            "description": "Repudiandae sequi enim aut et praesentium adipisci. Expedita deleniti explicabo aspernatur labore occaecati quidem unde sequi. Non omnis veritatis blanditiis harum perspiciatis cum sint. Et dignissimos temporibus ut excepturi. Molestiae eos qui occaecati iste. Accusantium enim quo rerum. Dignissimos omnis rerum voluptatem fugiat id. Ad optio blanditiis quis placeat. Officiis illum id sint omnis. Quisquam tempore beatae nesciunt. Reprehenderit sed quo est nobis excepturi nisi. Non nihil dignissimos alias totam. Adipisci occaecati accusantium illum itaque velit unde. Autem voluptas voluptatem qui commodi inventore ullam quia.",
            "status": "found",
            "attached_to_item": true,
            "item": {
                "id": 1,
                "title": "poj",
                "details": "pokpo",
                "status": "found",
                "owner": {
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
                "model": {
                    "id": 3,
                    "name": "Explicabo rerum ut et dolores officiis et.",
                    "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                    "image": "http:\/\/wajad.test\/default-icon.png"
                },
                "color": {
                    "id": 1,
                    "name": "Red",
                    "icon": "images\/colors\/red.png"
                },
                "brand": {
                    "id": 2,
                    "name": "Et dicta similique adipisci ut autem deleniti qui.",
                    "description": "Facilis incidunt dolores consequatur quis aliquam quia voluptatem.",
                    "image": "http:\/\/wajad.test\/\/tmp\/4886df1c2c60650759bf348635be787a.jpg"
                },
                "date": "2019-12-13 00:00:00",
                "images": []
            },
            "sub_category": {
                "id": 5,
                "name": "Est ipsa explicabo et suscipit maxime quidem illo.",
                "description": "Quia impedit hic nesciunt quis eum.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 3,
                "name": "Explicabo rerum ut et dolores officiis et.",
                "description": "Laudantium fugit ut harum magnam magnam deserunt.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-08 15:40:37",
            "images": [],
            "post_requests": [
                {
                    "id": 3,
                    "is_request_valid": 0,
                    "cliamers": {
                        "questions": [
                            {
                                "id": 1,
                                "question": "kp'[k'[p\r\n",
                                "answers": [
                                    {
                                        "id": 1,
                                        "answer": ";lokpok",
                                        "date": "2019-12-10 00:00:00"
                                    }
                                ]
                            }
                        ],
                        "id": 1,
                        "name": "Admin",
                        "email": "admin@nova.com",
                        "status": 1,
                        "mobile_number": "01111086890",
                        "receive_emails": false,
                        "receive_push_notifications": false,
                        "is_email_verified": false,
                        "is_mobile_number_verified": false,
                        "default_distance_unit": "kilo"
                    },
                    "date": "2019-12-10 00:00:00"
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
`GET api/posts/{post}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | int Post Id

<!-- END_726b7bf93b3209836a1cbcda5b3b6703 -->

<!-- START_f01269a1d8321c0c8787967b5346c585 -->
## Create Post

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/posts/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"est","description":"voluptate","reward":"eum","longitude":"fugiat","latitude":"est","sub_category_id":13,"brand_id":17,"model_id":1,"color_id":6,"item_id":7,"city":"a","images":["error"],"questions":["aut"]}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/posts/add/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "est",
    "description": "voluptate",
    "reward": "eum",
    "longitude": "fugiat",
    "latitude": "est",
    "sub_category_id": 13,
    "brand_id": 17,
    "model_id": 1,
    "color_id": 6,
    "item_id": 7,
    "city": "a",
    "images": [
        "error"
    ],
    "questions": [
        "aut"
    ]
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
    "message": "Post created successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/posts/add/{type}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | min:6 max:255
        `description` | string |  required  | min:9 max:255
        `reward` | string |  optional  | 
        `longitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `latitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `sub_category_id` | integer |  required  | exists:sub_categories,id
        `brand_id` | integer |  required  | exists:brands,id
        `model_id` | integer |  required  | exists:models,id
        `color_id` | integer |  required  | exists:colors,id
        `item_id` | integer |  optional  | nullable exists:items,id
        `city` | string |  required  | 
        `images` | array |  optional  | sometimes between:1,5
        `images.*` | image |  optional  | sometimes mimes:jpeg,jpg,png,gif max:5012
        `questions` | array |  optional  | sometimes size:3
        `questions.*` | required |  optional  | min:9 max:500
    
<!-- END_f01269a1d8321c0c8787967b5346c585 -->

<!-- START_ddec2b5ffb0465b4f2916ca57e164686 -->
## Update Post

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"id","description":"ab","status":"ab","reward":"libero","longitude":"voluptatibus","latitude":"illo","sub_category_id":4,"brand_id":5,"model_id":1,"color_id":9,"item_id":15,"city":"blanditiis","images":["asperiores"],"questions":["nulla"]}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "id",
    "description": "ab",
    "status": "ab",
    "reward": "libero",
    "longitude": "voluptatibus",
    "latitude": "illo",
    "sub_category_id": 4,
    "brand_id": 5,
    "model_id": 1,
    "color_id": 9,
    "item_id": 15,
    "city": "blanditiis",
    "images": [
        "asperiores"
    ],
    "questions": [
        "nulla"
    ]
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
    "message": "Post updated successfully.",
    "status_code": 200
}
```

### HTTP Request
`POST api/posts/{post}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | int Post Id
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | min:6 max:255
        `description` | string |  required  | min:9 max:255
        `status` | numeric |  required  | in:0,1
        `reward` | string |  optional  | 
        `longitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `latitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `sub_category_id` | integer |  required  | exists:sub_categories,id
        `brand_id` | integer |  required  | exists:brands,id
        `model_id` | integer |  required  | exists:models,id
        `color_id` | integer |  required  | exists:colors,id
        `item_id` | integer |  optional  | nullable exists:items,id
        `city` | string |  required  | 
        `images` | array |  optional  | sometimes between:1,5
        `images.*` | image |  optional  | sometimes mimes:jpeg,jpg,png,gif max:5012
        `questions` | array |  optional  | sometimes size:3
        `questions.*` | required |  optional  | min:9 max:500
    
<!-- END_ddec2b5ffb0465b4f2916ca57e164686 -->

<!-- START_790d23dbb8c799c36c70f7133a51e7a5 -->
## Delete Post

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


> Example response (200):

```json
{
    "success": true,
    "message": "Post deleted successfully.",
    "status_code": 200
}
```

### HTTP Request
`DELETE api/posts/{post}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | int Post Id

<!-- END_790d23dbb8c799c36c70f7133a51e7a5 -->

#QR Codes


<!-- START_31a59373caf0e95a483c98e25d562cd6 -->
## User QR Codes

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/userQRCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/userQRCodes"
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
    "single": [
        {
            "id": 1,
            "url": "http:\/\/api.wajad.test\/api\/scan-qr-code\/1",
            "user": {
                "id": 2,
                "name": "User",
                "email": "user@nova.com",
                "status": 1,
                "mobile_number": "0096601120650906",
                "receive_emails": false,
                "receive_push_notifications": false,
                "is_email_verified": false,
                "is_mobile_number_verified": false,
                "default_distance_unit": "kilo",
                "image": "http:\/\/wajad.test\/images\/profile\/default-profile.png"
            },
            "item": null
        }
    ],
    "multi": [],
    "active": [],
    "expired": []
}
```

### HTTP Request
`GET api/userQRCodes`


<!-- END_31a59373caf0e95a483c98e25d562cd6 -->

#Search


<!-- START_9d08a4da7d839136b63a8291497ec010 -->
## Search Filter

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"model":12,"color":18,"brand":5,"subcategory":9,"date":"ratione"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "model": 12,
    "color": 18,
    "brand": 5,
    "subcategory": 9,
    "date": "ratione"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 3,
            "title": "Animi consectetur et expedita sit corrupti officia qui.",
            "approval_status": 1,
            "reward": 0,
            "description": "Voluptatem voluptate nesciunt nemo assumenda magni. Iste qui quia est aut. Beatae ea similique vero et quis. Dolorum aspernatur qui deserunt deserunt optio explicabo. Aut culpa autem dolor a omnis qui. Hic esse mollitia earum unde et. Eum qui tempore excepturi repellat illum. Aut ad adipisci iure est assumenda eligendi qui nemo. Modi eos libero molestiae saepe reiciendis corporis quia eveniet. Eveniet ad ducimus aspernatur in praesentium omnis voluptatem. In vel voluptatem itaque voluptatem sunt. Ad aperiam et amet et.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 6,
                "name": "Et expedita est explicabo qui sit veritatis.",
                "description": "Dolore rerum quo quis explicabo magni occaecati.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 4,
                "name": "Deleniti quis et ut sapiente dolores sunt.",
                "description": "Sapiente quaerat et in suscipit.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 4,
            "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
            "approval_status": 1,
            "reward": 0,
            "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 8,
                "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
                "description": "Aut soluta laborum sequi et similique.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 5,
                "name": "Id fugit corporis harum expedita.",
                "description": "Fugiat nesciunt quasi sequi autem.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        }
    ]
}
```

### HTTP Request
`GET api/home/search`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `model` | integer |  optional  | exist in models.
        `color` | integer |  optional  | exist in colors.
        `brand` | integer |  optional  | exist in brands.
        `subcategory` | integer |  optional  | exist in subcategories.
        `date` | date |  optional  | 
    
<!-- END_9d08a4da7d839136b63a8291497ec010 -->

<!-- START_a381454c94e24449400bd187815c6920 -->
## Search By KeyWords

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/search/keywords" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"keywords":"ratione"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/search/keywords"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "keywords": "ratione"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 3,
            "title": "Animi consectetur et expedita sit corrupti officia qui.",
            "approval_status": 1,
            "reward": 0,
            "description": "Voluptatem voluptate nesciunt nemo assumenda magni. Iste qui quia est aut. Beatae ea similique vero et quis. Dolorum aspernatur qui deserunt deserunt optio explicabo. Aut culpa autem dolor a omnis qui. Hic esse mollitia earum unde et. Eum qui tempore excepturi repellat illum. Aut ad adipisci iure est assumenda eligendi qui nemo. Modi eos libero molestiae saepe reiciendis corporis quia eveniet. Eveniet ad ducimus aspernatur in praesentium omnis voluptatem. In vel voluptatem itaque voluptatem sunt. Ad aperiam et amet et.",
            "status": "lost",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 6,
                "name": "Et expedita est explicabo qui sit veritatis.",
                "description": "Dolore rerum quo quis explicabo magni occaecati.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 4,
                "name": "Deleniti quis et ut sapiente dolores sunt.",
                "description": "Sapiente quaerat et in suscipit.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 4,
            "title": "Quo cupiditate quod quae recusandae iure voluptas voluptas.",
            "approval_status": 1,
            "reward": 0,
            "description": "Dolorem libero vitae eos eveniet et repellat. Veritatis eos officiis quaerat esse reprehenderit quaerat non. Hic laboriosam tenetur asperiores nemo distinctio. Rerum libero dicta et pariatur. Eveniet repudiandae consequatur quasi vero. Sit sit sunt quasi esse et debitis. Placeat non porro molestiae. Porro reprehenderit voluptas modi dolorem et. Et rerum cupiditate tempora et saepe iusto est aut. Consectetur repellendus aliquam et non in optio. Ab rerum aliquam est aspernatur laudantium suscipit. Facilis quod sed accusamus sunt ducimus nulla. Incidunt quia eligendi aut ut praesentium culpa perferendis. Ut nihil doloribus dolores. Atque qui saepe et sunt enim architecto inventore consequatur. Fugiat temporibus voluptas voluptatem sed dolor officia. Et quibusdam provident repellendus facere. Voluptas voluptatem quis ut voluptatum deserunt. Nostrum ratione fugiat qui aut nihil. Et voluptatem adipisci impedit cumque recusandae. Ut consequatur delectus ea dolor labore quaerat. Quisquam quisquam non vel.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 8,
                "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
                "description": "Aut soluta laborum sequi et similique.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "model": {
                "id": 5,
                "name": "Id fugit corporis harum expedita.",
                "description": "Fugiat nesciunt quasi sequi autem.",
                "image": "http:\/\/wajad.test\/default-icon.png"
            },
            "color": null,
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        }
    ]
}
```
> Example response (200):

```json
{}
```

### HTTP Request
`GET api/home/search/keywords`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `keywords` | string |  required  | 
    
<!-- END_a381454c94e24449400bd187815c6920 -->

<!-- START_16f48877f83d0a8ab32bef962081ffac -->
## Fetch search data

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/search/data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/search/data"
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
    "regions": [
        {
            "id": 1,
            "name": "Al Riyadh Region"
        }
    ],
    "subcategories": [
        {
            "id": 1,
            "name": "opjmp",
            "description": "jmiojoi",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "brands": [
                {
                    "id": 1,
                    "name": "pojmop",
                    "description": "ijoi",
                    "image": "http:\/\/wajad.test\/images\/default.png",
                    "models": [
                        {
                            "id": 1,
                            "name": "jhinoi",
                            "description": "pjipo",
                            "image": "http:\/\/wajad.test\/images\/default.png"
                        }
                    ]
                }
            ]
        }
    ],
    "colors": [
        {
            "id": 1,
            "name": "Red",
            "icon": "images\/colors\/red.png"
        }
    ]
}
```

### HTTP Request
`GET api/home/search/data`


<!-- END_16f48877f83d0a8ab32bef962081ffac -->

#User Profile


<!-- START_b4f4625b609a18310a50b1dddf752a55 -->
## Reset Password

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/resetPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"mail@gmail.com"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/resetPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user": "mail@gmail.com"
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
    "message": "New password sent successfully to your mail.",
    "status_code": 200
}
```

### HTTP Request
`POST api/resetPassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user` | email,min:9,max:14 |  required  | email or phone.
    
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
        "default_distance_unit": "kilo",
        "image": "image.png"
    }
}
```

### HTTP Request
`GET api/userData`


<!-- END_0b828966a9f31e695693fe9650b70eb1 -->

<!-- START_734623b7e60cc9f20fd5b5b67df87d7d -->
## Verify Code for Phone or Email

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
    `code` | numeric |  required  | digits:4
    
<!-- END_734623b7e60cc9f20fd5b5b67df87d7d -->

<!-- START_72a884b85bf7bf4198984d6ccecce2b7 -->
## Update User Profile

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/updateUserProfile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"1234","receive_emails":true,"receive_push_notifications":true,"default_distance_unit":"mile","image":"aut"}'

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
    "default_distance_unit": "mile",
    "image": "aut"
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
    `name` | string |  required  | min:6,max:255 1 or 0.
        `receive_emails` | boolean |  required  | 1 or 0.
        `receive_push_notifications` | boolean |  required  | 1 or 0.
        `default_distance_unit` | string,in:kilo,mile |  required  | kilo or mile.
        `image` | file |  optional  | mimes:jpeg,jpg,png,gif, max:5102
    
<!-- END_72a884b85bf7bf4198984d6ccecce2b7 -->

<!-- START_dd73fe89d9872ce37d284636141ae526 -->
## Password Reset

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changePassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"old_password":"commodi","new_password":"aut","new_password_confirmation":"vel"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "commodi",
    "new_password": "aut",
    "new_password_confirmation": "vel"
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
    "message": "Password Updated Successfully",
    "status_code": 200
}
```

### HTTP Request
`POST api/changePassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `old_password` | string |  required  | 'min:6' 'max:255'
        `new_password` | string |  required  | 'confirmed' 'min:6', 'max:255'
        `new_password_confirmation` | string |  required  | confirm new password
    
<!-- END_dd73fe89d9872ce37d284636141ae526 -->

<!-- START_cb0e89a15b080a33f4c18135f097480d -->
## Change Phone Number

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changePhone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile_number":"et"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/changePhone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile_number": "et"
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
    "message": "Verification code sent.",
    "status_code": 200
}
```

### HTTP Request
`POST api/changePhone`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `mobile_number` | numeric |  required  | digits_between:9,14 unique:user ignore:user-id
    
<!-- END_cb0e89a15b080a33f4c18135f097480d -->

<!-- START_d0ad6077a075427e4ae216d3352ed1ef -->
## Change Email

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changeEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"example@example.com"}'

```

```javascript
const url = new URL(
    "http://api.wajad.test/api/changeEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "example@example.com"
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
{}
```

### HTTP Request
`POST api/changeEmail`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | email |  required  | 
    
<!-- END_d0ad6077a075427e4ae216d3352ed1ef -->

#general


<!-- START_98a9f611f7c0880f849db435165db194 -->
## api/qrcodes/create
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
            "name": "Nihil velit dolorem aperiam numquam et et accusantium.",
            "description": "Natus dolor et voluptatum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 2,
            "name": "Dignissimos officia neque nisi aut sunt quasi.",
            "description": "Nostrum qui animi eum earum omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 3,
            "name": "Porro nesciunt rerum ut soluta.",
            "description": "Eos expedita fugiat perspiciatis facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 4,
            "name": "Magnam excepturi suscipit illo nihil unde sit rem.",
            "description": "Repudiandae suscipit aut veritatis repellat error hic.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 5,
            "name": "Recusandae molestiae sed voluptas quidem temporibus laudantium ipsam ducimus.",
            "description": "Impedit soluta aperiam omnis ipsam odit excepturi harum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 6,
            "name": "Aspernatur incidunt quo quo qui commodi esse ad.",
            "description": "Dolor et corrupti nam exercitationem ab non voluptatum saepe.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 7,
            "name": "Illo exercitationem recusandae explicabo dolor.",
            "description": "Quibusdam est voluptatem reiciendis adipisci expedita nemo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 8,
            "name": "Est autem sit repellendus nobis.",
            "description": "Impedit voluptatem voluptas asperiores enim fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 9,
            "name": "Qui esse hic illum autem assumenda.",
            "description": "Odio non nisi voluptas eius velit cumque rerum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 10,
            "name": "Quos saepe odit et molestiae laudantium.",
            "description": "Tempore perspiciatis id in.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 11,
            "name": "Expedita facilis sed sunt tempore possimus consectetur dolore.",
            "description": "Eum quibusdam quas quis numquam a deleniti explicabo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 12,
            "name": "Qui iure fugit iure aut voluptatibus qui exercitationem.",
            "description": "Natus nostrum velit provident necessitatibus rem in nihil non.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 13,
            "name": "Voluptas repellendus veniam sint delectus sed.",
            "description": "Neque cum neque deleniti eos voluptas voluptas consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 14,
            "name": "Nisi voluptatem ea ex consectetur cumque sapiente officia eum.",
            "description": "Quia molestias iste eos.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 15,
            "name": "Nihil voluptas voluptatum quo aut minima necessitatibus.",
            "description": "Qui corporis tenetur rerum expedita ad.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 16,
            "name": "Accusantium non qui maxime provident deserunt in.",
            "description": "Aliquid est vero iste repellendus labore cumque ea.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 17,
            "name": "Optio maiores officiis illum atque recusandae deserunt illum.",
            "description": "Dolore omnis molestias nesciunt vel natus qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 18,
            "name": "Odit assumenda assumenda aperiam nihil hic.",
            "description": "Ab consequatur reprehenderit est et voluptatem tempore.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 19,
            "name": "Eos et repudiandae placeat natus.",
            "description": "Sit voluptate unde nam perferendis sit dolor placeat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 20,
            "name": "Quasi qui sed aut sed dicta.",
            "description": "Accusamus eligendi optio cum quo sunt ut eaque eius.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 21,
            "name": "Quis nihil quis autem consequatur.",
            "description": "Nobis in dignissimos dolores corporis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 22,
            "name": "Maxime provident aut qui.",
            "description": "Quo dicta molestias laboriosam laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 23,
            "name": "Unde asperiores porro vero omnis est nam.",
            "description": "Non saepe numquam rerum quibusdam qui et illo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 24,
            "name": "Sit omnis veritatis eos neque officiis quidem sint tempore.",
            "description": "Inventore quasi corporis rerum voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 25,
            "name": "Necessitatibus dignissimos corrupti perspiciatis aut delectus iusto perferendis.",
            "description": "Itaque quia est illum praesentium consequuntur aliquid voluptate.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 26,
            "name": "Fugiat architecto sint consectetur maxime.",
            "description": "Quisquam nesciunt iure eligendi ipsum et quod placeat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 27,
            "name": "Sit modi qui expedita.",
            "description": "Optio perspiciatis quod qui magni est.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 28,
            "name": "Voluptas ut non voluptatem non quia qui est.",
            "description": "Quia veniam fugit consectetur voluptatibus cumque animi est perferendis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 29,
            "name": "Ducimus aut incidunt eligendi sit.",
            "description": "Temporibus voluptas consequatur veritatis eligendi enim amet.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 30,
            "name": "Cumque suscipit magni in est eos vel.",
            "description": "Quidem incidunt officiis vel quae incidunt voluptas dolore.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 31,
            "name": "Necessitatibus eum est quas harum culpa.",
            "description": "Enim ut nam sit dolorum occaecati rerum aut.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 32,
            "name": "Quis est rerum fuga nemo.",
            "description": "Voluptatem est adipisci magnam inventore voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 33,
            "name": "Earum cumque rerum alias et.",
            "description": "Dolores consectetur dolorem voluptatem deserunt ipsa.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 34,
            "name": "Et tempore voluptates et.",
            "description": "Et dicta dolor est consequatur quis ut excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 35,
            "name": "Similique et dolorum similique ullam.",
            "description": "Voluptates sit explicabo quibusdam quo consequuntur tempore quia et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 36,
            "name": "Aut quia aliquam ut.",
            "description": "Et est iusto autem molestiae illo iusto quaerat.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 37,
            "name": "Dolor quod est aut.",
            "description": "Dolore voluptatem id amet molestiae placeat accusamus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 38,
            "name": "Nihil sapiente consequatur deserunt officia eaque.",
            "description": "Omnis assumenda nisi voluptate et et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 39,
            "name": "Qui quod reprehenderit et tempore non magnam.",
            "description": "Magnam reiciendis quis architecto est quidem voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 40,
            "name": "Consequatur ut ut quia est.",
            "description": "Odit totam dolores reprehenderit et voluptatem fuga.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 41,
            "name": "Eligendi assumenda sequi fugit praesentium tenetur.",
            "description": "Dolorum culpa dolores ad facere.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 42,
            "name": "Officiis sapiente rerum a porro ut omnis.",
            "description": "Corporis fuga rem animi dolorum animi quia rem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 43,
            "name": "Voluptatem perspiciatis sint ipsam et commodi voluptatem doloremque.",
            "description": "Sunt delectus nisi quidem autem esse blanditiis est hic.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 44,
            "name": "Esse consequatur enim quam magni sint.",
            "description": "Voluptatem perspiciatis nostrum omnis ullam aspernatur explicabo.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 45,
            "name": "Adipisci sed ipsum rerum ut itaque eaque quasi.",
            "description": "Quibusdam qui deserunt est porro et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 46,
            "name": "Ut veniam vel maxime nihil ut velit.",
            "description": "Totam maxime facilis eius id consequatur tenetur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 47,
            "name": "Esse minima aut assumenda officiis natus eaque delectus.",
            "description": "Eligendi in occaecati perferendis molestias nihil omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 48,
            "name": "Ad magnam reiciendis molestiae dolores excepturi nostrum.",
            "description": "Rerum quos cum enim esse.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 49,
            "name": "In aliquid ipsum omnis quasi itaque.",
            "description": "Necessitatibus deleniti nobis aliquam voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 50,
            "name": "Amet ratione in quo enim.",
            "description": "Enim reprehenderit saepe consequuntur sunt nihil optio.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 51,
            "name": "Dolorem est eum asperiores sequi et possimus eius.",
            "description": "Aut dicta non tenetur voluptatem consequatur nulla voluptatum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 52,
            "name": "Recusandae at optio aperiam nihil qui rerum cumque repellendus.",
            "description": "Aliquam nesciunt molestiae ex quidem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 53,
            "name": "Libero et et nisi doloribus alias repellendus sed.",
            "description": "Voluptate aperiam et eius labore maxime in.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 54,
            "name": "Enim similique et deleniti error nihil qui.",
            "description": "Molestias a magni cumque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 55,
            "name": "Adipisci doloremque quisquam in aliquam.",
            "description": "Rerum sint rerum sed iure vel ullam aliquid.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 56,
            "name": "Totam nisi dolorum dolorum vero fugiat rerum ratione.",
            "description": "Quas optio iste enim dignissimos.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 57,
            "name": "Illum nihil magni ut laborum est sunt.",
            "description": "Earum ducimus hic culpa autem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 58,
            "name": "Doloribus omnis officiis sunt qui laborum ratione molestiae.",
            "description": "Consequuntur et maxime consequatur ipsam in deserunt.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 59,
            "name": "Accusantium facilis sequi vero commodi officiis nesciunt consequatur quis.",
            "description": "Minus facilis delectus pariatur officiis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 60,
            "name": "Quisquam quia veritatis deserunt eveniet ex praesentium.",
            "description": "Voluptates qui asperiores perferendis.",
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
        "name": "Nihil velit dolorem aperiam numquam et et accusantium.",
        "description": "Natus dolor et voluptatum.",
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
            "name": "Doloremque enim id pariatur sed nostrum fugit atque deserunt.",
            "description": "Dolores quae minus et eos error modi aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Autem eos culpa sed et autem aliquam.",
            "description": "Esse enim quasi at est incidunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Autem consequatur qui eaque nihil voluptatem rerum quidem.",
            "description": "Explicabo doloremque dignissimos molestiae voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Dolorum libero repellat aut autem.",
            "description": "Enim occaecati eum est et explicabo aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Quia quibusdam quia odit sunt suscipit.",
            "description": "Dolorem eligendi totam autem explicabo quidem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Soluta hic qui sunt maxime quia ut.",
            "description": "Porro neque vitae sint et distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Sit sint enim possimus doloribus temporibus odit minus.",
            "description": "Expedita nulla itaque consequatur sunt sed quam et odit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Voluptatum occaecati voluptas ducimus perspiciatis id amet.",
            "description": "Est aut accusantium dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Dolor veniam eius quod cum eligendi impedit laudantium.",
            "description": "Sed ipsam voluptas illum aliquid placeat quibusdam porro.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Maxime est qui voluptatem quasi qui perspiciatis.",
            "description": "Recusandae aut cupiditate molestiae iusto officiis sunt quis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Minus nisi qui ut officiis qui nulla et.",
            "description": "Veritatis dicta magnam qui velit laboriosam est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Nam eos doloremque repellendus repellendus sunt.",
            "description": "Rem perspiciatis et et vel dolores magnam cumque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Magni impedit quam eligendi et.",
            "description": "Voluptas est non est culpa quaerat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Similique voluptas ex itaque ex illum ut.",
            "description": "Laudantium vel minus quae id praesentium.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Ea repudiandae qui fugit ipsa id ad.",
            "description": "Atque qui quia voluptates.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Est et delectus totam quia dolor consequuntur molestiae.",
            "description": "Delectus voluptate fugiat nostrum sed sunt reprehenderit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Non modi officiis quidem nesciunt officiis consequuntur impedit.",
            "description": "In vitae quis laboriosam quia quos laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Qui neque perspiciatis necessitatibus eos et non adipisci cupiditate.",
            "description": "Vitae enim amet at possimus est magnam ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Aliquam cupiditate sapiente at molestias nihil omnis voluptas.",
            "description": "Nobis est porro alias impedit inventore enim voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Culpa eum quae consequatur rerum qui omnis voluptas.",
            "description": "Labore velit eius natus odit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Impedit tempore et totam quisquam consequuntur autem aut aut.",
            "description": "Molestiae reprehenderit nam magnam porro mollitia voluptates temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Veritatis ut ab sequi natus.",
            "description": "Odit autem deleniti sint et adipisci.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Qui nostrum corrupti amet voluptatem necessitatibus quasi facere.",
            "description": "Neque ea illum repudiandae sequi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Ab est incidunt ut quibusdam tempore.",
            "description": "Recusandae repellendus id sit saepe.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Nisi laboriosam voluptatem reprehenderit est assumenda.",
            "description": "Est consectetur nostrum error quae provident.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Praesentium labore rem aliquam sint corrupti.",
            "description": "Occaecati blanditiis amet ad facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 27,
            "name": "Non aut aut iure dignissimos perspiciatis explicabo dignissimos.",
            "description": "Fugit qui consequatur officiis sapiente dolorem nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 28,
            "name": "Consequuntur ut voluptate dicta rerum quasi.",
            "description": "Modi in facere qui illo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 29,
            "name": "Repellendus non commodi enim qui aut dolore.",
            "description": "Fuga laborum nulla beatae ullam repellendus consequatur in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 30,
            "name": "Sunt enim voluptatibus asperiores.",
            "description": "Rerum est rerum rerum eum nulla.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 31,
            "name": "Rerum sapiente officiis maiores deleniti quam nobis qui et.",
            "description": "Sit debitis veniam aut assumenda et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 32,
            "name": "Laudantium facilis nihil fugiat dolorum et autem iste.",
            "description": "Sint sit dolore non soluta perferendis odio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 33,
            "name": "Dolorem placeat odio provident.",
            "description": "Cum et eveniet blanditiis non consectetur quidem atque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 34,
            "name": "Quidem quibusdam quos dolores tempore necessitatibus at totam.",
            "description": "Iste explicabo qui deleniti tempora voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 35,
            "name": "Beatae rerum quo error facere beatae qui.",
            "description": "Ut accusamus recusandae deleniti sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 36,
            "name": "Illum occaecati quis et soluta sit voluptatem.",
            "description": "Est aut soluta in aperiam harum iste voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 37,
            "name": "Debitis eaque non voluptate consequatur dolor cupiditate.",
            "description": "Aliquid reiciendis sint quis est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 38,
            "name": "Enim perspiciatis omnis culpa quos facilis sed eum rem.",
            "description": "Corrupti eveniet quod nostrum sint dolorem nulla.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 39,
            "name": "Ex nostrum architecto quia hic numquam doloribus accusamus.",
            "description": "Tempore distinctio quia praesentium voluptatibus quia eius totam et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 40,
            "name": "Enim quod reiciendis modi repudiandae ad.",
            "description": "Consequatur corporis aliquid voluptas et molestiae ducimus velit nam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 41,
            "name": "Est debitis voluptatem voluptatum omnis rem ut quia.",
            "description": "Commodi rerum ea voluptatum nihil quasi voluptatem cupiditate.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 42,
            "name": "Excepturi incidunt illum facilis et.",
            "description": "Quibusdam nulla dignissimos quo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 43,
            "name": "Quia odio veniam qui aperiam voluptas porro.",
            "description": "Velit illo libero molestiae quos.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 44,
            "name": "Et aliquid voluptatibus molestiae soluta hic delectus suscipit.",
            "description": "Libero nisi quo maiores rerum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 45,
            "name": "Excepturi ut minus quaerat fugiat placeat.",
            "description": "Non earum aut perferendis tenetur facilis dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 46,
            "name": "Molestiae maiores provident ad doloremque et.",
            "description": "Sint quisquam cumque cum illo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 47,
            "name": "Eligendi rerum sunt vel minus voluptas.",
            "description": "Quisquam velit voluptatem aut nisi labore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 48,
            "name": "At ex nesciunt natus et quam ut labore consequuntur.",
            "description": "Suscipit illum quis quaerat aperiam qui mollitia delectus et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 49,
            "name": "Assumenda sit repellendus quia eligendi eligendi sit.",
            "description": "Est officiis voluptatem rem dolor id nam et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 50,
            "name": "Doloremque animi nihil et quam repellendus optio.",
            "description": "Quae sed similique fuga sunt pariatur laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 51,
            "name": "Eveniet et inventore commodi vero praesentium laborum suscipit.",
            "description": "Nihil eius impedit et voluptate.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 52,
            "name": "Assumenda doloremque qui fugiat neque.",
            "description": "Minima dolorum dolorem autem vitae consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 53,
            "name": "Deserunt doloribus molestiae voluptas qui earum ipsa.",
            "description": "Ut est ut dolor et molestiae inventore sit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 54,
            "name": "Placeat expedita laudantium minus culpa totam dolores laborum.",
            "description": "Ipsam quae enim harum dolor vel iure.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 55,
            "name": "Corrupti ratione perferendis veritatis dolorem voluptatem nihil.",
            "description": "Officia nostrum ab autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 56,
            "name": "Voluptatum quaerat magni voluptatem est enim quaerat omnis.",
            "description": "Occaecati nemo quam temporibus sunt dicta assumenda consequatur aliquid.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 57,
            "name": "Est eaque quaerat eaque.",
            "description": "Et nulla et laborum repudiandae nihil dolorem non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 58,
            "name": "Et voluptas qui vel ut.",
            "description": "Doloribus laborum voluptatem non delectus iure excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 59,
            "name": "Dolorum et ducimus dolor ut cupiditate corrupti.",
            "description": "Tempora ad aut quibusdam sequi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 60,
            "name": "Distinctio numquam magnam sunt alias odit tenetur.",
            "description": "Quo vel sed non hic dicta.",
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
            "name": "Doloremque enim id pariatur sed nostrum fugit atque deserunt.",
            "description": "Dolores quae minus et eos error modi aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Autem eos culpa sed et autem aliquam.",
            "description": "Esse enim quasi at est incidunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Autem consequatur qui eaque nihil voluptatem rerum quidem.",
            "description": "Explicabo doloremque dignissimos molestiae voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Dolorum libero repellat aut autem.",
            "description": "Enim occaecati eum est et explicabo aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Quia quibusdam quia odit sunt suscipit.",
            "description": "Dolorem eligendi totam autem explicabo quidem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Soluta hic qui sunt maxime quia ut.",
            "description": "Porro neque vitae sint et distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Sit sint enim possimus doloribus temporibus odit minus.",
            "description": "Expedita nulla itaque consequatur sunt sed quam et odit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Voluptatum occaecati voluptas ducimus perspiciatis id amet.",
            "description": "Est aut accusantium dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Dolor veniam eius quod cum eligendi impedit laudantium.",
            "description": "Sed ipsam voluptas illum aliquid placeat quibusdam porro.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Maxime est qui voluptatem quasi qui perspiciatis.",
            "description": "Recusandae aut cupiditate molestiae iusto officiis sunt quis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Minus nisi qui ut officiis qui nulla et.",
            "description": "Veritatis dicta magnam qui velit laboriosam est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Nam eos doloremque repellendus repellendus sunt.",
            "description": "Rem perspiciatis et et vel dolores magnam cumque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Magni impedit quam eligendi et.",
            "description": "Voluptas est non est culpa quaerat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Similique voluptas ex itaque ex illum ut.",
            "description": "Laudantium vel minus quae id praesentium.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Ea repudiandae qui fugit ipsa id ad.",
            "description": "Atque qui quia voluptates.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Est et delectus totam quia dolor consequuntur molestiae.",
            "description": "Delectus voluptate fugiat nostrum sed sunt reprehenderit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Non modi officiis quidem nesciunt officiis consequuntur impedit.",
            "description": "In vitae quis laboriosam quia quos laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Qui neque perspiciatis necessitatibus eos et non adipisci cupiditate.",
            "description": "Vitae enim amet at possimus est magnam ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Aliquam cupiditate sapiente at molestias nihil omnis voluptas.",
            "description": "Nobis est porro alias impedit inventore enim voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Culpa eum quae consequatur rerum qui omnis voluptas.",
            "description": "Labore velit eius natus odit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Impedit tempore et totam quisquam consequuntur autem aut aut.",
            "description": "Molestiae reprehenderit nam magnam porro mollitia voluptates temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Veritatis ut ab sequi natus.",
            "description": "Odit autem deleniti sint et adipisci.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Qui nostrum corrupti amet voluptatem necessitatibus quasi facere.",
            "description": "Neque ea illum repudiandae sequi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Ab est incidunt ut quibusdam tempore.",
            "description": "Recusandae repellendus id sit saepe.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Nisi laboriosam voluptatem reprehenderit est assumenda.",
            "description": "Est consectetur nostrum error quae provident.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Praesentium labore rem aliquam sint corrupti.",
            "description": "Occaecati blanditiis amet ad facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 27,
            "name": "Non aut aut iure dignissimos perspiciatis explicabo dignissimos.",
            "description": "Fugit qui consequatur officiis sapiente dolorem nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 28,
            "name": "Consequuntur ut voluptate dicta rerum quasi.",
            "description": "Modi in facere qui illo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 29,
            "name": "Repellendus non commodi enim qui aut dolore.",
            "description": "Fuga laborum nulla beatae ullam repellendus consequatur in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 30,
            "name": "Sunt enim voluptatibus asperiores.",
            "description": "Rerum est rerum rerum eum nulla.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 31,
            "name": "Rerum sapiente officiis maiores deleniti quam nobis qui et.",
            "description": "Sit debitis veniam aut assumenda et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 32,
            "name": "Laudantium facilis nihil fugiat dolorum et autem iste.",
            "description": "Sint sit dolore non soluta perferendis odio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 33,
            "name": "Dolorem placeat odio provident.",
            "description": "Cum et eveniet blanditiis non consectetur quidem atque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 34,
            "name": "Quidem quibusdam quos dolores tempore necessitatibus at totam.",
            "description": "Iste explicabo qui deleniti tempora voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 35,
            "name": "Beatae rerum quo error facere beatae qui.",
            "description": "Ut accusamus recusandae deleniti sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 36,
            "name": "Illum occaecati quis et soluta sit voluptatem.",
            "description": "Est aut soluta in aperiam harum iste voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 37,
            "name": "Debitis eaque non voluptate consequatur dolor cupiditate.",
            "description": "Aliquid reiciendis sint quis est.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 38,
            "name": "Enim perspiciatis omnis culpa quos facilis sed eum rem.",
            "description": "Corrupti eveniet quod nostrum sint dolorem nulla.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 39,
            "name": "Ex nostrum architecto quia hic numquam doloribus accusamus.",
            "description": "Tempore distinctio quia praesentium voluptatibus quia eius totam et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 40,
            "name": "Enim quod reiciendis modi repudiandae ad.",
            "description": "Consequatur corporis aliquid voluptas et molestiae ducimus velit nam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 41,
            "name": "Est debitis voluptatem voluptatum omnis rem ut quia.",
            "description": "Commodi rerum ea voluptatum nihil quasi voluptatem cupiditate.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 42,
            "name": "Excepturi incidunt illum facilis et.",
            "description": "Quibusdam nulla dignissimos quo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 43,
            "name": "Quia odio veniam qui aperiam voluptas porro.",
            "description": "Velit illo libero molestiae quos.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 44,
            "name": "Et aliquid voluptatibus molestiae soluta hic delectus suscipit.",
            "description": "Libero nisi quo maiores rerum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 45,
            "name": "Excepturi ut minus quaerat fugiat placeat.",
            "description": "Non earum aut perferendis tenetur facilis dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 46,
            "name": "Molestiae maiores provident ad doloremque et.",
            "description": "Sint quisquam cumque cum illo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 47,
            "name": "Eligendi rerum sunt vel minus voluptas.",
            "description": "Quisquam velit voluptatem aut nisi labore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 48,
            "name": "At ex nesciunt natus et quam ut labore consequuntur.",
            "description": "Suscipit illum quis quaerat aperiam qui mollitia delectus et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 49,
            "name": "Assumenda sit repellendus quia eligendi eligendi sit.",
            "description": "Est officiis voluptatem rem dolor id nam et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 50,
            "name": "Doloremque animi nihil et quam repellendus optio.",
            "description": "Quae sed similique fuga sunt pariatur laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 51,
            "name": "Eveniet et inventore commodi vero praesentium laborum suscipit.",
            "description": "Nihil eius impedit et voluptate.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 52,
            "name": "Assumenda doloremque qui fugiat neque.",
            "description": "Minima dolorum dolorem autem vitae consequuntur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 53,
            "name": "Deserunt doloribus molestiae voluptas qui earum ipsa.",
            "description": "Ut est ut dolor et molestiae inventore sit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 54,
            "name": "Placeat expedita laudantium minus culpa totam dolores laborum.",
            "description": "Ipsam quae enim harum dolor vel iure.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 55,
            "name": "Corrupti ratione perferendis veritatis dolorem voluptatem nihil.",
            "description": "Officia nostrum ab autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 56,
            "name": "Voluptatum quaerat magni voluptatem est enim quaerat omnis.",
            "description": "Occaecati nemo quam temporibus sunt dicta assumenda consequatur aliquid.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 57,
            "name": "Est eaque quaerat eaque.",
            "description": "Et nulla et laborum repudiandae nihil dolorem non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 58,
            "name": "Et voluptas qui vel ut.",
            "description": "Doloribus laborum voluptatem non delectus iure excepturi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 59,
            "name": "Dolorum et ducimus dolor ut cupiditate corrupti.",
            "description": "Tempora ad aut quibusdam sequi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 60,
            "name": "Distinctio numquam magnam sunt alias odit tenetur.",
            "description": "Quo vel sed non hic dicta.",
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
            "name": "Similique quos optio tenetur vero qui.",
            "description": "Qui nihil distinctio aut cum eos nobis eos.",
            "image": "http:\/\/wajad.test\/\/tmp\/9df7a75ab1c3f7e9d7d098d13834cddf.jpg"
        },
        {
            "id": 2,
            "name": "Consectetur aliquam quasi illo vero doloremque et.",
            "description": "Minima dicta corporis similique et quod.",
            "image": "http:\/\/wajad.test\/\/tmp\/f11d59773e7ba983c8ee08c3997269e8.jpg"
        },
        {
            "id": 3,
            "name": "Laborum qui nemo provident est eaque vitae.",
            "description": "Quos quae dicta exercitationem in quia.",
            "image": "http:\/\/wajad.test\/\/tmp\/2f887f3750f9e062c374e3116c2b38b9.jpg"
        },
        {
            "id": 4,
            "name": "Provident odit aut molestiae est porro eum minima.",
            "description": "Rerum debitis eveniet ut quia assumenda.",
            "image": "http:\/\/wajad.test\/\/tmp\/9505eaedf5c2d4902f124db904a61eb2.jpg"
        },
        {
            "id": 5,
            "name": "Ea earum error tempore eos a.",
            "description": "Nihil incidunt eum et quidem consequatur suscipit ullam dicta.",
            "image": "http:\/\/wajad.test\/\/tmp\/d186d3d41415a692aa5b488924f860ad.jpg"
        },
        {
            "id": 6,
            "name": "Facilis quis ab qui in et perferendis.",
            "description": "Magni exercitationem magnam aut explicabo corrupti soluta.",
            "image": "http:\/\/wajad.test\/\/tmp\/a6b25b2f0692fa697aadf698b01b97e3.jpg"
        },
        {
            "id": 7,
            "name": "Consequuntur aut sequi aspernatur nisi nesciunt accusantium.",
            "description": "Repudiandae ipsum iste quia deserunt unde a.",
            "image": "http:\/\/wajad.test\/\/tmp\/18a0d1b3ff77662e2b77540abc54fe9b.jpg"
        },
        {
            "id": 8,
            "name": "Laudantium doloribus fuga tenetur natus.",
            "description": "Velit quibusdam veniam qui magnam.",
            "image": "http:\/\/wajad.test\/\/tmp\/5bbfe2062c662f06d1fb02ad4717adb4.jpg"
        },
        {
            "id": 9,
            "name": "Velit dolores omnis repudiandae odio et harum voluptatem voluptatibus.",
            "description": "Et quidem reprehenderit ipsum repudiandae reprehenderit.",
            "image": "http:\/\/wajad.test\/\/tmp\/d53bf7c2a66b765be6c9c3bae0dce469.jpg"
        },
        {
            "id": 10,
            "name": "Ullam odio similique earum aut et quos voluptatem.",
            "description": "Iusto magni nesciunt sit.",
            "image": "http:\/\/wajad.test\/\/tmp\/d2c94a2573bb28c12e0719c3cb3bc68e.jpg"
        },
        {
            "id": 11,
            "name": "Molestias commodi doloribus doloremque non.",
            "description": "Rerum rem quos dolor similique qui illum.",
            "image": "http:\/\/wajad.test\/\/tmp\/9557a1d90df4da3df19c43437a19e8de.jpg"
        },
        {
            "id": 12,
            "name": "Ut accusantium est sunt non magni debitis est.",
            "description": "Iure expedita enim laudantium eveniet et consequatur sed voluptatem.",
            "image": "http:\/\/wajad.test\/\/tmp\/f7b0dc8f3c931272c2f50fa6af52a106.jpg"
        },
        {
            "id": 13,
            "name": "Mollitia sit sit inventore dolor voluptatem ducimus qui impedit.",
            "description": "Exercitationem unde blanditiis possimus repellendus a.",
            "image": "http:\/\/wajad.test\/\/tmp\/f9a57cbbb78400aa38d60fa94759e009.jpg"
        },
        {
            "id": 14,
            "name": "Velit aut ut maxime enim deleniti.",
            "description": "Ut excepturi sint assumenda sapiente molestias ea.",
            "image": "http:\/\/wajad.test\/\/tmp\/548dec61287cb6dba5d0168266a9f5e7.jpg"
        },
        {
            "id": 15,
            "name": "Nesciunt ab ut amet quaerat non excepturi.",
            "description": "Doloremque inventore iusto enim omnis.",
            "image": "http:\/\/wajad.test\/\/tmp\/52691074506b1e12899dc0296209b8cc.jpg"
        },
        {
            "id": 16,
            "name": "Tenetur qui voluptate in dignissimos repellendus neque.",
            "description": "Natus accusantium laborum omnis quidem rerum minus.",
            "image": "http:\/\/wajad.test\/\/tmp\/421127189bbcc4df275a1e0f0dd25038.jpg"
        },
        {
            "id": 17,
            "name": "Exercitationem quia dignissimos aut et aut amet magnam.",
            "description": "Voluptatem magni ad qui ducimus.",
            "image": "http:\/\/wajad.test\/\/tmp\/87e58f0adb40fc3f7d7a7d5dcb8fa7f4.jpg"
        },
        {
            "id": 18,
            "name": "Non aut ullam temporibus beatae quasi velit et.",
            "description": "Nemo optio ut voluptates amet et voluptate quia.",
            "image": "http:\/\/wajad.test\/\/tmp\/9bb3e6f812d41200cb4086c152bb2f6e.jpg"
        },
        {
            "id": 19,
            "name": "Rem eos qui ut sint labore.",
            "description": "Rerum explicabo vel minus deleniti qui.",
            "image": "http:\/\/wajad.test\/\/tmp\/53d958648629c22a0b2b5812d5adafab.jpg"
        },
        {
            "id": 20,
            "name": "Molestiae est aut ut quasi itaque doloremque exercitationem.",
            "description": "Consequuntur ab qui possimus culpa non quo possimus.",
            "image": "http:\/\/wajad.test\/\/tmp\/f9e41e2d4df47732e07eada55ec7673a.jpg"
        },
        {
            "id": 21,
            "name": "Quas cupiditate sit sint.",
            "description": "Quasi nihil doloribus delectus blanditiis id illo ullam.",
            "image": "http:\/\/wajad.test\/\/tmp\/0770faf8cbdbfef3fe74838884879587.jpg"
        },
        {
            "id": 22,
            "name": "Incidunt quae eos voluptatibus dolorum quos magni saepe.",
            "description": "Odio expedita nulla est optio quia.",
            "image": "http:\/\/wajad.test\/\/tmp\/6da786d8097c83d164aedfb3d06892d9.jpg"
        },
        {
            "id": 23,
            "name": "Consequatur amet voluptas ipsa.",
            "description": "Distinctio enim dolorem ipsa qui veniam quasi nihil ipsum.",
            "image": "http:\/\/wajad.test\/\/tmp\/dfe7633267f4c2d8e607b0b64286182c.jpg"
        },
        {
            "id": 24,
            "name": "Reiciendis nulla quidem rerum numquam aliquam quae nam.",
            "description": "Fugiat quaerat illum et error non temporibus vel.",
            "image": "http:\/\/wajad.test\/\/tmp\/a50bfdf2a9da0ea792f92f8a9e743159.jpg"
        },
        {
            "id": 25,
            "name": "Blanditiis a eos quia enim ut.",
            "description": "Id delectus velit aperiam ex ducimus laudantium nemo.",
            "image": "http:\/\/wajad.test\/\/tmp\/4b3c30a79251ee5018f02153289cf4e7.jpg"
        },
        {
            "id": 26,
            "name": "Officia delectus iusto et fugit architecto est et voluptas.",
            "description": "Et incidunt asperiores expedita saepe quos fugiat.",
            "image": "http:\/\/wajad.test\/\/tmp\/3c9651d2eff53e55597a4a3a7fd64382.jpg"
        },
        {
            "id": 27,
            "name": "Odit suscipit corporis laboriosam sed.",
            "description": "Error culpa sed aperiam dolorem natus.",
            "image": "http:\/\/wajad.test\/\/tmp\/317d428f06cbe41b65935f71e5b41cff.jpg"
        },
        {
            "id": 28,
            "name": "Qui omnis eligendi eveniet ratione quia minima.",
            "description": "Et nam labore et nostrum quisquam nam.",
            "image": "http:\/\/wajad.test\/\/tmp\/9a979699cedbb0ade73314ad5e03f133.jpg"
        },
        {
            "id": 29,
            "name": "Et et accusamus iste quo.",
            "description": "Consequatur earum numquam sed aut.",
            "image": "http:\/\/wajad.test\/\/tmp\/30bf197b41004bb8e2d3cd1663997ee3.jpg"
        },
        {
            "id": 30,
            "name": "Veniam cum qui laborum est explicabo voluptatum.",
            "description": "Error molestiae rem dolorem optio.",
            "image": "http:\/\/wajad.test\/\/tmp\/9af8abc94d49e6b5d92fbfa9e5c4b284.jpg"
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
            "name": "Hic enim sint et ad consequuntur culpa id.",
            "description": "Molestias aut et illo quis fugiat velit consectetur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Minima autem est officiis ea.",
            "description": "Sint sunt natus at voluptatum aspernatur at.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Consequatur est in iure quod ipsum sed unde quam.",
            "description": "Qui quo et et libero doloremque et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Amet facilis voluptate consequatur.",
            "description": "Et dolore quo porro ex ipsa quia officiis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Et et aut doloribus fugit sit et quis.",
            "description": "Natus temporibus praesentium qui similique qui at ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Reiciendis soluta accusantium laudantium aperiam.",
            "description": "Magnam id quia ad aut voluptatum voluptatibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Quod ut perspiciatis rerum necessitatibus vel suscipit qui.",
            "description": "Sint et quos et nesciunt ipsam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Nam ut ut consequatur est.",
            "description": "Enim minima quaerat illum aliquid distinctio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Asperiores qui voluptate et sed quis.",
            "description": "Officia odit fuga et mollitia officia et provident.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Illo dolores soluta tempore quod veniam earum animi.",
            "description": "Labore sint et adipisci labore repudiandae est id.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Rerum reiciendis delectus quia rerum quae ipsa.",
            "description": "Ea et ratione est voluptas soluta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Id assumenda nemo est consequatur.",
            "description": "Quaerat voluptas numquam et aut laboriosam nesciunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Dolores assumenda aperiam nam maxime sunt est.",
            "description": "Dolorem earum reiciendis minus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Aut velit veritatis ut ipsum.",
            "description": "Cumque facilis reprehenderit quidem adipisci sed.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Qui voluptatum maiores similique amet accusamus vero non.",
            "description": "Numquam ad in incidunt quisquam et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Ut occaecati eum ab et assumenda.",
            "description": "Ea rerum culpa id.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Tempore suscipit voluptates quae dolor dolorem.",
            "description": "Et aut voluptates nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Aut eius velit omnis nam ipsa.",
            "description": "Nulla alias odit nihil unde dolor velit expedita.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Consequuntur veniam dolorem consequatur aut dolor est amet.",
            "description": "Id molestiae explicabo optio magni perspiciatis beatae doloremque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Nobis sit voluptas quia quia aperiam eligendi ea.",
            "description": "Et voluptatum incidunt quis cumque aspernatur in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Ratione ab nam facere.",
            "description": "Facilis error adipisci nihil eum est accusamus molestiae optio.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Dicta aliquid et itaque sunt cupiditate praesentium nihil a.",
            "description": "Voluptatem suscipit ut qui quos.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Aliquid labore qui non illum.",
            "description": "Eligendi praesentium inventore tenetur officia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Sed at cumque reiciendis fugiat.",
            "description": "Itaque quos occaecati eligendi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Omnis nulla ut modi modi repellat et nesciunt.",
            "description": "Ducimus ut quia odit vitae voluptas quo dolores dicta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Vel veritatis voluptatum et nemo repellendus quaerat et.",
            "description": "Voluptatibus natus quo ad.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 27,
            "name": "Voluptatem rerum id repudiandae omnis corrupti.",
            "description": "Omnis sapiente soluta fugit est occaecati mollitia nisi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 28,
            "name": "Eligendi repudiandae architecto ratione mollitia quos.",
            "description": "Odit dolore tempora ducimus nihil et accusantium.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 29,
            "name": "Quam vero repudiandae voluptas itaque.",
            "description": "Vitae repellat doloribus nam consectetur voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 30,
            "name": "Voluptatem non nostrum dolores rerum.",
            "description": "Consequatur suscipit voluptate culpa ut.",
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
            "name": "Hic enim sint et ad consequuntur culpa id.",
            "description": "Molestias aut et illo quis fugiat velit consectetur.",
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
    "data": []
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


> Example response (404):

```json
{
    "message": "No query results for model [App\\Color] 1"
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
            "name": "Maxime neque ipsum nulla mollitia fugit.",
            "details": "Ea dolores quia ratione ullam minus. Nisi omnis magnam in ullam non aut. Enim iure dolorum labore enim delectus. Perferendis vero est deserunt sunt. Mollitia voluptate qui animi perferendis eum. Necessitatibus velit labore distinctio. Dolore harum dolorem praesentium ex in. Eveniet sint aut aliquid optio. Iusto vero officia quia quo dicta. At delectus nobis dolor velit ullam possimus. Porro ipsam et sed accusamus. Laborum exercitationem consequatur aut qui et provident. Ut aut dolores occaecati fuga. Delectus ullam quam nemo in voluptatem repellendus amet laborum. Enim accusantium odio possimus repudiandae doloremque quos. Qui debitis modi dolorem voluptatibus impedit nostrum eum. Aut voluptatum architecto adipisci dolores. Aliquam optio expedita aut. Nisi voluptatum unde ea sapiente enim maxime aliquid.",
            "address": "Hic odio eius ut consequatur distinctio quia voluptatem. Quia odio fugit qui earum et. Vel eum est est. Nihil vel consequuntur corporis neque exercitationem.",
            "image": "default.png",
            "latitude": 29.042175,
            "longitude": -20.813012,
            "status": 1
        },
        {
            "id": 2,
            "name": "Voluptatem maxime aliquid reprehenderit.",
            "details": "Rem dolores in in tempore asperiores ipsum. Magnam ab porro ducimus fugit delectus laudantium iusto. Delectus asperiores et rerum explicabo pariatur doloremque voluptatibus voluptates. Molestiae animi dolore repudiandae. Aliquam eius voluptatum aliquam unde ut recusandae rerum. Cumque libero vero qui ab enim. Magnam quae quae et sunt placeat. Autem blanditiis dolor et nihil. Veniam maxime qui alias nam. Eum facere mollitia totam atque dolorem a. Molestiae est necessitatibus sit eveniet. Esse est omnis ut maiores ex labore. Voluptatum corrupti repellat quia qui rerum expedita. Nostrum quasi et est in magnam assumenda quasi. Eum possimus voluptas quia delectus est aut. Alias minima provident repudiandae quia. Non cumque est et eum neque tempora vel.",
            "address": "Officia velit reiciendis distinctio officia possimus. Tempore tenetur rerum quisquam sequi. Necessitatibus in et aut amet impedit qui.",
            "image": "default.png",
            "latitude": 58.410228,
            "longitude": -147.463923,
            "status": 1
        },
        {
            "id": 3,
            "name": "Non consequatur modi fugit deleniti.",
            "details": "Placeat reiciendis quia recusandae consequatur mollitia at voluptatibus. Animi saepe atque quaerat perferendis quaerat. Excepturi nihil consequatur natus eum harum tenetur doloribus. Nisi fuga nostrum qui est ut omnis asperiores. Laboriosam nihil voluptate minima consectetur magni. Dolores deleniti ut qui minus atque optio ut. Perspiciatis ullam quia expedita. Facilis vero sit delectus eveniet nihil. Eos sequi quaerat aut aut est vel nihil. Sed sed omnis non nesciunt ab illo. Aut dolor consequatur recusandae quibusdam sit laboriosam architecto fuga. Assumenda doloribus veniam dolorum est beatae. Aut dolor mollitia est iure deleniti voluptates. Aperiam libero quis ut blanditiis eos illo aut. Ducimus et debitis est animi aspernatur necessitatibus qui. Voluptatem consectetur vitae expedita mollitia eum et mollitia. Id alias aut et nesciunt et porro.",
            "address": "Eos amet modi et. Voluptas itaque aut veniam aliquid. Odit asperiores corporis consequatur commodi repudiandae et ullam soluta.",
            "image": "default.png",
            "latitude": 1.565126,
            "longitude": -72.467382,
            "status": 1
        },
        {
            "id": 4,
            "name": "Accusantium suscipit mollitia ratione voluptatibus soluta aperiam est.",
            "details": "Soluta voluptate aperiam voluptatem dolor. Deleniti fuga fugiat consequatur impedit. Quos quisquam quia omnis enim quibusdam. Aut ut quam quas fuga temporibus. Eum sed illo corporis quis. Nulla est voluptatum quod explicabo qui corporis veniam. Ut aliquam voluptatem ut omnis et. Similique voluptatibus eveniet dolor incidunt velit ut voluptatibus optio. Omnis quos est optio accusantium. Doloribus officiis temporibus quidem hic. Dolor voluptas minus sint quia minima sint harum. Sed repellendus sint qui sed in corporis corrupti. Et est aut neque et optio hic. Corrupti aspernatur tenetur porro quaerat. Voluptatem amet nemo sed ipsam perspiciatis. Cumque praesentium est sit optio. Nostrum possimus vel sequi. Assumenda numquam exercitationem nulla sapiente.",
            "address": "Ratione ut eius non impedit blanditiis itaque nisi. Quia amet illo pariatur. Suscipit adipisci rem qui perspiciatis est quae voluptas. Hic ullam quo quo quasi quidem illo optio.",
            "image": "default.png",
            "latitude": 88.891035,
            "longitude": -119.519649,
            "status": 1
        },
        {
            "id": 5,
            "name": "Perferendis temporibus veritatis deleniti doloribus repellat.",
            "details": "Repudiandae asperiores fugit et aut iure. Aspernatur inventore dolores omnis delectus perspiciatis qui. Nemo numquam ea rem harum totam sed. Fugit vel nam sed. Quia quia qui explicabo. Voluptates libero aut rem. Similique quibusdam laborum excepturi incidunt ad ea nemo architecto. Dolor eaque porro unde tempore recusandae assumenda. Sint omnis ipsum voluptate magnam corporis distinctio. Enim libero sint voluptatem ullam. Autem in blanditiis aut cumque nesciunt labore ut. Blanditiis et omnis assumenda praesentium sed consequuntur aliquam. Fugiat numquam aspernatur numquam dignissimos sit. Voluptatem sint cupiditate totam qui odio accusantium nulla. Ab aut quidem quas sint quae. Iste quia sint aut distinctio qui qui. Ut omnis aperiam velit commodi suscipit nostrum architecto. Consectetur et ut ducimus eligendi nesciunt. Modi et error ea eos.",
            "address": "Accusamus enim at iure dolore ex. Quo et suscipit error aliquam. Veniam sit in vel sit.",
            "image": "default.png",
            "latitude": -2.265717,
            "longitude": -170.156675,
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

<!-- START_0ee5bf7a76203366c8ac325bd8ada596 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/mario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/mario"
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
`GET api/mario`


<!-- END_0ee5bf7a76203366c8ac325bd8ada596 -->


