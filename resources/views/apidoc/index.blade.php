<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/docs/css/style.css" />
    <script src="/docs/js/all.js"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc", ["format" => ".json"]) }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Answers</h1>
<!-- START_b8c093319f63f6104bb55df0e5169242 -->
<h2>Answer question</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/post/1/answer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Answers created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/post/{post}/answer</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>post_id</code></td>
<td>required</td>
<td>int, exists in posts</td>
</tr>
</tbody>
</table>
<!-- END_b8c093319f63f6104bb55df0e5169242 -->
<h1>Auth</h1>
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
<h2>Login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"00966236363256","password":"123456789","device_type":"iure"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user": "00966236363256",
    "password": "123456789",
    "device_type": "iure"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "These credentials do not match our records.",
    "status_code": 401
}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "please enter a valid email address or phone number.",
    "status_code": 400
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>numeric,email,min:9,max:14</td>
<td>required</td>
<td>phone number or email for the user.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>min:6 password.</td>
</tr>
<tr>
<td><code>device_type</code></td>
<td>string</td>
<td>required</td>
<td>android or ios</td>
</tr>
</tbody>
</table>
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
<h2>Register</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"Api Username","email":"api@wajad.com","password":"123456789","mobile_number":"123456789","device_type":"tempora"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    "device_type": "tempora"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/register</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>'min:6','max:255' .</td>
</tr>
<tr>
<td><code>email</code></td>
<td>email</td>
<td>required</td>
<td>email,unique:users,email.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>min:6 .</td>
</tr>
<tr>
<td><code>mobile_number</code></td>
<td>numeric</td>
<td>required</td>
<td>min:6,unique:users,mobile_number,digits_between:9,14.</td>
</tr>
<tr>
<td><code>device_type</code></td>
<td>string</td>
<td>required</td>
<td>android or ios</td>
</tr>
</tbody>
</table>
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->
<!-- START_406e4552819a456070d1f6c93688188d -->
<h2>Refresh Token</h2>
<p>[Refresh the current API Beaerer Token]</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/refreshToken?Old=recusandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "recusandae",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/refreshToken</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>Old</code></td>
<td>optional</td>
<td>Bearer Token</td>
</tr>
</tbody>
</table>
<!-- END_406e4552819a456070d1f6c93688188d -->
<!-- START_ea7e28be0fe9f5f4f03de00c1544e2c3 -->
<h2>Send Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/sendCode/phone." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Verification code sent.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/sendCode/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>phone or email.</td>
</tr>
</tbody>
</table>
<!-- END_ea7e28be0fe9f5f4f03de00c1544e2c3 -->
<!-- START_61739f3220a224b34228600649230ad1 -->
<h2>Logout</h2>
<p>[Destroy The Token]</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/logout</code></p>
<!-- END_61739f3220a224b34228600649230ad1 -->
<h1>Home</h1>
<!-- START_e22799a526b2d5e6c38d0c9ffba872eb -->
<h2>Banners</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/banners" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "type": "url",
            "image": "http:\/\/wajad.test\/ddd",
            "url": "c dvd"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/banners</code></p>
<!-- END_e22799a526b2d5e6c38d0c9ffba872eb -->
<!-- START_adef4ddd684318346ed10525cf68c6e9 -->
<h2>Posts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/posts/fugiat/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/posts/fugiat/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/posts/{status}/{subcategory_id?}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>string lost or found</td>
</tr>
<tr>
<td><code>subcategory_id</code></td>
<td>optional</td>
<td>int, sub_category_id, exists in sub_categories</td>
</tr>
</tbody>
</table>
<!-- END_adef4ddd684318346ed10525cf68c6e9 -->
<h1>Items</h1>
<!-- START_e18d215dd04344daa68de35e381670fd -->
<h2>User Items</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userItems" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userItems</code></p>
<!-- END_e18d215dd04344daa68de35e381670fd -->
<!-- START_1f8988f8b514fb2127ba9ed8e2499f98 -->
<h2>Show Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/items/{item}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item</code></td>
<td>required</td>
<td>int Item id.</td>
</tr>
</tbody>
</table>
<!-- END_1f8988f8b514fb2127ba9ed8e2499f98 -->
<!-- START_07fb85e5d8610027392f9f49c33a97c1 -->
<h2>Create Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"suscipit","details":"qui","color_id":"voluptate","brand_id":"tenetur","model_id":"natus","sub_category_id":"temporibus"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "suscipit",
    "details": "qui",
    "color_id": "voluptate",
    "brand_id": "tenetur",
    "model_id": "natus",
    "sub_category_id": "temporibus"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Item created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/items</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>min:6,max:255</td>
<td>required</td>
</tr>
<tr>
<td><code>details</code></td>
<td>min:20,max:500</td>
<td>required</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>exists:colors,id</td>
<td>required</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>exists:brands,id</td>
<td>required</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>exists:models,id</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>exists:sub_category,id</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_07fb85e5d8610027392f9f49c33a97c1 -->
<!-- START_589a987e1c85f683fdb556954a192f2c -->
<h2>Edit Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Item updated successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/items/{item}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item</code></td>
<td>required</td>
<td>int Item id.</td>
</tr>
</tbody>
</table>
<!-- END_589a987e1c85f683fdb556954a192f2c -->
<!-- START_4ba7e871e55098b0081507ac0b4e478b -->
<h2>Delete Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://api.wajad.test/api/items/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Item deleted successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/items/{item}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item</code></td>
<td>required</td>
<td>Item id.</td>
</tr>
</tbody>
</table>
<!-- END_4ba7e871e55098b0081507ac0b4e478b -->
<h1>Packages</h1>
<!-- START_c9db6d511dc413ffed938cbd76dd5af7 -->
<h2>Packages</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/packages</code></p>
<!-- END_c9db6d511dc413ffed938cbd76dd5af7 -->
<h1>Pages</h1>
<!-- START_727da77b51e4f96916de138b4b71c037 -->
<h2>Pages</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/pages/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "page": "about-us",
        "title": "okpokmj",
        "body": "ppojpoj"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/pages/{page?}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>about-us or contact-us or privacy-policy</td>
</tr>
</tbody>
</table>
<!-- END_727da77b51e4f96916de138b4b71c037 -->
<h1>Post Request</h1>
<!-- START_e4d239ac8a5a2883bb4c41b1264d1930 -->
<h2>This item is mine</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/request/post/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post request created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/request/post/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>post_id</code></td>
<td>required</td>
<td>int, exists in posts</td>
</tr>
</tbody>
</table>
<!-- END_e4d239ac8a5a2883bb4c41b1264d1930 -->
<!-- START_af5dda572adce7d093ba91ef873857b9 -->
<h2>This Post Request is his</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/request/1/accept" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":"qui"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/request/1/accept"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": "qui"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post request accepted successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/request/{post}/accept</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>post_id</code></td>
<td>required</td>
<td>int exists in posts</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user_id</code></td>
<td>required</td>
<td>optional</td>
<td>int exists in users</td>
</tr>
</tbody>
</table>
<!-- END_af5dda572adce7d093ba91ef873857b9 -->
<!-- START_d6b20bbd04c0424e02089d99a282853f -->
<h2>Reject Post Request</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/request/1/reject" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post request rejected successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/request/{post}/reject</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>post_id</code></td>
<td>required</td>
<td>int exists in posts</td>
</tr>
</tbody>
</table>
<!-- END_d6b20bbd04c0424e02089d99a282853f -->
<h1>Posts</h1>
<!-- START_93fe34fffcec9f399970d7fffb9bcc14 -->
<h2>User Posts</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userPosts/found." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userPosts/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>lost or found.</td>
</tr>
</tbody>
</table>
<!-- END_93fe34fffcec9f399970d7fffb9bcc14 -->
<!-- START_744b6fe741992bf8fdb4f532ceaa3586 -->
<h2>Report Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/report/post/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"details":"quis","image":"non"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/report/post/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "details": "quis",
    "image": "non"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post reported successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/report/post/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>details</code></td>
<td>string</td>
<td>optional</td>
<td>nullable max:1000</td>
</tr>
<tr>
<td><code>image</code></td>
<td>image</td>
<td>optional</td>
<td>sometimes mimes:jpeg,jpg,png,gif max:5102</td>
</tr>
</tbody>
</table>
<!-- END_744b6fe741992bf8fdb4f532ceaa3586 -->
<!-- START_726b7bf93b3209836a1cbcda5b3b6703 -->
<h2>Show Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/posts/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<!-- END_726b7bf93b3209836a1cbcda5b3b6703 -->
<!-- START_f01269a1d8321c0c8787967b5346c585 -->
<h2>Create Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/posts/add/at" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"soluta","description":"assumenda","reward":"suscipit","longitude":"a","latitude":"atque","sub_category_id":5,"brand_id":17,"model_id":2,"color_id":18,"item_id":8,"city":"nam","images":["et"],"questions":["porro"]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/add/at"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "soluta",
    "description": "assumenda",
    "reward": "suscipit",
    "longitude": "a",
    "latitude": "atque",
    "sub_category_id": 5,
    "brand_id": 17,
    "model_id": 2,
    "color_id": 18,
    "item_id": 8,
    "city": "nam",
    "images": [
        "et"
    ],
    "questions": [
        "porro"
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post created successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/posts/add/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string in:lost,found</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>required</td>
<td>min:6 max:255</td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>required</td>
<td>min:9 max:255</td>
</tr>
<tr>
<td><code>reward</code></td>
<td>string</td>
<td>optional</td>
</tr>
<tr>
<td><code>longitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:sub_categories,id</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:brands,id</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:models,id</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:colors,id</td>
</tr>
<tr>
<td><code>item_id</code></td>
<td>integer</td>
<td>optional</td>
<td>nullable exists:items,id</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>images</code></td>
<td>array</td>
<td>optional</td>
<td>sometimes between:1,5</td>
</tr>
<tr>
<td><code>images.*</code></td>
<td>image</td>
<td>optional</td>
<td>sometimes mimes:jpeg,jpg,png,gif max:5012</td>
</tr>
<tr>
<td><code>questions</code></td>
<td>array</td>
<td>optional</td>
<td>sometimes size:3</td>
</tr>
<tr>
<td><code>questions.*</code></td>
<td>required</td>
<td>optional</td>
<td>min:9 max:500</td>
</tr>
</tbody>
</table>
<!-- END_f01269a1d8321c0c8787967b5346c585 -->
<!-- START_ddec2b5ffb0465b4f2916ca57e164686 -->
<h2>Update Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"cupiditate","description":"atque","status":"quia","reward":"ducimus","longitude":"itaque","latitude":"quos","sub_category_id":5,"brand_id":18,"model_id":12,"color_id":6,"item_id":7,"city":"dolorem","images":["dolor"],"questions":["nisi"]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "cupiditate",
    "description": "atque",
    "status": "quia",
    "reward": "ducimus",
    "longitude": "itaque",
    "latitude": "quos",
    "sub_category_id": 5,
    "brand_id": 18,
    "model_id": 12,
    "color_id": 6,
    "item_id": 7,
    "city": "dolorem",
    "images": [
        "dolor"
    ],
    "questions": [
        "nisi"
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post updated successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/posts/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>required</td>
<td>min:6 max:255</td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>required</td>
<td>min:9 max:255</td>
</tr>
<tr>
<td><code>status</code></td>
<td>numeric</td>
<td>required</td>
<td>in:0,1</td>
</tr>
<tr>
<td><code>reward</code></td>
<td>string</td>
<td>optional</td>
</tr>
<tr>
<td><code>longitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>latitude</code></td>
<td>regex:/^[-]?(([0-8]?[0-9]).(\d+))</td>
<td>(90(.0+)?)$/</td>
<td>required</td>
</tr>
<tr>
<td><code>sub_category_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:sub_categories,id</td>
</tr>
<tr>
<td><code>brand_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:brands,id</td>
</tr>
<tr>
<td><code>model_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:models,id</td>
</tr>
<tr>
<td><code>color_id</code></td>
<td>integer</td>
<td>required</td>
<td>exists:colors,id</td>
</tr>
<tr>
<td><code>item_id</code></td>
<td>integer</td>
<td>optional</td>
<td>nullable exists:items,id</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>required</td>
</tr>
<tr>
<td><code>images</code></td>
<td>array</td>
<td>optional</td>
<td>sometimes between:1,5</td>
</tr>
<tr>
<td><code>images.*</code></td>
<td>image</td>
<td>optional</td>
<td>sometimes mimes:jpeg,jpg,png,gif max:5012</td>
</tr>
<tr>
<td><code>questions</code></td>
<td>array</td>
<td>optional</td>
<td>sometimes size:3</td>
</tr>
<tr>
<td><code>questions.*</code></td>
<td>required</td>
<td>optional</td>
<td>min:9 max:500</td>
</tr>
</tbody>
</table>
<!-- END_ddec2b5ffb0465b4f2916ca57e164686 -->
<!-- START_790d23dbb8c799c36c70f7133a51e7a5 -->
<h2>Delete Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Post deleted successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE api/posts/{post}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int Post Id</td>
</tr>
</tbody>
</table>
<!-- END_790d23dbb8c799c36c70f7133a51e7a5 -->
<h1>QR Codes</h1>
<!-- START_31a59373caf0e95a483c98e25d562cd6 -->
<h2>User QR Codes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userQRCodes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userQRCodes</code></p>
<!-- END_31a59373caf0e95a483c98e25d562cd6 -->
<h1>Search</h1>
<!-- START_9d08a4da7d839136b63a8291497ec010 -->
<h2>Search Filter</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>model</code></td>
<td>optional</td>
<td>int exist in models.</td>
</tr>
<tr>
<td><code>color</code></td>
<td>optional</td>
<td>int exist in colors.</td>
</tr>
<tr>
<td><code>brand</code></td>
<td>optional</td>
<td>int exist in brands.</td>
</tr>
<tr>
<td><code>subcategory</code></td>
<td>optional</td>
<td>int exist in subcategories.</td>
</tr>
<tr>
<td><code>date</code></td>
<td>optional</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_9d08a4da7d839136b63a8291497ec010 -->
<!-- START_a381454c94e24449400bd187815c6920 -->
<h2>Search By KeyWords</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search/keywords" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search/keywords</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>keywords</code></td>
<td>optional</td>
<td>string required</td>
</tr>
</tbody>
</table>
<!-- END_a381454c94e24449400bd187815c6920 -->
<!-- START_16f48877f83d0a8ab32bef962081ffac -->
<h2>Fetch search data</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search/data" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search/data</code></p>
<!-- END_16f48877f83d0a8ab32bef962081ffac -->
<h1>User Profile</h1>
<!-- START_b4f4625b609a18310a50b1dddf752a55 -->
<h2>Reset Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/resetPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user":"mail@gmail.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "New password sent successfully to your mail.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/resetPassword</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>user</code></td>
<td>email,min:9,max:14</td>
<td>required</td>
<td>email or phone.</td>
</tr>
</tbody>
</table>
<!-- END_b4f4625b609a18310a50b1dddf752a55 -->
<!-- START_0b828966a9f31e695693fe9650b70eb1 -->
<h2>User Data</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/userData" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userData</code></p>
<!-- END_0b828966a9f31e695693fe9650b70eb1 -->
<!-- START_734623b7e60cc9f20fd5b5b67df87d7d -->
<h2>Verify Code for Phone or Email</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/verify/phone." \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"1234"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Phone Verified Successfully",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/verify/{type}</code></p>
<h4>URL Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>phone or email.</td>
</tr>
</tbody>
</table>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>code</code></td>
<td>numeric</td>
<td>required</td>
<td>digits:4</td>
</tr>
</tbody>
</table>
<!-- END_734623b7e60cc9f20fd5b5b67df87d7d -->
<!-- START_72a884b85bf7bf4198984d6ccecce2b7 -->
<h2>Update User Profile</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/updateUserProfile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"1234","receive_emails":true,"receive_push_notifications":true,"default_distance_unit":"mile","image":"corporis"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    "image": "corporis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "User updated successfully.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/updateUserProfile</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>min:6,max:255 1 or 0.</td>
</tr>
<tr>
<td><code>receive_emails</code></td>
<td>boolean</td>
<td>required</td>
<td>1 or 0.</td>
</tr>
<tr>
<td><code>receive_push_notifications</code></td>
<td>boolean</td>
<td>required</td>
<td>1 or 0.</td>
</tr>
<tr>
<td><code>default_distance_unit</code></td>
<td>string,in:kilo,mile</td>
<td>required</td>
<td>kilo or mile.</td>
</tr>
<tr>
<td><code>image</code></td>
<td>file</td>
<td>optional</td>
<td>mimes:jpeg,jpg,png,gif, max:5102</td>
</tr>
</tbody>
</table>
<!-- END_72a884b85bf7bf4198984d6ccecce2b7 -->
<!-- START_dd73fe89d9872ce37d284636141ae526 -->
<h2>Password Reset</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/changePassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"old_password":"et","new_password":"similique","new_password_confirmation":"cupiditate"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "et",
    "new_password": "similique",
    "new_password_confirmation": "cupiditate"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Password Updated Successfully",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/changePassword</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>old_password</code></td>
<td>string</td>
<td>required</td>
<td>'min:6' 'max:255'</td>
</tr>
<tr>
<td><code>new_password</code></td>
<td>string</td>
<td>required</td>
<td>'confirmed' 'min:6', 'max:255'</td>
</tr>
<tr>
<td><code>new_password_confirmation</code></td>
<td>string</td>
<td>required</td>
<td>confirm new password</td>
</tr>
</tbody>
</table>
<!-- END_dd73fe89d9872ce37d284636141ae526 -->
<!-- START_cb0e89a15b080a33f4c18135f097480d -->
<h2>Change Phone Number</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/changePhone" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile_number":"nihil"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePhone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile_number": "nihil"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Verification code sent.",
    "status_code": 200
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/changePhone</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>mobile_number</code></td>
<td>numeric</td>
<td>required</td>
<td>digits_between:9,14 unique:user ignore:user-id</td>
</tr>
</tbody>
</table>
<!-- END_cb0e89a15b080a33f4c18135f097480d -->
<!-- START_d0ad6077a075427e4ae216d3352ed1ef -->
<h2>Change Email</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/changeEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"example@example.com"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/changeEmail</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>email</code></td>
<td>email</td>
<td>required</td>
</tr>
</tbody>
</table>
<!-- END_d0ad6077a075427e4ae216d3352ed1ef -->
<h1>general</h1>
<!-- START_98a9f611f7c0880f849db435165db194 -->
<h2>api/qrcodes/create</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/qrcodes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/qrcodes/create</code></p>
<!-- END_98a9f611f7c0880f849db435165db194 -->
<!-- START_89167602b4f7090b5ae673647a46f9d9 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/qrcodes/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/qrcodes/register</code></p>
<!-- END_89167602b4f7090b5ae673647a46f9d9 -->
<!-- START_109013899e0bc43247b0f00b67f889cf -->
<h2>api/categories</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 25,
            "name": "Apparel, Shoes &amp; Accessories",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 26,
            "name": "Art, Crafts &amp; Collectables",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 27,
            "name": "Baby",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 28,
            "name": "Beauty",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 29,
            "name": "Bed &amp; Bath",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 30,
            "name": "Books",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 31,
            "name": "Coins, Stamps &amp; Paper money",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 32,
            "name": "Computers, IT &amp; Networking",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 33,
            "name": "Eyewear &amp; Optics",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 34,
            "name": "Garden &amp; Outdoor",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 35,
            "name": "Furniture",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        },
        {
            "id": 36,
            "name": "Electronics",
            "description": "",
            "image": "http:\/\/wajad.test\/images\/default.png",
            "item_coount": 0
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/categories</code></p>
<!-- END_109013899e0bc43247b0f00b67f889cf -->
<!-- START_34925c1e31e7ecc53f8f52c8b1e91d44 -->
<h2>api/categories/{category}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "No query results for model [App\\Category] 1"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/categories/{category}</code></p>
<!-- END_34925c1e31e7ecc53f8f52c8b1e91d44 -->
<!-- START_5e5665d3d2e746a7e25d945b8f88e0f6 -->
<h2>api/subCategories/{type?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/subCategories/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 5,
            "name": "Lap top",
            "description": null,
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 6,
            "name": "Cameras",
            "description": null,
            "image": "http:\/\/wajad.test\/images\/default.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/subCategories/{type?}</code></p>
<!-- END_5e5665d3d2e746a7e25d945b8f88e0f6 -->
<!-- START_9a21b1430b311e3f5c5e91bf23343711 -->
<h2>api/subCategories/{subCategory}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/subCategories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 5,
            "name": "Lap top",
            "description": null,
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 6,
            "name": "Cameras",
            "description": null,
            "image": "http:\/\/wajad.test\/images\/default.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/subCategories/{subCategory}</code></p>
<!-- END_9a21b1430b311e3f5c5e91bf23343711 -->
<!-- START_068c0e43d7427c487297faaa68a4489a -->
<h2>api/brands/{subcategory_id?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/brands/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 15,
            "name": "Toshiba",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Hp",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Dell",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Nicon",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Canon",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Sony",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/brands/{subcategory_id?}</code></p>
<!-- END_068c0e43d7427c487297faaa68a4489a -->
<!-- START_9c1f67877e90ac8688a0652bb104ee79 -->
<h2>api/models/{brand_id?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/models/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 11,
            "name": "Dell XPS 13",
            "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch FHD (1,920 x 1,080) – 4k (3840 x 2160) | Storage: 256GB – 1TB SSD",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Huawei MateBook 13",
            "description": "CPU: 8th generation Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 , Nvidia GeForce MX150 2GB GDDR5 | RAM: 8GB | Screen: 13-inch 1440p (2,160 x 1,440) | Storage: 256GB - 512GB SSD",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "HP Spectre x360 (2019)",
            "description": "CPU: Intel Core i5 – i7 | Graphics: Intel UHD Graphics 620 | RAM: 8GB – 16GB | Screen: 13.3-inch full HD (1,920 x 1,080) – UHD (3,840 x 2,160) touchscreen | Storage: 256GB – 2TB PCIe SSD",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Apple MacBook Pro (15-inch, 2019)",
            "description": "CPU: Intel Core i7 – i9 | Graphics: AMD Radeon Pro 555X - Radeon Pro Vega 20, Intel UHD Graphics 630 | RAM: 16GB | Screen: 15.4-inch, (2,880 x 1,800) IPS | Storage: 256GB – 4TB SSD",
            "image": "http:\/\/wajad.test\/images\/default.png"
        },
        {
            "id": 15,
            "name": "Sony SA1",
            "description": "",
            "image": "http:\/\/wajad.test\/default-icon.png"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/models/{brand_id?}</code></p>
<!-- END_9c1f67877e90ac8688a0652bb104ee79 -->
<!-- START_02ab26dc9c34cdbbe59219b9bdec9be5 -->
<h2>api/models/{model}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/models/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/models/{model}</code></p>
<!-- END_02ab26dc9c34cdbbe59219b9bdec9be5 -->
<!-- START_657bc03edc12abbb56cd6cba090a5f5d -->
<h2>api/colors</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/colors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/colors</code></p>
<!-- END_657bc03edc12abbb56cd6cba090a5f5d -->
<!-- START_f7434b1702d26d8f9b8761c51d1b63b4 -->
<h2>api/colors/{color}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/colors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "name": "Red",
        "icon": "images\/colors\/red.png"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/colors/{color}</code></p>
<!-- END_f7434b1702d26d8f9b8761c51d1b63b4 -->
<!-- START_f23167370c8a1250be599e87d07e6451 -->
<h2>api/offices</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/offices" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "name": "Dolores nemo dolore consequatur quo.",
            "details": "Laborum occaecati veniam rerum doloremque. Ut est velit qui voluptatibus consequatur nobis. Assumenda dignissimos unde velit officiis facilis. Aut fugit qui sit aut commodi in. Aut et sit consequatur deleniti cupiditate. Quis est similique vitae est vel. Non nulla ipsum voluptatem sed dolor. Consectetur odit qui voluptatum omnis qui blanditiis eligendi. Molestiae illo omnis ullam quia. In distinctio consectetur consequuntur mollitia ducimus. Aliquid aut et hic nesciunt. Sint ut maxime quam molestias. Voluptate et expedita et soluta. Est rerum qui perferendis et odio. Optio sit consequatur cupiditate sed labore aliquam blanditiis perspiciatis. Consequatur qui consequatur repudiandae et optio quam.",
            "address": "Aspernatur ratione dolores voluptatem et molestiae porro nihil. Ut qui esse quasi debitis. Ut animi exercitationem officiis consequatur aut mollitia culpa. Corrupti modi facilis quibusdam dicta.",
            "image": "default.png",
            "latitude": -7.665492,
            "longitude": -135.341722,
            "status": 1
        },
        {
            "id": 2,
            "name": "Est officia non ducimus velit.",
            "details": "Fugit modi voluptatem et. Ea ut consectetur vel quia autem. Fugiat aut sit numquam dolorem eaque illum nihil. Aut deleniti vel et autem quod optio. Veniam quam nostrum ea id quasi. Dicta odio eius molestiae id. Animi ut assumenda eaque ut exercitationem animi esse. Animi architecto sunt quis quis ut quo. Autem aut cupiditate fugit ea voluptatem. Labore doloribus commodi qui.",
            "address": "Aliquam nisi necessitatibus et sint blanditiis. Animi praesentium voluptatem voluptate quis repellendus est.",
            "image": "default.png",
            "latitude": -28.704166,
            "longitude": 78.446779,
            "status": 1
        },
        {
            "id": 3,
            "name": "Nihil illum laborum qui voluptatum.",
            "details": "Saepe quidem sed qui ex consequuntur quae sed molestiae. Qui similique reiciendis velit repellat illum reprehenderit et. Consequatur commodi in sunt dolorem. Iste et tempore corrupti in. Et et consequatur repellat omnis labore laborum unde. Perspiciatis et ea itaque nulla et enim necessitatibus. Qui dolor nesciunt soluta eveniet. Quia eum dolore molestiae neque reprehenderit distinctio molestias. Distinctio ratione ipsa error amet asperiores minus. Atque vero maiores quis explicabo placeat fugiat sint. Voluptate deleniti ea ut ea tempora mollitia animi. Laboriosam recusandae aut quam nemo. Est necessitatibus numquam quas cum necessitatibus facilis. Earum omnis voluptatem rerum labore molestias rem quod.",
            "address": "Ut in sit et impedit eaque reprehenderit. Quidem asperiores aspernatur esse adipisci. Repudiandae velit consequatur porro provident et autem est.",
            "image": "default.png",
            "latitude": -39.365713,
            "longitude": 0.525124,
            "status": 1
        },
        {
            "id": 4,
            "name": "Sed accusantium voluptatem provident impedit tempora dolores.",
            "details": "Pariatur sapiente eos quibusdam est. Soluta laudantium et error voluptatem voluptate commodi. Molestiae repellendus molestiae incidunt. Iste excepturi qui sed impedit dolore. Eum magni aut veniam eos doloribus. Debitis delectus optio modi molestiae minus velit ut voluptas. Ut expedita id provident labore quibusdam. Est facilis dolor quia aut dolorem velit. Animi dolor quaerat officia. Voluptatem dolor qui ea aut qui cumque et. Beatae harum quod deserunt. Rerum velit animi dolorem omnis dolorum molestiae. Distinctio sunt praesentium inventore. Est explicabo corrupti sunt aut expedita cupiditate consequatur. Quidem dolorum sunt laboriosam fugit quo. Ut nisi illo est similique sed iusto esse. Neque minus consequatur ducimus impedit. Quisquam exercitationem asperiores beatae voluptatem laboriosam. Eum odit voluptatum sapiente. Deserunt nisi quis libero fuga voluptatibus vitae.",
            "address": "Nobis quaerat quae dolor nulla. Ratione aliquam asperiores necessitatibus qui eum. Saepe saepe magnam ut dolor.",
            "image": "default.png",
            "latitude": -50.832397,
            "longitude": 112.180718,
            "status": 1
        },
        {
            "id": 5,
            "name": "Pariatur quia voluptas cupiditate perferendis amet unde.",
            "details": "Quos eos qui magnam facilis. Odit quis hic minima enim. Aut adipisci voluptas et. Exercitationem dolore cum et nobis quia. Quas minima quaerat qui fugit. Dignissimos ex quibusdam asperiores cupiditate. Ea nemo et sit. Sunt magnam exercitationem et est quia sit. Exercitationem qui et explicabo nemo incidunt aperiam. Animi fugiat id maxime quidem eum. Officiis dignissimos et et illo autem. Maiores et possimus blanditiis. Culpa ea tenetur quo dolores voluptatem atque. Animi odit numquam sit odio eum ducimus autem tenetur. Voluptas dolores nostrum ut vitae tempore aut molestiae.",
            "address": "Odit mollitia et voluptate et sed. Quae saepe facere ea perferendis. Labore praesentium quisquam quidem ut nisi aliquam voluptas.",
            "image": "default.png",
            "latitude": 21.659138,
            "longitude": 98.66884,
            "status": 1
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/offices</code></p>
<!-- END_f23167370c8a1250be599e87d07e6451 -->
<!-- START_bd6ef4ad5e299a34f4c6db1eb27ba327 -->
<h2>api/maps/{type?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/maps/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/maps/{type?}</code></p>
<!-- END_bd6ef4ad5e299a34f4c6db1eb27ba327 -->
<!-- START_316a4c3b4f6a4c4ff34e5893943cdebd -->
<h2>api/countries</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/countries" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/countries</code></p>
<!-- END_316a4c3b4f6a4c4ff34e5893943cdebd -->
<!-- START_d3a06985ef377a31eecb832106f4a5e6 -->
<h2>api/regions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/regions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/regions</code></p>
<!-- END_d3a06985ef377a31eecb832106f4a5e6 -->
<!-- START_e0cc7781f77aa50d54a15c7851b36d0b -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/contact-us" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/contact-us</code></p>
<!-- END_e0cc7781f77aa50d54a15c7851b36d0b -->
<!-- START_2bcf7e87aec832345867dfd3f2da84e7 -->
<h2>Handle the incoming request.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/scan-qr-code/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": null,
        "url": "http:\/\/api.wajad.test\/api\/scan-qr-code",
        "user": null,
        "item": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/scan-qr-code/{qr_code?}</code></p>
<!-- END_2bcf7e87aec832345867dfd3f2da84e7 -->
<!-- START_0ee5bf7a76203366c8ac325bd8ada596 -->
<h2>Invoke the controller method.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/mario" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/mario</code></p>
<!-- END_0ee5bf7a76203366c8ac325bd8ada596 -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>