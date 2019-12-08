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
    -d '{"user":"00966236363256","password":"123456789"}'
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
    "password": "123456789"
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
        "default_distance_unit": "kilo"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "These credentials do not match our records.",
    "code": 401
}</code></pre>
<blockquote>
<p>Example response (400):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "please enter a valid email address or phone number.",
    "code": 400
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
    -d '{"name":"Api Username","email":"api@wajad.com","password":"123456789","mobile_number":"123456789"}'
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
    "mobile_number": "123456789"
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
        "default_distance_unit": "kilo"
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
    "http://api.wajad.test/api/refreshToken?Old=aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "aut",
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
    -G "http://api.wajad.test/api/home/posts/nulla/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/posts/nulla/1"
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
<h1>Item Request</h1>
<!-- START_e4d239ac8a5a2883bb4c41b1264d1930 -->
<h2>Create Post Request</h2>
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
    -d '{"title":"aut","details":"voluptatibus","color_id":"qui","brand_id":"nam","model_id":"et","sub_category_id":"sed"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "aut",
    "details": "voluptatibus",
    "color_id": "qui",
    "brand_id": "nam",
    "model_id": "et",
    "sub_category_id": "sed"
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
<!-- START_e34601ed139d88ac1613ec4df2056baa -->
<h2>Edit Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
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
    method: "PUT",
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
<p><code>PUT api/items/{item}</code></p>
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
<!-- END_e34601ed139d88ac1613ec4df2056baa -->
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
    -d '{"details":"error","image":"quidem"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/report/post/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "details": "error",
    "image": "quidem"
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
    "http://api.wajad.test/api/posts/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"officia","description":"quo","reward":"suscipit","longitude":"fuga","latitude":"tempore","sub_category_id":13,"brand_id":10,"model_id":4,"color_id":8,"item_id":11,"city":"nemo","images":["quo"],"questions":["ipsum"]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/add/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "officia",
    "description": "quo",
    "reward": "suscipit",
    "longitude": "fuga",
    "latitude": "tempore",
    "sub_category_id": 13,
    "brand_id": 10,
    "model_id": 4,
    "color_id": 8,
    "item_id": 11,
    "city": "nemo",
    "images": [
        "quo"
    ],
    "questions": [
        "ipsum"
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
<td>numeric</td>
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
<!-- START_753caa181befa10f8d0e0f5ca0e5b46f -->
<h2>Update Post</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://api.wajad.test/api/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"consequatur","description":"quo","status":"consectetur","reward":"iure","longitude":"velit","latitude":"sunt","sub_category_id":16,"brand_id":20,"model_id":19,"color_id":7,"item_id":16,"city":"necessitatibus","images":["vitae"],"questions":["et"]}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "consequatur",
    "description": "quo",
    "status": "consectetur",
    "reward": "iure",
    "longitude": "velit",
    "latitude": "sunt",
    "sub_category_id": 16,
    "brand_id": 20,
    "model_id": 19,
    "color_id": 7,
    "item_id": 16,
    "city": "necessitatibus",
    "images": [
        "vitae"
    ],
    "questions": [
        "et"
    ]
}

fetch(url, {
    method: "PUT",
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
<p><code>PUT api/posts/{post}</code></p>
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
<td>numeric</td>
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
<!-- END_753caa181befa10f8d0e0f5ca0e5b46f -->
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
<h1>Search</h1>
<!-- START_9d08a4da7d839136b63a8291497ec010 -->
<h2>Search Filter</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"model":12,"color":7,"brand":2,"subcategory":12,"date":"ipsam"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "model": 12,
    "color": 7,
    "brand": 2,
    "subcategory": 12,
    "date": "ipsam"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
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
<td><code>model</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in models.</td>
</tr>
<tr>
<td><code>color</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in colors.</td>
</tr>
<tr>
<td><code>brand</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in brands.</td>
</tr>
<tr>
<td><code>subcategory</code></td>
<td>integer</td>
<td>optional</td>
<td>exist in subcategories.</td>
</tr>
<tr>
<td><code>date</code></td>
<td>date</td>
<td>optional</td>
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
    -H "Accept: application/json" \
    -d '{"keywords":"molestias"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/home/search/keywords"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "keywords": "molestias"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
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
<td><code>keywords</code></td>
<td>string</td>
<td>required</td>
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
        "default_distance_unit": "kilo"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/userData</code></p>
<!-- END_0b828966a9f31e695693fe9650b70eb1 -->
<!-- START_734623b7e60cc9f20fd5b5b67df87d7d -->
<h2>Verify Phone or Email</h2>
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
    -d '{"name":"1234","receive_emails":true,"receive_push_notifications":true,"default_distance_unit":"mile"}'
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
    "default_distance_unit": "mile"
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
    -d '{"old_password":"voluptates","new_password":"qui","new_password_confirmation":"sed"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "voluptates",
    "new_password": "qui",
    "new_password_confirmation": "sed"
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
    -d '{"mobile_number":"est"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePhone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile_number": "est"
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
<!-- START_af5dda572adce7d093ba91ef873857b9 -->
<h2>api/request/{post}/accept</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/request/1/accept" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/request/1/accept"
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
<p><code>POST api/request/{post}/accept</code></p>
<!-- END_af5dda572adce7d093ba91ef873857b9 -->
<!-- START_d6b20bbd04c0424e02089d99a282853f -->
<h2>api/request/{post}/reject</h2>
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
<h3>HTTP Request</h3>
<p><code>POST api/request/{post}/reject</code></p>
<!-- END_d6b20bbd04c0424e02089d99a282853f -->
<!-- START_98a9f611f7c0880f849db435165db194 -->
<h2>Store a newly created resource in storage.</h2>
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
    "data": []
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
    "data": []
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
    "data": []
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
    "data": []
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
    "data": []
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
    "data": []
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
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "No query results for model [App\\Color] 1"
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
    "data": []
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
    "data": []
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
    "data": []
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