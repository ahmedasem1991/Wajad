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
    "http://api.wajad.test/api/refreshToken?Old=voluptates" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "voluptates",
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
    -d '{"title":"dolor","details":"animi","color_id":"explicabo","brand_id":"esse","model_id":"ad","sub_category_id":"nobis"}'

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
    "title": "dolor",
    "details": "animi",
    "color_id": "explicabo",
    "brand_id": "esse",
    "model_id": "ad",
    "sub_category_id": "nobis"
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
    -d '{"details":"unde","image":"eum"}'

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
    "details": "unde",
    "image": "eum"
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
    `id` |  optional  | int required

<!-- END_726b7bf93b3209836a1cbcda5b3b6703 -->

<!-- START_f01269a1d8321c0c8787967b5346c585 -->
## Create Post

> Example request:

```bash
curl -X POST \
    "http://api.wajad.test/api/posts/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"quibusdam","description":"iste","reward":"qui","longitude":"sint","latitude":"tenetur","sub_category_id":3,"brand_id":20,"model_id":2,"color_id":14,"item_id":8,"city":"fuga","images":["atque"],"questions":["non"]}'

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
    "title": "quibusdam",
    "description": "iste",
    "reward": "qui",
    "longitude": "sint",
    "latitude": "tenetur",
    "sub_category_id": 3,
    "brand_id": 20,
    "model_id": 2,
    "color_id": 14,
    "item_id": 8,
    "city": "fuga",
    "images": [
        "atque"
    ],
    "questions": [
        "non"
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
    -d '{"title":"error","description":"aut","status":"quis","reward":"non","longitude":"ex","latitude":"ipsum","sub_category_id":19,"brand_id":9,"model_id":13,"color_id":11,"item_id":8,"city":"nihil","images":["voluptas"],"questions":["esse"]}'

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
    "title": "error",
    "description": "aut",
    "status": "quis",
    "reward": "non",
    "longitude": "ex",
    "latitude": "ipsum",
    "sub_category_id": 19,
    "brand_id": 9,
    "model_id": 13,
    "color_id": 11,
    "item_id": 8,
    "city": "nihil",
    "images": [
        "voluptas"
    ],
    "questions": [
        "esse"
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
    `id` |  optional  | int required PostId
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
    `id` |  optional  | int required

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
    -d '{"model":10,"color":14,"brand":6,"subcategory":12,"date":"maiores"}'

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
    "model": 10,
    "color": 14,
    "brand": 6,
    "subcategory": 12,
    "date": "maiores"
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
    -d '{"keywords":"consequuntur"}'

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
    "keywords": "consequuntur"
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
    -d '{"old_password":"qui","new_password":"quasi","new_password_confirmation":"soluta"}'

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
    "old_password": "qui",
    "new_password": "quasi",
    "new_password_confirmation": "soluta"
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
    -d '{"mobile_number":"recusandae"}'

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
    "mobile_number": "recusandae"
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
    "data": []
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
            "name": "Repellendus debitis non quo et id repudiandae quis.",
            "description": "Quidem officia voluptas suscipit nostrum consequuntur amet.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 2,
            "name": "Et tenetur officiis quam doloribus ipsum quidem.",
            "description": "Beatae dolorem architecto et sed voluptate reprehenderit eveniet omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 3,
            "name": "Ratione perspiciatis eum vel sed sit placeat.",
            "description": "Saepe laborum eum nostrum deserunt commodi temporibus voluptatem.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 4,
            "name": "Beatae sit repellendus tenetur autem.",
            "description": "Aut sed autem et ea.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 5,
            "name": "Tempore vero totam quis adipisci possimus et voluptatibus.",
            "description": "Maxime sed impedit officiis officia incidunt praesentium qui.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 6,
            "name": "Quibusdam corrupti aut consequatur harum ut.",
            "description": "Ducimus ducimus distinctio ad sit ut aut possimus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 7,
            "name": "Consequuntur velit dolore quibusdam perspiciatis dolorum commodi.",
            "description": "Qui hic autem sit ut veritatis illum non.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 8,
            "name": "Iure aut labore odit suscipit officia sunt molestiae.",
            "description": "Eveniet nostrum consequuntur quis sed.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 9,
            "name": "Quia atque explicabo doloremque atque mollitia nobis rem.",
            "description": "Qui et aperiam voluptas nam maiores laudantium corporis et.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 10,
            "name": "Autem aut placeat eum est.",
            "description": "Corporis sint est sapiente sapiente.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 11,
            "name": "Eum aut quibusdam aut fuga voluptatibus nulla.",
            "description": "Ipsa nemo vitae autem ut sint error quam itaque.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 12,
            "name": "Dolorum porro et ut est.",
            "description": "Unde eius vitae non laboriosam et ullam.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 13,
            "name": "Dicta quis corrupti debitis numquam quo.",
            "description": "Omnis eveniet reprehenderit explicabo expedita.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 14,
            "name": "Blanditiis veniam itaque nihil quidem nihil.",
            "description": "Officiis voluptate voluptas illum et autem dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 15,
            "name": "Id minus beatae harum aliquid.",
            "description": "Sit consequatur veniam consequatur quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 16,
            "name": "Non eos sed non libero.",
            "description": "Fugiat saepe eveniet quis ad minima voluptate ad.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 17,
            "name": "Ea autem eos eum sequi aut optio cum.",
            "description": "Doloremque occaecati illum facilis ea est vitae.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 18,
            "name": "Molestias repellendus ipsa velit accusamus.",
            "description": "Rerum impedit quos dolore distinctio labore eum.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 19,
            "name": "Porro molestiae sapiente sed est sit libero et amet.",
            "description": "Nesciunt aut voluptatem quam iusto non accusantium.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 20,
            "name": "Quaerat expedita error corporis quia voluptatem et.",
            "description": "Dolore ab nihil et optio autem voluptatem.",
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
        "name": "Repellendus debitis non quo et id repudiandae quis.",
        "description": "Quidem officia voluptas suscipit nostrum consequuntur amet.",
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
            "name": "Dicta id velit beatae nihil soluta amet.",
            "description": "Soluta vitae omnis aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Consectetur inventore ad odit.",
            "description": "Nobis deleniti ratione quia eos libero illum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Inventore quam nobis laboriosam fugiat odio consequatur et.",
            "description": "Commodi aut molestias dolores quae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "At sit error dicta autem dicta dolorem est.",
            "description": "Aliquam error consequatur saepe ut nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Optio deleniti ducimus deserunt quam explicabo non illum.",
            "description": "Animi aliquid illo praesentium fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Rerum consequatur dolor dolores est vitae saepe.",
            "description": "Accusantium nihil omnis aut quasi non id.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Voluptas deleniti expedita non tempora cupiditate voluptatem.",
            "description": "Odit minus eos id qui dolorum consequatur dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Recusandae illo laudantium laboriosam sed ullam molestiae.",
            "description": "Illo similique vel provident a quia provident voluptatem recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Et aliquam veniam magnam cumque.",
            "description": "Et omnis dolores et fugit nulla eum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Corrupti deleniti maiores officia quo dolorum eveniet odit odit.",
            "description": "In illum esse officiis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Esse natus modi qui.",
            "description": "Accusantium et qui quis natus corporis illum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Voluptas consequatur et rerum sunt.",
            "description": "Ipsum assumenda ut quia voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Culpa fugit autem ratione quod.",
            "description": "Sit aut pariatur consequatur velit excepturi pariatur eveniet.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Perspiciatis numquam illo non officia eius ea aliquid.",
            "description": "Est quod sed at voluptatem aspernatur at.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Aut eaque ut soluta dolor.",
            "description": "Debitis tenetur dolorem aliquid molestias quis fugit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Ex ratione quas tempora ipsam quis laboriosam quis.",
            "description": "Ipsam voluptas quisquam quae magnam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Voluptatem eos consequatur dolorum rerum qui consequuntur deserunt.",
            "description": "Blanditiis consequatur voluptates dignissimos voluptatem ut perferendis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Et sit rem dolores omnis sapiente.",
            "description": "Quod qui rem consectetur non et commodi fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Quos sed et officiis laudantium delectus minima.",
            "description": "Dolorem aut a perferendis quia quisquam non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Hic aut ea id.",
            "description": "Voluptates beatae amet tenetur reiciendis facilis esse.",
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
            "name": "Dicta id velit beatae nihil soluta amet.",
            "description": "Soluta vitae omnis aut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Consectetur inventore ad odit.",
            "description": "Nobis deleniti ratione quia eos libero illum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Inventore quam nobis laboriosam fugiat odio consequatur et.",
            "description": "Commodi aut molestias dolores quae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "At sit error dicta autem dicta dolorem est.",
            "description": "Aliquam error consequatur saepe ut nihil.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Optio deleniti ducimus deserunt quam explicabo non illum.",
            "description": "Animi aliquid illo praesentium fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Rerum consequatur dolor dolores est vitae saepe.",
            "description": "Accusantium nihil omnis aut quasi non id.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Voluptas deleniti expedita non tempora cupiditate voluptatem.",
            "description": "Odit minus eos id qui dolorum consequatur dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Recusandae illo laudantium laboriosam sed ullam molestiae.",
            "description": "Illo similique vel provident a quia provident voluptatem recusandae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Et aliquam veniam magnam cumque.",
            "description": "Et omnis dolores et fugit nulla eum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Corrupti deleniti maiores officia quo dolorum eveniet odit odit.",
            "description": "In illum esse officiis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Esse natus modi qui.",
            "description": "Accusantium et qui quis natus corporis illum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Voluptas consequatur et rerum sunt.",
            "description": "Ipsum assumenda ut quia voluptas.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Culpa fugit autem ratione quod.",
            "description": "Sit aut pariatur consequatur velit excepturi pariatur eveniet.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Perspiciatis numquam illo non officia eius ea aliquid.",
            "description": "Est quod sed at voluptatem aspernatur at.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Aut eaque ut soluta dolor.",
            "description": "Debitis tenetur dolorem aliquid molestias quis fugit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Ex ratione quas tempora ipsam quis laboriosam quis.",
            "description": "Ipsam voluptas quisquam quae magnam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Voluptatem eos consequatur dolorum rerum qui consequuntur deserunt.",
            "description": "Blanditiis consequatur voluptates dignissimos voluptatem ut perferendis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Et sit rem dolores omnis sapiente.",
            "description": "Quod qui rem consectetur non et commodi fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Quos sed et officiis laudantium delectus minima.",
            "description": "Dolorem aut a perferendis quia quisquam non.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Hic aut ea id.",
            "description": "Voluptates beatae amet tenetur reiciendis facilis esse.",
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
            "name": "Voluptates magni error labore qui nam.",
            "description": "Cumque velit et et ea repellat enim explicabo aperiam.",
            "image": "http:\/\/wajad.test\/\/tmp\/5241b56fa14f0cf77abfb3e4009f143a.jpg"
        },
        {
            "id": 2,
            "name": "Dolores accusantium ut harum sit.",
            "description": "Est vel itaque velit sit corrupti esse at.",
            "image": "http:\/\/wajad.test\/\/tmp\/874e0ae73edbca1f033ac8eadb724175.jpg"
        },
        {
            "id": 3,
            "name": "Alias quia qui cupiditate ex.",
            "description": "Ut nulla eum quas adipisci eveniet reprehenderit rerum.",
            "image": "http:\/\/wajad.test\/\/tmp\/0d10532a8ab2cbeb88765e903cccc411.jpg"
        },
        {
            "id": 4,
            "name": "Sunt repellendus veniam asperiores dolor.",
            "description": "Asperiores harum atque voluptates cupiditate minima.",
            "image": "http:\/\/wajad.test\/\/tmp\/cb09d476765855aba33bb879b1b0f319.jpg"
        },
        {
            "id": 5,
            "name": "Hic vel ullam sapiente molestiae voluptatem nobis officiis.",
            "description": "Harum reiciendis aut et rem.",
            "image": "http:\/\/wajad.test\/\/tmp\/1f6f0293fc84dc1ae870a2f564afe7c4.jpg"
        },
        {
            "id": 6,
            "name": "Dolores in qui consequatur sed.",
            "description": "Et ab ipsam enim fugit et.",
            "image": "http:\/\/wajad.test\/\/tmp\/a1f23d6ebb4550d7740e3bf8c38b3068.jpg"
        },
        {
            "id": 7,
            "name": "Voluptatum dolorum et possimus explicabo vitae iure.",
            "description": "At eveniet quibusdam qui corporis veritatis praesentium omnis.",
            "image": "http:\/\/wajad.test\/\/tmp\/968987420cae33803ca581368ec6b692.jpg"
        },
        {
            "id": 8,
            "name": "Asperiores possimus eligendi accusantium qui.",
            "description": "Pariatur dicta quos et officia nostrum a quis voluptatum.",
            "image": "http:\/\/wajad.test\/\/tmp\/15c369b13b2a312d34d19490891bb05e.jpg"
        },
        {
            "id": 9,
            "name": "Quis sint quis possimus fuga.",
            "description": "Quam adipisci dicta et facilis dolorum est.",
            "image": "http:\/\/wajad.test\/\/tmp\/c33438744b37a6557284440d0ca077e7.jpg"
        },
        {
            "id": 10,
            "name": "Nulla mollitia rerum et alias ut voluptatem.",
            "description": "Non neque excepturi consectetur eius et enim.",
            "image": "http:\/\/wajad.test\/\/tmp\/26102526f32f194487e6bcb5d95f26fb.jpg"
        },
        {
            "id": 11,
            "name": "Consectetur id vel sit corrupti enim.",
            "description": "Voluptatem sed quisquam rerum dolores molestiae quos sequi.",
            "image": "http:\/\/wajad.test\/\/tmp\/a844467226b99d3d85ae4afd139c4da2.jpg"
        },
        {
            "id": 12,
            "name": "Ea voluptas exercitationem aut id qui natus.",
            "description": "Qui voluptas quaerat voluptas dolorem.",
            "image": "http:\/\/wajad.test\/\/tmp\/a46cab44037dd92c9a8c74dc98380478.jpg"
        },
        {
            "id": 13,
            "name": "Optio consequatur rerum magnam molestiae.",
            "description": "Omnis dolor officia rerum qui quo natus animi.",
            "image": "http:\/\/wajad.test\/\/tmp\/31483590ac1f99c199beb89b1c01c393.jpg"
        },
        {
            "id": 14,
            "name": "Voluptatibus neque quia modi enim nesciunt vitae.",
            "description": "Ea voluptas dolorum aliquid.",
            "image": "http:\/\/wajad.test\/\/tmp\/7895245509085c9de2939036f5761727.jpg"
        },
        {
            "id": 15,
            "name": "Veritatis qui quas labore dolorem dolores.",
            "description": "Asperiores ut reprehenderit natus consequatur veniam voluptas impedit.",
            "image": "http:\/\/wajad.test\/\/tmp\/38fc08f919d4aad047a08e8f618431c8.jpg"
        },
        {
            "id": 16,
            "name": "Laudantium et repellat amet accusantium.",
            "description": "Doloremque itaque cupiditate error sunt minus reiciendis.",
            "image": "http:\/\/wajad.test\/\/tmp\/baa0ff9b374b8c75e1a4577c42007898.jpg"
        },
        {
            "id": 17,
            "name": "Consequatur quia illo et nam.",
            "description": "Corrupti repudiandae sunt eveniet et eum dolor.",
            "image": "http:\/\/wajad.test\/\/tmp\/bf619783000bad5717c388e6c22790f3.jpg"
        },
        {
            "id": 18,
            "name": "Non optio est perferendis aliquam.",
            "description": "Fuga vel deserunt quisquam tempore debitis.",
            "image": "http:\/\/wajad.test\/\/tmp\/a8617f104e4111e3eb9597ec56835367.jpg"
        },
        {
            "id": 19,
            "name": "Eum distinctio aut qui veniam.",
            "description": "Voluptatibus odit aut culpa voluptate.",
            "image": "http:\/\/wajad.test\/\/tmp\/7a34f9cbf124c8a6491dca05990724bd.jpg"
        },
        {
            "id": 20,
            "name": "Alias ipsum ullam voluptas doloribus nemo.",
            "description": "Qui dolores esse ullam et iusto nulla.",
            "image": "http:\/\/wajad.test\/\/tmp\/6cb46761046fe4236941953e3626e0d6.jpg"
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
            "name": "Consequuntur sed deleniti fugit provident aut.",
            "description": "Aspernatur sequi nihil a omnis qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Omnis culpa exercitationem aut doloribus.",
            "description": "Vel facilis maxime explicabo fugiat dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Temporibus sequi ea quis dicta assumenda.",
            "description": "Voluptas iste neque aut ut inventore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Labore iste vel eos asperiores.",
            "description": "Autem tenetur ipsam est excepturi et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Aut id deleniti sunt corporis.",
            "description": "Ut deserunt labore aut rerum eum assumenda nesciunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Molestiae reiciendis qui voluptatum unde assumenda sit.",
            "description": "Odio veritatis culpa iure libero adipisci.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Molestiae tempora sapiente fugit labore sint facilis rem quaerat.",
            "description": "Accusantium deserunt et voluptas quo velit eum iste.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Explicabo necessitatibus consequatur molestiae porro.",
            "description": "Numquam illum inventore esse quo dicta.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Est reiciendis provident sed.",
            "description": "Qui ut et voluptatem inventore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Ut libero aut non.",
            "description": "Nostrum alias placeat totam ut minima consequatur qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Non odio occaecati necessitatibus id.",
            "description": "Assumenda repellat odio et at saepe quis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Similique quaerat consectetur in et.",
            "description": "Eveniet eveniet deserunt praesentium in sed quia quam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Quia voluptates qui quod qui laborum magnam.",
            "description": "Quod et voluptatibus earum nobis adipisci.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "A sapiente atque ut.",
            "description": "Ut dignissimos enim inventore quia minus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Sequi quis repellendus eum non.",
            "description": "Et consequuntur nobis ipsa debitis praesentium reiciendis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Cupiditate quisquam itaque rerum labore quasi dolore officia voluptas.",
            "description": "Quia necessitatibus unde dolor.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Non iste quidem dolorum assumenda sit officiis nihil.",
            "description": "Fugiat dignissimos magnam dolor quis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Dolore facilis omnis aut et facilis.",
            "description": "Accusamus atque assumenda est accusamus suscipit aliquam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Voluptate dolor ipsa nostrum maxime.",
            "description": "Libero harum consectetur fugit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Id aut ullam eum totam.",
            "description": "Aut tempore et aliquam aut sit.",
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
            "name": "Consequuntur sed deleniti fugit provident aut.",
            "description": "Aspernatur sequi nihil a omnis qui.",
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
            "name": "Fuga consequatur pariatur deserunt sapiente occaecati quisquam.",
            "icon": ""
        },
        {
            "id": 2,
            "name": "Ab quia vitae quis adipisci nam.",
            "icon": ""
        },
        {
            "id": 3,
            "name": "Sed vero sed et aut dolorem iste.",
            "icon": ""
        },
        {
            "id": 4,
            "name": "Error nobis repellat ut ut occaecati.",
            "icon": ""
        },
        {
            "id": 5,
            "name": "Fugit est quo quisquam ratione.",
            "icon": ""
        },
        {
            "id": 6,
            "name": "Libero illum deleniti molestias sit.",
            "icon": ""
        },
        {
            "id": 7,
            "name": "Voluptatum dolore sunt quas voluptas ut.",
            "icon": ""
        },
        {
            "id": 8,
            "name": "Et autem voluptate ut error.",
            "icon": ""
        },
        {
            "id": 9,
            "name": "Velit odit suscipit voluptatem doloribus quod.",
            "icon": ""
        },
        {
            "id": 10,
            "name": "Neque blanditiis consequuntur sed dolorum esse ratione.",
            "icon": ""
        },
        {
            "id": 11,
            "name": "Fugiat praesentium nobis id fugiat alias.",
            "icon": ""
        },
        {
            "id": 12,
            "name": "Odio repellat dolor at.",
            "icon": ""
        },
        {
            "id": 13,
            "name": "Earum quam quia itaque.",
            "icon": ""
        },
        {
            "id": 14,
            "name": "Et consectetur deserunt eos.",
            "icon": ""
        },
        {
            "id": 15,
            "name": "Ipsa quae perferendis similique.",
            "icon": ""
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
        "name": "Fuga consequatur pariatur deserunt sapiente occaecati quisquam.",
        "icon": ""
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
    "data": []
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
    "data": []
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
    "data": []
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


