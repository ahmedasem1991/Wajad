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
    "http://api.wajad.test/api/refreshToken?Old=aliquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "aliquam",
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
    -G "http://api.wajad.test/api/home/posts/eveniet/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/home/posts/eveniet/1"
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
            "id": 1,
            "title": "Eos laboriosam saepe placeat voluptas rerum alias maxime aliquam.",
            "approval_status": 1,
            "reward": 0,
            "description": "Minus tempore laboriosam nesciunt consectetur ullam mollitia labore praesentium. Temporibus animi veritatis autem ut nulla et. Aspernatur quos est eum veniam aut excepturi. Dicta sed velit sed nobis. Beatae dolorem consequatur dolorem. Consequatur quis voluptatem et quo voluptatem et. Ea quibusdam sed est a ab quidem quo recusandae. Beatae et et exercitationem ut. Omnis dicta dolores exercitationem dolor corrupti sequi cupiditate. Vel qui ipsum illo nemo. Inventore molestiae error placeat laudantium. Laudantium quaerat et deserunt officia delectus rerum sint repellat. Sit eos nisi minima esse quas. Consequuntur expedita reprehenderit ipsum nihil dicta. Maxime nisi culpa vero non excepturi nihil. Vel est nam quibusdam. Quidem autem tempora animi iste. Incidunt sit molestiae aut in consequatur est sapiente corrupti. Rem est nesciunt velit dolores odio consequatur aut.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 1,
                "name": "opjmp",
                "description": "jmiojoi",
                "image": "http:\/\/wajad.test\/images\/default.png"
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
            "date": "2019-12-04 18:49:46",
            "images": [],
            "questions": [],
            "city": null
        },
        {
            "id": 2,
            "title": "Id consequatur et tenetur dolorum eveniet occaecati.",
            "approval_status": 1,
            "reward": 0,
            "description": "Et quia molestiae voluptate veniam quia. Ducimus aut ipsam aut id quisquam nulla aut. A dolorum praesentium quo incidunt natus omnis. Animi dicta aut qui iure expedita. Dolores asperiores sed sint quia. Aspernatur veritatis non in exercitationem accusantium. Exercitationem eligendi et autem. Quibusdam quas ducimus atque quidem nobis nam. Eum cumque molestiae vero facilis odit quibusdam. Eveniet porro dolorem architecto esse amet in. Odio et nobis laborum. Delectus rerum a quam veritatis quaerat voluptates. Quis deserunt saepe asperiores. Dolore aut dolores voluptas sed quasi neque non. Ipsam ullam tenetur alias dolorem quibusdam ipsum. Sed doloribus fugit rem soluta ea facilis aut.",
            "status": "found",
            "attached_to_item": false,
            "item": null,
            "subCategory": {
                "id": 1,
                "name": "opjmp",
                "description": "jmiojoi",
                "image": "http:\/\/wajad.test\/images\/default.png"
            },
            "model": {
                "id": 3,
                "name": "Consectetur amet consequatur nulla numquam voluptatem earum.",
                "description": "Temporibus omnis a corrupti.",
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
                "id": 1,
                "name": "opjmp",
                "description": "jmiojoi",
                "image": "http:\/\/wajad.test\/images\/default.png"
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
    -d '{"title":"explicabo","details":"a","color_id":"et","brand_id":"sed","model_id":"velit","sub_category_id":"consequatur"}'

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
    "title": "explicabo",
    "details": "a",
    "color_id": "et",
    "brand_id": "sed",
    "model_id": "velit",
    "sub_category_id": "consequatur"
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
    -d '{"details":"quo","image":"officiis"}'

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
    "details": "quo",
    "image": "officiis"
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
    "data": {
        "id": 1,
        "title": "asdasdasdasd",
        "approval_status": 1,
        "reward": 1111,
        "description": "asdasdasdasdasdasd",
        "status": "lost",
        "attached_to_item": true,
        "item": {
            "id": 1,
            "title": "mnbmn",
            "details": "mnbmnb",
            "status": "found",
            "owner": {
                "id": 1,
                "name": "Tarek Solaiman",
                "email": "tareksolaiman89@gmail.com",
                "status": 1,
                "mobile_number": "01063044180",
                "receive_emails": false,
                "receive_push_notifications": false,
                "is_email_verified": true,
                "is_mobile_number_verified": false,
                "default_distance_unit": "kilo"
            },
            "model": {
                "id": 1,
                "name": "nbnmbv",
                "description": "bvnbv",
                "image": "http:\/\/wajad.test\/images\/default.png"
            },
            "color": {
                "id": 1,
                "name": "sdfsf",
                "icon": "mnb"
            },
            "brand": null,
            "date": "2019-12-04 17:26:41",
            "images": []
        },
        "subCategory": {
            "id": 1,
            "name": "en",
            "description": "sdas",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        "model": {
            "id": 1,
            "name": "nbnmbv",
            "description": "bvnbv",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        "color": {
            "id": 1,
            "name": "sdfsf",
            "icon": "mnb"
        },
        "date": "2019-12-04 18:48:30",
        "images": [],
        "questions": [],
        "city": {
            "id": 1,
            "name": "cairo"
        }
    }
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
    -d '{"title":"voluptatem","description":"totam","reward":"consequatur","longitude":"architecto","latitude":"nam","sub_category_id":1,"brand_id":10,"model_id":20,"color_id":8,"item_id":5,"city":"unde","images":["vel"],"questions":["beatae"]}'

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
    "title": "voluptatem",
    "description": "totam",
    "reward": "consequatur",
    "longitude": "architecto",
    "latitude": "nam",
    "sub_category_id": 1,
    "brand_id": 10,
    "model_id": 20,
    "color_id": 8,
    "item_id": 5,
    "city": "unde",
    "images": [
        "vel"
    ],
    "questions": [
        "beatae"
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
        `reward` | numeric |  optional  | 
        `longitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `latitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `sub_category_id` | integer |  required  | exists:sub_categories,id
        `brand_id` | integer |  required  | exists:brands,id
        `model_id` | integer |  required  | exists:models,id
        `color_id` | integer |  required  | exists:colors,id
        `item_id` | integer |  optional  | nullable exists:items,id
        `city` | string |  required  | 
        `images` | array |  optional  | sometimes size:5
        `images.*` | image |  optional  | sometimes mimes:jpeg,jpg,png,gif max:5012
        `questions` | array |  optional  | sometimes size:3
        `questions.*` | required |  optional  | min:9 max:500
    
<!-- END_f01269a1d8321c0c8787967b5346c585 -->

<!-- START_753caa181befa10f8d0e0f5ca0e5b46f -->
## Update Post

> Example request:

```bash
curl -X PUT \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"iure","description":"sed","status":"voluptatem","reward":"sit","longitude":"facere","latitude":"in","sub_category_id":9,"brand_id":19,"model_id":6,"color_id":14,"item_id":14,"city":"soluta","images":["similique"],"questions":["dolorem"]}'

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
    "title": "iure",
    "description": "sed",
    "status": "voluptatem",
    "reward": "sit",
    "longitude": "facere",
    "latitude": "in",
    "sub_category_id": 9,
    "brand_id": 19,
    "model_id": 6,
    "color_id": 14,
    "item_id": 14,
    "city": "soluta",
    "images": [
        "similique"
    ],
    "questions": [
        "dolorem"
    ]
}

fetch(url, {
    method: "PUT",
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
`PUT api/posts/{post}`

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
        `reward` | numeric |  optional  | 
        `longitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `latitude` | regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/ |  required  | 
        `sub_category_id` | integer |  required  | exists:sub_categories,id
        `brand_id` | integer |  required  | exists:brands,id
        `model_id` | integer |  required  | exists:models,id
        `color_id` | integer |  required  | exists:colors,id
        `item_id` | integer |  optional  | nullable exists:items,id
        `city` | string |  required  | 
        `images` | array |  optional  | sometimes size:5
        `images.*` | image |  optional  | sometimes mimes:jpeg,jpg,png,gif max:5012
        `questions` | array |  optional  | sometimes size:3
        `questions.*` | required |  optional  | min:9 max:500
    
<!-- END_753caa181befa10f8d0e0f5ca0e5b46f -->

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

#Search


<!-- START_9d08a4da7d839136b63a8291497ec010 -->
## Search Filter

> Example request:

```bash
curl -X GET \
    -G "http://api.wajad.test/api/home/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"model":17,"color":13,"brand":20,"subcategory":6,"date":"rerum"}'

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
    "model": 17,
    "color": 13,
    "brand": 20,
    "subcategory": 6,
    "date": "rerum"
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
    -d '{"keywords":"enim"}'

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
    "keywords": "enim"
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
    `name` | string |  required  | min:6,max:255 1 or 0.
        `receive_emails` | boolean |  required  | 1 or 0.
        `receive_push_notifications` | boolean |  required  | 1 or 0.
        `default_distance_unit` | string,in:kilo,mile |  required  | kilo or mile.
    
<!-- END_72a884b85bf7bf4198984d6ccecce2b7 -->

<!-- START_dd73fe89d9872ce37d284636141ae526 -->
## Password Reset

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/changePassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"old_password":"sunt","new_password":"ab","new_password_confirmation":"maiores"}'

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
    "old_password": "sunt",
    "new_password": "ab",
    "new_password_confirmation": "maiores"
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
    -d '{"mobile_number":"adipisci"}'

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
    "mobile_number": "adipisci"
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
            "name": "joij",
            "description": "oij",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 2,
            "name": "Ratione repudiandae nam quis tenetur velit et.",
            "description": "Quo quam et id deleniti quisquam nulla omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 3,
            "name": "Et labore iste placeat recusandae dolorem eaque.",
            "description": "Error dignissimos magnam vero.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 4,
            "name": "Sed aut debitis voluptatem perspiciatis voluptatem ut tempore.",
            "description": "Quod ullam ut aliquid aperiam facere molestiae libero aut.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 5,
            "name": "Eum ut aut pariatur laboriosam dolor natus ut.",
            "description": "Minus laudantium recusandae quibusdam voluptate quia temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 6,
            "name": "At ut voluptas incidunt quos voluptatum dolor.",
            "description": "Libero consequatur autem provident.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 7,
            "name": "Incidunt ex quis unde veritatis quos quis.",
            "description": "In voluptas et assumenda nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 8,
            "name": "Odit quia est et.",
            "description": "Doloremque eum qui nisi dicta non.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 9,
            "name": "Hic expedita nihil dolorem.",
            "description": "Aperiam magni excepturi iure enim deleniti sed dicta.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 10,
            "name": "Cumque id iusto cumque similique et numquam modi sit.",
            "description": "Placeat libero dolorem nobis dolor eum illo labore quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 11,
            "name": "Cumque at sit voluptatibus.",
            "description": "Veniam quam fugit alias.",
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
        "name": "joij",
        "description": "oij",
        "image": "http:\/\/wajad.test\/images\/default.png",
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
            "name": "opjmp",
            "description": "jmiojoi",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 2,
            "name": "Esse totam quis excepturi rerum.",
            "description": "Non quia recusandae quas eos eos aspernatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Nesciunt est temporibus amet culpa qui rerum.",
            "description": "Sit sequi eum consequatur porro quis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Dolorum ut et nulla veritatis repellat.",
            "description": "Illum ut nobis ab iste.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Possimus quaerat accusamus eum nisi.",
            "description": "Omnis asperiores sed quas quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Et expedita est explicabo qui sit veritatis.",
            "description": "Dolore rerum quo quis explicabo magni occaecati.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Ipsam impedit ea et temporibus rerum.",
            "description": "Eos iure ut repudiandae temporibus qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
            "description": "Aut soluta laborum sequi et similique.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Sunt aliquid rerum nostrum.",
            "description": "Non quia quasi quis error magni quia harum molestiae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Debitis sequi dolor omnis excepturi eos voluptatibus et.",
            "description": "Quis est temporibus temporibus explicabo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Ducimus alias repudiandae cumque et debitis qui sed.",
            "description": "Et consequatur autem temporibus possimus amet doloremque omnis.",
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
            "name": "opjmp",
            "description": "jmiojoi",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 2,
            "name": "Esse totam quis excepturi rerum.",
            "description": "Non quia recusandae quas eos eos aspernatur.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Nesciunt est temporibus amet culpa qui rerum.",
            "description": "Sit sequi eum consequatur porro quis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Dolorum ut et nulla veritatis repellat.",
            "description": "Illum ut nobis ab iste.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Possimus quaerat accusamus eum nisi.",
            "description": "Omnis asperiores sed quas quia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Et expedita est explicabo qui sit veritatis.",
            "description": "Dolore rerum quo quis explicabo magni occaecati.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Ipsam impedit ea et temporibus rerum.",
            "description": "Eos iure ut repudiandae temporibus qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Qui maiores aut sapiente aut molestiae in quam ipsam.",
            "description": "Aut soluta laborum sequi et similique.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Sunt aliquid rerum nostrum.",
            "description": "Non quia quasi quis error magni quia harum molestiae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Debitis sequi dolor omnis excepturi eos voluptatibus et.",
            "description": "Quis est temporibus temporibus explicabo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Ducimus alias repudiandae cumque et debitis qui sed.",
            "description": "Et consequatur autem temporibus possimus amet doloremque omnis.",
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
            "name": "pojmop",
            "description": "ijoi",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 2,
            "name": "Vel unde est earum ducimus.",
            "description": "Omnis eum sit asperiores rerum qui exercitationem rerum.",
            "image": "http:\/\/wajad.test\/\/tmp\/82e999b98af385b87887f764e61fca08.jpg"
        },
        {
            "id": 3,
            "name": "Voluptatum quaerat eum sit sit omnis.",
            "description": "Totam autem ut minima quia sed aut.",
            "image": "http:\/\/wajad.test\/\/tmp\/49d8adef390d42823871cf0898ebb10d.jpg"
        },
        {
            "id": 4,
            "name": "Et nulla rerum doloremque nisi.",
            "description": "Ratione eius voluptatum quaerat nemo vitae assumenda rerum tempore.",
            "image": "http:\/\/wajad.test\/\/tmp\/54248cb6ea95eb54010af8bd1efa1e66.jpg"
        },
        {
            "id": 5,
            "name": "Non amet officiis quasi vel.",
            "description": "Quia non similique placeat incidunt.",
            "image": "http:\/\/wajad.test\/\/tmp\/de5ddd01ccc2cfe8545b88068f1d3f29.jpg"
        },
        {
            "id": 6,
            "name": "Non consequuntur est quidem facilis.",
            "description": "Maiores et ut est ut sequi recusandae.",
            "image": "http:\/\/wajad.test\/\/tmp\/cd4b302a6e4fc94a11d9a8e11d2822a9.jpg"
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
            "name": "jhinoi",
            "description": "pjipo",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 2,
            "name": "Mollitia id et cumque dicta amet qui.",
            "description": "Voluptatem dicta sapiente corporis ab velit occaecati quibusdam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Consectetur amet consequatur nulla numquam voluptatem earum.",
            "description": "Temporibus omnis a corrupti.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Deleniti quis et ut sapiente dolores sunt.",
            "description": "Sapiente quaerat et in suscipit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Id fugit corporis harum expedita.",
            "description": "Fugiat nesciunt quasi sequi autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Eligendi vero non modi sit voluptatem.",
            "description": "Vitae maiores a rerum cum.",
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
            "name": "jhinoi",
            "description": "pjipo",
            "image": "http:\/\/wajad.test\/images\/default.png"
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
            "name": "Eum quibusdam quia facilis ducimus et inventore blanditiis.",
            "details": "Quia dolores rem reiciendis. Quisquam est quasi velit. Quidem deserunt cum sapiente nihil inventore. Magnam distinctio omnis temporibus non aspernatur quod. Voluptate at ratione iste molestiae excepturi aliquid. Autem eaque explicabo aut consectetur. Ad nulla accusamus soluta exercitationem beatae. Quaerat doloremque quas ea molestias cumque et. Sit magni quis animi ut dolor. Aut ut fugiat et.",
            "address": "Autem asperiores nihil aut doloremque. Iste quaerat eos omnis nemo ut. Rerum magnam aut laborum. Cum molestiae eos vero et doloremque ducimus.",
            "image": "default.png",
            "latitude": 0.892492,
            "longitude": -91.652633,
            "status": 1
        },
        {
            "id": 2,
            "name": "Dignissimos assumenda culpa quidem.",
            "details": "Id quisquam autem provident cumque repellat voluptates quis. Nisi et inventore qui et voluptas saepe doloremque. Id modi quos consequatur ad rem soluta. Alias corrupti ut est rerum praesentium. Provident ut ut assumenda et sit adipisci minima. Ut natus pariatur asperiores. Et expedita aliquam unde deleniti dignissimos libero iste. Sunt quos et quo error. Labore distinctio voluptatum enim rerum facere aut officia. Accusantium aliquam rerum qui aut fuga. Molestias et inventore blanditiis. Quo et perferendis molestiae consequuntur quam. Officia rem quia corrupti officiis vel voluptatum. Magni voluptate voluptatem voluptatem totam nulla rerum eum accusantium. Dolore repellat qui dolorem. Dolorem doloribus explicabo aut numquam pariatur. Tempore ea neque qui qui. Quia perspiciatis in eaque non illum iste. Fugiat animi rerum voluptatem architecto facere similique ipsam. Dolor ratione impedit quisquam eum magni non distinctio.",
            "address": "Omnis incidunt ut soluta laborum a. Tempore doloremque tempora et ut. Ut quas doloremque perferendis sapiente delectus.",
            "image": "default.png",
            "latitude": -13.007986,
            "longitude": 131.913627,
            "status": 1
        },
        {
            "id": 3,
            "name": "Eos rerum illo ut odio.",
            "details": "Labore voluptatem facilis sint voluptas hic omnis sunt. Minima dolores ducimus repellat sint fuga velit reiciendis facilis. Nihil voluptas aut ex qui amet amet laboriosam. Delectus et non nemo quia exercitationem eaque natus dolor. Dolores corporis et ipsam amet perferendis omnis vel. Quia nisi possimus nostrum id. Et unde itaque consectetur qui ea eveniet. Consectetur qui est laborum voluptas reiciendis eum qui soluta. Dolor praesentium omnis enim voluptas ex corporis. Praesentium atque dolor architecto incidunt sit voluptatem velit cupiditate. Voluptate aut et ducimus dolorem rerum. Perspiciatis et magnam facilis temporibus. Rerum ducimus ex dicta pariatur et voluptatem inventore. Et sit omnis est. Quia excepturi debitis non harum nemo. Harum delectus exercitationem ut quis.",
            "address": "Ut aspernatur fugit eum. Unde rerum voluptas eos asperiores occaecati hic. Iusto minus consequatur repellat autem sunt sit.",
            "image": "default.png",
            "latitude": 86.694979,
            "longitude": 141.418471,
            "status": 1
        },
        {
            "id": 4,
            "name": "Provident necessitatibus et voluptates nihil nostrum cumque aut quia.",
            "details": "Consectetur enim laboriosam quasi sit ducimus dignissimos minus. Eum sint perspiciatis dicta repellendus rerum ipsa quam placeat. Rerum debitis id magni et architecto. Vero ea et quia officia. Deserunt sunt aspernatur voluptatem tenetur vel. Sint quia doloribus corporis modi. Debitis sed animi quas similique voluptates ut. Accusamus magnam veniam amet assumenda praesentium assumenda. Sint blanditiis sed et ullam molestias qui. Eos voluptate laudantium natus nesciunt ut aut voluptates. Nesciunt ut et aut beatae voluptas itaque rerum. Eum aut accusantium voluptate. Ut iste voluptatem vero sunt blanditiis. Reiciendis saepe ut nihil quibusdam. Cum quas quaerat fugit consectetur consequuntur. Officia illo dicta et corporis possimus consequuntur et. Sint quia minus et omnis esse architecto. Ipsum vero blanditiis autem dolorem tempore. Corporis non ut a pariatur ipsum corrupti. Libero quam rerum ipsa sunt. Ad dolorum odit ipsum dignissimos ullam eos sint dolore.",
            "address": "Possimus provident non nulla. Qui aspernatur minima adipisci cum. Fuga dolorum omnis hic reprehenderit. Accusantium velit odio porro.",
            "image": "default.png",
            "latitude": 10.472456,
            "longitude": -177.65974,
            "status": 1
        },
        {
            "id": 5,
            "name": "Ea consequatur ut ea rem ipsam ullam.",
            "details": "Asperiores reiciendis quia vel quae optio eligendi architecto. Omnis voluptatem sint doloribus corporis rerum eaque tenetur est. Tempore voluptates iste ex est voluptatem maxime nesciunt et. Adipisci ut occaecati quia placeat. Voluptas sequi et explicabo qui et rerum aut. Quis optio temporibus ipsa voluptatem perspiciatis. Debitis commodi aut perferendis atque. Facilis incidunt recusandae adipisci repudiandae repellat quis iste. Consequuntur et aut suscipit delectus quo modi. Accusamus aperiam nihil dolores voluptas. Dolores quo facilis praesentium numquam. Quo mollitia asperiores quia minima autem voluptatibus velit dignissimos. Commodi vero incidunt doloremque ab. Eius aliquid quia nemo provident nam. Et voluptas aut quis. Ducimus perferendis neque quia molestiae rerum ratione. Minus hic est eius voluptatum voluptate. Ipsa sunt iure repellendus sed nihil quia. Illum et eos et et iusto vero.",
            "address": "Quaerat et recusandae voluptas. Iure quae libero et laudantium animi accusantium fugiat. Vero eos sapiente magnam in nemo omnis. Dolor repellendus qui voluptates libero est ab est tempore.",
            "image": "default.png",
            "latitude": 13.867851,
            "longitude": 89.760179,
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


