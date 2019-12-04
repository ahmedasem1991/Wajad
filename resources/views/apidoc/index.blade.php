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
    "http://api.wajad.test/api/refreshToken?Old=soluta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/refreshToken"
);

let params = {
    "Old": "soluta",
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
<h1>Items</h1>
<!-- START_1f8988f8b514fb2127ba9ed8e2499f98 -->
<h2>Show Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/items/magnam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items/magnam"
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
<td>Item id</td>
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
    -d '{"title":"odit","details":"tenetur","color_id":"perspiciatis","brand_id":"et","model_id":"et","sub_category_id":"cumque"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "odit",
    "details": "tenetur",
    "color_id": "perspiciatis",
    "brand_id": "et",
    "model_id": "et",
    "sub_category_id": "cumque"
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
<h2>api/items/{item}</h2>
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
<h3>HTTP Request</h3>
<p><code>PUT api/items/{item}</code></p>
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
    -d '{"old_password":"sit","new_password":"pariatur","new_password_confirmation":"minus"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "sit",
    "new_password": "pariatur",
    "new_password_confirmation": "minus"
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
    -d '{"mobile_number":"facere"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://api.wajad.test/api/changePhone"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile_number": "facere"
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
<h1>general</h1>
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
<!-- START_e22799a526b2d5e6c38d0c9ffba872eb -->
<h2>api/home/banners</h2>
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
    "data": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/banners</code></p>
<!-- END_e22799a526b2d5e6c38d0c9ffba872eb -->
<!-- START_adef4ddd684318346ed10525cf68c6e9 -->
<h2>api/home/posts/{status}/{subcategory_id?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://api.wajad.test/api/home/posts/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Category is not found.",
    "code": 404
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/posts/{status}/{subcategory_id?}</code></p>
<!-- END_adef4ddd684318346ed10525cf68c6e9 -->
<!-- START_9d08a4da7d839136b63a8291497ec010 -->
<h2>api/home/search</h2>
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
    "data": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search</code></p>
<!-- END_9d08a4da7d839136b63a8291497ec010 -->
<!-- START_a381454c94e24449400bd187815c6920 -->
<h2>api/home/search/keywords</h2>
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
    "data": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search/keywords</code></p>
<!-- END_a381454c94e24449400bd187815c6920 -->
<!-- START_16f48877f83d0a8ab32bef962081ffac -->
<h2>api/home/search/data</h2>
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
    "regions": [],
    "categories": [
        {
            "id": 1,
            "name": "Possimus quasi aut cum est dignissimos explicabo placeat.",
            "description": "Ut dolorum dicta molestias quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 1,
                    "name": "Doloribus quam omnis ab pariatur.",
                    "description": "Similique consequuntur quidem a dicta et.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 2,
            "name": "Veniam et in quas provident aut illo.",
            "description": "Sapiente placeat praesentium fuga voluptatum tempore laudantium.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 2,
                    "name": "Nisi vel pariatur aut.",
                    "description": "Eius ducimus fugit facere quia adipisci omnis soluta dolore.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 1,
                            "name": "Vel velit recusandae fuga est nisi voluptatem quos.",
                            "description": "Id quod mollitia in.",
                            "image": "http:\/\/wajad.test\/\/tmp\/5481847958225977a51c43d1b86e6bcf.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 3,
            "name": "Enim quia laudantium sequi illum.",
            "description": "Occaecati ratione quia nisi iste.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 3,
                    "name": "Et id beatae laboriosam velit et inventore totam.",
                    "description": "Aliquam sunt et perspiciatis iusto dolor dignissimos ea.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 2,
                            "name": "Eum aliquid delectus inventore.",
                            "description": "Voluptate iste error cupiditate iste eligendi maiores.",
                            "image": "http:\/\/wajad.test\/\/tmp\/707a76cb261703aa63236b4740f605c4.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 4,
            "name": "Vel asperiores numquam quia est perspiciatis voluptas rerum et.",
            "description": "Voluptatem vitae placeat dolore sit quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 4,
                    "name": "Nam sequi sit voluptate aut quia et.",
                    "description": "Sunt autem possimus et sunt quas voluptas unde dolores.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 5,
            "name": "Eaque aut necessitatibus amet nemo repellendus aut.",
            "description": "Est aperiam quas blanditiis ipsa.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 5,
                    "name": "Rerum sint corporis est qui.",
                    "description": "Non laudantium labore nihil rem distinctio eos.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 3,
                            "name": "Laborum nisi a rerum molestiae non quo.",
                            "description": "Libero quidem est aut doloribus nihil laudantium sequi.",
                            "image": "http:\/\/wajad.test\/\/tmp\/f1de811a10579b612939ffc3c906f6e3.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 6,
            "name": "Maiores rem perferendis enim mollitia.",
            "description": "Mollitia non dolorem repellendus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 6,
                    "name": "Nemo quod explicabo sit ut exercitationem aspernatur molestiae.",
                    "description": "Minus ea eveniet et minima iusto.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 4,
                            "name": "Aut vel ut qui praesentium ipsum cum.",
                            "description": "Provident sit in aspernatur libero accusantium.",
                            "image": "http:\/\/wajad.test\/\/tmp\/9a0234682b5608b73bddb9681e1203a7.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 7,
            "name": "Sapiente iste dolores quos illum et.",
            "description": "Libero qui mollitia corrupti facilis ut suscipit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 7,
                    "name": "Odit hic aut magni beatae placeat incidunt molestiae.",
                    "description": "Eveniet et officiis voluptates omnis ut assumenda.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 8,
            "name": "Doloribus numquam praesentium temporibus provident illum.",
            "description": "Facere quas voluptate aut molestiae velit quasi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 8,
                    "name": "Placeat rerum libero illum laborum.",
                    "description": "Architecto at harum sit.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 5,
                            "name": "Tenetur nulla ut quas non dolor.",
                            "description": "Molestiae autem nihil sint accusamus sit cupiditate.",
                            "image": "http:\/\/wajad.test\/\/tmp\/0fd75f66eeabe34078af5022f8d969c4.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 9,
            "name": "Dicta suscipit aperiam earum aut.",
            "description": "Animi dolor ipsa ut a.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 9,
                    "name": "Dolores unde aliquid molestiae nihil porro et.",
                    "description": "Rem numquam beatae quis nam enim.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 6,
                            "name": "Vitae adipisci dolor autem libero.",
                            "description": "Est eligendi vero itaque ipsa est inventore mollitia et.",
                            "image": "http:\/\/wajad.test\/\/tmp\/009b927b2ac0338e4405fb6de1375b3e.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 10,
            "name": "Recusandae quia labore placeat beatae laborum itaque officia.",
            "description": "Ex quasi sit quis aut maiores.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 10,
                    "name": "Inventore laboriosam pariatur corrupti ab voluptatem placeat assumenda veniam.",
                    "description": "Iure consequatur soluta qui repudiandae ut.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 11,
            "name": "Magni omnis ducimus porro nihil praesentium.",
            "description": "Iusto impedit aut eos dolores iste repudiandae deleniti.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 11,
                    "name": "Labore odio dolor minus veniam.",
                    "description": "Minus saepe at magnam deserunt vero.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 7,
                            "name": "Est autem voluptatem voluptatem quidem veniam est nihil.",
                            "description": "Mollitia voluptas deleniti saepe consequatur quam odit eos ea.",
                            "image": "http:\/\/wajad.test\/\/tmp\/eddec1683b7e5dc707a96460f056f58c.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 12,
            "name": "Laboriosam velit maiores aut.",
            "description": "Non voluptas hic et quod.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 12,
                    "name": "Corporis debitis corporis voluptatem odit est.",
                    "description": "Ut magni doloremque ea nostrum et.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 8,
                            "name": "Dolor dolore minima magnam quibusdam.",
                            "description": "Nihil impedit sint dolorem.",
                            "image": "http:\/\/wajad.test\/\/tmp\/5e218854a9cba83e95489bf6a53a871e.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 13,
            "name": "Explicabo est molestiae nihil omnis voluptas.",
            "description": "Non laboriosam molestias ea sit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 13,
                    "name": "Officia velit dolorem officiis.",
                    "description": "Eos eius quae et earum asperiores ipsam.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 14,
            "name": "Occaecati ut voluptatibus ipsa ipsa eius iste eligendi.",
            "description": "Est odio ab ullam ab atque non error.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 14,
                    "name": "Quis quia ab officiis sed eius et.",
                    "description": "Optio corporis qui perspiciatis nesciunt perspiciatis.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 9,
                            "name": "Ipsum cum voluptatem autem ut ex hic.",
                            "description": "Fugit omnis consectetur ut ut.",
                            "image": "http:\/\/wajad.test\/\/tmp\/55e59a9ddb87a959a6ed24df7caf7e56.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 15,
            "name": "Doloremque in qui odio voluptatum possimus.",
            "description": "Error culpa illum laborum inventore iste molestias suscipit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 15,
                    "name": "Sit quia nemo qui possimus.",
                    "description": "Rerum voluptatem quia repellendus quo in delectus temporibus.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 10,
                            "name": "Impedit magni molestias aut saepe.",
                            "description": "Eaque accusamus repudiandae voluptatibus molestiae ut saepe.",
                            "image": "http:\/\/wajad.test\/\/tmp\/dae82643d361e9200926f902609158b5.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 16,
            "name": "Possimus nihil sunt quis quis est a.",
            "description": "Recusandae sit provident eveniet ratione qui quia consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 16,
                    "name": "Magni ipsum et voluptate corporis.",
                    "description": "Quia eligendi est qui nulla voluptatibus harum in.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 17,
            "name": "Molestiae vel facere voluptas laboriosam.",
            "description": "Et laborum quibusdam repudiandae enim ex incidunt facere perspiciatis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 17,
                    "name": "Eos tenetur repudiandae dolor cumque velit et est.",
                    "description": "Ea occaecati omnis neque quaerat quia fugit.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 11,
                            "name": "Et sed quibusdam error ad quia recusandae ea.",
                            "description": "Et autem aperiam facere ut voluptate nihil nam.",
                            "image": "http:\/\/wajad.test\/\/tmp\/d53fdda98ad64c41a13a782bf69f2949.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 18,
            "name": "Hic sint aut amet similique dolor quod beatae.",
            "description": "Laudantium quae quas sapiente voluptates optio.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 18,
                    "name": "Quaerat veniam est officiis est ea voluptas sequi.",
                    "description": "Eum dolorum aperiam quos tenetur corrupti qui.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 12,
                            "name": "Magnam est minima ab praesentium.",
                            "description": "Et pariatur amet eos aut.",
                            "image": "http:\/\/wajad.test\/\/tmp\/5604fac832e5af9adc9c34b0816d9900.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 19,
            "name": "Temporibus eum mollitia odit facilis ad.",
            "description": "Repellat quia rem rem dolor consequatur sunt non quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 19,
                    "name": "Minus ipsa et pariatur aut suscipit.",
                    "description": "Deserunt laborum aliquam veritatis dolores cum voluptas maiores.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": []
                }
            ]
        },
        {
            "id": 20,
            "name": "Omnis sint tempora quidem eos distinctio necessitatibus.",
            "description": "In fugiat sed laborum facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 20,
                    "name": "Molestiae atque recusandae qui explicabo vitae.",
                    "description": "Hic in debitis ea eos vitae.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 13,
                            "name": "Ut nemo cumque quidem.",
                            "description": "Doloribus saepe et iusto enim expedita ut.",
                            "image": "http:\/\/wajad.test\/\/tmp\/6b651e739e5667f3c5cad317fa483d49.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 21,
            "name": "Nisi assumenda corporis quia et.",
            "description": "Sint et dolor libero facere.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 21,
                    "name": "Corporis qui illum explicabo similique.",
                    "description": "Perferendis impedit id architecto quidem eius.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 14,
                            "name": "Deserunt error reprehenderit ipsa delectus.",
                            "description": "Sunt fugiat et eligendi repellat autem.",
                            "image": "http:\/\/wajad.test\/\/tmp\/55732492b6ec1d290a1fe94d8614e9a1.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 22,
            "name": "Explicabo voluptatem consequatur ipsam accusamus optio.",
            "description": "Iusto aut veniam quia repellendus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 22,
                    "name": "Sit eum necessitatibus itaque alias voluptatum quam.",
                    "description": "Fugiat nostrum facilis iusto nobis deserunt facere.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 15,
                            "name": "Veritatis deserunt dolorum illo cumque pariatur quasi.",
                            "description": "Ab et nihil omnis ut vel corrupti aut.",
                            "image": "http:\/\/wajad.test\/\/tmp\/7fb252cac7f35fdab31c2d3d59779042.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 23,
            "name": "Officiis molestiae dignissimos laudantium ea repellat.",
            "description": "Expedita neque cum ullam omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 23,
                    "name": "Quo iusto mollitia voluptas ipsum quas dicta aliquam.",
                    "description": "Consequatur ut alias non molestiae nesciunt sunt.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 16,
                            "name": "Et quia ut cumque alias.",
                            "description": "Voluptates ipsa perferendis porro.",
                            "image": "http:\/\/wajad.test\/\/tmp\/b6fd730124675baa3feea5f02c69476f.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 24,
            "name": "Similique sunt quis ea qui.",
            "description": "Asperiores occaecati et et aperiam a.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 24,
                    "name": "Dolorem ducimus alias perferendis dolorem nihil dolorem.",
                    "description": "Consequatur quas tempora sequi saepe et.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 17,
                            "name": "Eligendi quia ratione incidunt quis consequatur.",
                            "description": "Voluptatem voluptatem minus et magnam.",
                            "image": "http:\/\/wajad.test\/\/tmp\/167f175413f5a630d6f7216466a91e40.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 25,
            "name": "Eos cum qui consequatur quo.",
            "description": "Tempore quidem nemo delectus eius.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 25,
                    "name": "Ex sed quos est sit eius quo quasi.",
                    "description": "Quia vitae voluptatibus ut autem.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 18,
                            "name": "Est alias vel ipsum iste architecto ut deleniti optio.",
                            "description": "Libero natus adipisci nihil eum et illo labore.",
                            "image": "http:\/\/wajad.test\/\/tmp\/ce008c43cd4d98f2fcc28a264a29f69c.jpg"
                        }
                    ]
                }
            ]
        },
        {
            "id": 26,
            "name": "Est dolores corporis et sit qui.",
            "description": "Dolores tenetur est sit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0,
            "subCategories": [
                {
                    "id": 26,
                    "name": "Veniam iusto rerum aliquid autem.",
                    "description": "Explicabo sit voluptate sint doloremque mollitia.",
                    "image": "http:\/\/wajad.test\/default-icon.png",
                    "brands": [
                        {
                            "id": 19,
                            "name": "Qui fugit rerum fugit temporibus.",
                            "description": "Provident rerum voluptatem et rem sit.",
                            "image": "http:\/\/wajad.test\/\/tmp\/5868d2400dd9ce092a6137b28348b20e.jpg"
                        }
                    ]
                }
            ]
        }
    ],
    "colors": [
        {
            "id": 1,
            "name": "Sit ut rerum repellat esse inventore ab.",
            "icon": ""
        },
        {
            "id": 2,
            "name": "Error placeat repudiandae labore est qui.",
            "icon": ""
        },
        {
            "id": 3,
            "name": "Laboriosam eveniet quia minus cum nesciunt.",
            "icon": ""
        },
        {
            "id": 4,
            "name": "Eveniet et est nobis optio enim.",
            "icon": ""
        },
        {
            "id": 5,
            "name": "At incidunt totam incidunt explicabo autem.",
            "icon": ""
        },
        {
            "id": 6,
            "name": "Asperiores architecto alias cupiditate voluptatem laboriosam.",
            "icon": ""
        },
        {
            "id": 7,
            "name": "Non ut voluptate mollitia nobis saepe molestiae.",
            "icon": ""
        },
        {
            "id": 8,
            "name": "Animi aut officia qui natus.",
            "icon": ""
        },
        {
            "id": 9,
            "name": "Quo ipsam omnis aut quia.",
            "icon": ""
        },
        {
            "id": 10,
            "name": "Et aut eos tempora excepturi delectus et.",
            "icon": ""
        },
        {
            "id": 11,
            "name": "Itaque ratione perspiciatis non ut vel sed.",
            "icon": ""
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/home/search/data</code></p>
<!-- END_16f48877f83d0a8ab32bef962081ffac -->
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
            "id": 1,
            "name": "Possimus quasi aut cum est dignissimos explicabo placeat.",
            "description": "Ut dolorum dicta molestias quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 2,
            "name": "Veniam et in quas provident aut illo.",
            "description": "Sapiente placeat praesentium fuga voluptatum tempore laudantium.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 3,
            "name": "Enim quia laudantium sequi illum.",
            "description": "Occaecati ratione quia nisi iste.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 4,
            "name": "Vel asperiores numquam quia est perspiciatis voluptas rerum et.",
            "description": "Voluptatem vitae placeat dolore sit quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 5,
            "name": "Eaque aut necessitatibus amet nemo repellendus aut.",
            "description": "Est aperiam quas blanditiis ipsa.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 6,
            "name": "Maiores rem perferendis enim mollitia.",
            "description": "Mollitia non dolorem repellendus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 7,
            "name": "Sapiente iste dolores quos illum et.",
            "description": "Libero qui mollitia corrupti facilis ut suscipit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 8,
            "name": "Doloribus numquam praesentium temporibus provident illum.",
            "description": "Facere quas voluptate aut molestiae velit quasi.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 9,
            "name": "Dicta suscipit aperiam earum aut.",
            "description": "Animi dolor ipsa ut a.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 10,
            "name": "Recusandae quia labore placeat beatae laborum itaque officia.",
            "description": "Ex quasi sit quis aut maiores.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 11,
            "name": "Magni omnis ducimus porro nihil praesentium.",
            "description": "Iusto impedit aut eos dolores iste repudiandae deleniti.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 12,
            "name": "Laboriosam velit maiores aut.",
            "description": "Non voluptas hic et quod.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 13,
            "name": "Explicabo est molestiae nihil omnis voluptas.",
            "description": "Non laboriosam molestias ea sit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 14,
            "name": "Occaecati ut voluptatibus ipsa ipsa eius iste eligendi.",
            "description": "Est odio ab ullam ab atque non error.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 15,
            "name": "Doloremque in qui odio voluptatum possimus.",
            "description": "Error culpa illum laborum inventore iste molestias suscipit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 16,
            "name": "Possimus nihil sunt quis quis est a.",
            "description": "Recusandae sit provident eveniet ratione qui quia consequatur.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 17,
            "name": "Molestiae vel facere voluptas laboriosam.",
            "description": "Et laborum quibusdam repudiandae enim ex incidunt facere perspiciatis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 18,
            "name": "Hic sint aut amet similique dolor quod beatae.",
            "description": "Laudantium quae quas sapiente voluptates optio.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 19,
            "name": "Temporibus eum mollitia odit facilis ad.",
            "description": "Repellat quia rem rem dolor consequatur sunt non quia.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 20,
            "name": "Omnis sint tempora quidem eos distinctio necessitatibus.",
            "description": "In fugiat sed laborum facilis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 21,
            "name": "Nisi assumenda corporis quia et.",
            "description": "Sint et dolor libero facere.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 22,
            "name": "Explicabo voluptatem consequatur ipsam accusamus optio.",
            "description": "Iusto aut veniam quia repellendus.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 23,
            "name": "Officiis molestiae dignissimos laudantium ea repellat.",
            "description": "Expedita neque cum ullam omnis.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 24,
            "name": "Similique sunt quis ea qui.",
            "description": "Asperiores occaecati et et aperiam a.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 25,
            "name": "Eos cum qui consequatur quo.",
            "description": "Tempore quidem nemo delectus eius.",
            "image": "http:\/\/wajad.test\/default-icon.png",
            "item_coount": 0
        },
        {
            "id": 26,
            "name": "Est dolores corporis et sit qui.",
            "description": "Dolores tenetur est sit.",
            "image": "http:\/\/wajad.test\/default-icon.png",
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
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "id": 1,
        "name": "Possimus quasi aut cum est dignissimos explicabo placeat.",
        "description": "Ut dolorum dicta molestias quia.",
        "image": "http:\/\/wajad.test\/default-icon.png",
        "item_coount": 0
    }
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
            "id": 1,
            "name": "Doloribus quam omnis ab pariatur.",
            "description": "Similique consequuntur quidem a dicta et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Nisi vel pariatur aut.",
            "description": "Eius ducimus fugit facere quia adipisci omnis soluta dolore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Et id beatae laboriosam velit et inventore totam.",
            "description": "Aliquam sunt et perspiciatis iusto dolor dignissimos ea.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Nam sequi sit voluptate aut quia et.",
            "description": "Sunt autem possimus et sunt quas voluptas unde dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Rerum sint corporis est qui.",
            "description": "Non laudantium labore nihil rem distinctio eos.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Nemo quod explicabo sit ut exercitationem aspernatur molestiae.",
            "description": "Minus ea eveniet et minima iusto.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Odit hic aut magni beatae placeat incidunt molestiae.",
            "description": "Eveniet et officiis voluptates omnis ut assumenda.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Placeat rerum libero illum laborum.",
            "description": "Architecto at harum sit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Dolores unde aliquid molestiae nihil porro et.",
            "description": "Rem numquam beatae quis nam enim.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Inventore laboriosam pariatur corrupti ab voluptatem placeat assumenda veniam.",
            "description": "Iure consequatur soluta qui repudiandae ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Labore odio dolor minus veniam.",
            "description": "Minus saepe at magnam deserunt vero.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Corporis debitis corporis voluptatem odit est.",
            "description": "Ut magni doloremque ea nostrum et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Officia velit dolorem officiis.",
            "description": "Eos eius quae et earum asperiores ipsam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Quis quia ab officiis sed eius et.",
            "description": "Optio corporis qui perspiciatis nesciunt perspiciatis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Sit quia nemo qui possimus.",
            "description": "Rerum voluptatem quia repellendus quo in delectus temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Magni ipsum et voluptate corporis.",
            "description": "Quia eligendi est qui nulla voluptatibus harum in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Eos tenetur repudiandae dolor cumque velit et est.",
            "description": "Ea occaecati omnis neque quaerat quia fugit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Quaerat veniam est officiis est ea voluptas sequi.",
            "description": "Eum dolorum aperiam quos tenetur corrupti qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Minus ipsa et pariatur aut suscipit.",
            "description": "Deserunt laborum aliquam veritatis dolores cum voluptas maiores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Molestiae atque recusandae qui explicabo vitae.",
            "description": "Hic in debitis ea eos vitae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Corporis qui illum explicabo similique.",
            "description": "Perferendis impedit id architecto quidem eius.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Sit eum necessitatibus itaque alias voluptatum quam.",
            "description": "Fugiat nostrum facilis iusto nobis deserunt facere.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Quo iusto mollitia voluptas ipsum quas dicta aliquam.",
            "description": "Consequatur ut alias non molestiae nesciunt sunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Dolorem ducimus alias perferendis dolorem nihil dolorem.",
            "description": "Consequatur quas tempora sequi saepe et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Ex sed quos est sit eius quo quasi.",
            "description": "Quia vitae voluptatibus ut autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Veniam iusto rerum aliquid autem.",
            "description": "Explicabo sit voluptate sint doloremque mollitia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
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
            "id": 1,
            "name": "Doloribus quam omnis ab pariatur.",
            "description": "Similique consequuntur quidem a dicta et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Nisi vel pariatur aut.",
            "description": "Eius ducimus fugit facere quia adipisci omnis soluta dolore.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Et id beatae laboriosam velit et inventore totam.",
            "description": "Aliquam sunt et perspiciatis iusto dolor dignissimos ea.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Nam sequi sit voluptate aut quia et.",
            "description": "Sunt autem possimus et sunt quas voluptas unde dolores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Rerum sint corporis est qui.",
            "description": "Non laudantium labore nihil rem distinctio eos.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Nemo quod explicabo sit ut exercitationem aspernatur molestiae.",
            "description": "Minus ea eveniet et minima iusto.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Odit hic aut magni beatae placeat incidunt molestiae.",
            "description": "Eveniet et officiis voluptates omnis ut assumenda.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Placeat rerum libero illum laborum.",
            "description": "Architecto at harum sit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Dolores unde aliquid molestiae nihil porro et.",
            "description": "Rem numquam beatae quis nam enim.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Inventore laboriosam pariatur corrupti ab voluptatem placeat assumenda veniam.",
            "description": "Iure consequatur soluta qui repudiandae ut.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Labore odio dolor minus veniam.",
            "description": "Minus saepe at magnam deserunt vero.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Corporis debitis corporis voluptatem odit est.",
            "description": "Ut magni doloremque ea nostrum et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 13,
            "name": "Officia velit dolorem officiis.",
            "description": "Eos eius quae et earum asperiores ipsam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 14,
            "name": "Quis quia ab officiis sed eius et.",
            "description": "Optio corporis qui perspiciatis nesciunt perspiciatis.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 15,
            "name": "Sit quia nemo qui possimus.",
            "description": "Rerum voluptatem quia repellendus quo in delectus temporibus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 16,
            "name": "Magni ipsum et voluptate corporis.",
            "description": "Quia eligendi est qui nulla voluptatibus harum in.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 17,
            "name": "Eos tenetur repudiandae dolor cumque velit et est.",
            "description": "Ea occaecati omnis neque quaerat quia fugit.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 18,
            "name": "Quaerat veniam est officiis est ea voluptas sequi.",
            "description": "Eum dolorum aperiam quos tenetur corrupti qui.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 19,
            "name": "Minus ipsa et pariatur aut suscipit.",
            "description": "Deserunt laborum aliquam veritatis dolores cum voluptas maiores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 20,
            "name": "Molestiae atque recusandae qui explicabo vitae.",
            "description": "Hic in debitis ea eos vitae.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 21,
            "name": "Corporis qui illum explicabo similique.",
            "description": "Perferendis impedit id architecto quidem eius.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 22,
            "name": "Sit eum necessitatibus itaque alias voluptatum quam.",
            "description": "Fugiat nostrum facilis iusto nobis deserunt facere.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 23,
            "name": "Quo iusto mollitia voluptas ipsum quas dicta aliquam.",
            "description": "Consequatur ut alias non molestiae nesciunt sunt.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 24,
            "name": "Dolorem ducimus alias perferendis dolorem nihil dolorem.",
            "description": "Consequatur quas tempora sequi saepe et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 25,
            "name": "Ex sed quos est sit eius quo quasi.",
            "description": "Quia vitae voluptatibus ut autem.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 26,
            "name": "Veniam iusto rerum aliquid autem.",
            "description": "Explicabo sit voluptate sint doloremque mollitia.",
            "image": "http:\/\/wajad.test\/default-icon.png"
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
            "id": 1,
            "name": "Vel velit recusandae fuga est nisi voluptatem quos.",
            "description": "Id quod mollitia in.",
            "image": "http:\/\/wajad.test\/\/tmp\/5481847958225977a51c43d1b86e6bcf.jpg"
        },
        {
            "id": 2,
            "name": "Eum aliquid delectus inventore.",
            "description": "Voluptate iste error cupiditate iste eligendi maiores.",
            "image": "http:\/\/wajad.test\/\/tmp\/707a76cb261703aa63236b4740f605c4.jpg"
        },
        {
            "id": 3,
            "name": "Laborum nisi a rerum molestiae non quo.",
            "description": "Libero quidem est aut doloribus nihil laudantium sequi.",
            "image": "http:\/\/wajad.test\/\/tmp\/f1de811a10579b612939ffc3c906f6e3.jpg"
        },
        {
            "id": 4,
            "name": "Aut vel ut qui praesentium ipsum cum.",
            "description": "Provident sit in aspernatur libero accusantium.",
            "image": "http:\/\/wajad.test\/\/tmp\/9a0234682b5608b73bddb9681e1203a7.jpg"
        },
        {
            "id": 5,
            "name": "Tenetur nulla ut quas non dolor.",
            "description": "Molestiae autem nihil sint accusamus sit cupiditate.",
            "image": "http:\/\/wajad.test\/\/tmp\/0fd75f66eeabe34078af5022f8d969c4.jpg"
        },
        {
            "id": 6,
            "name": "Vitae adipisci dolor autem libero.",
            "description": "Est eligendi vero itaque ipsa est inventore mollitia et.",
            "image": "http:\/\/wajad.test\/\/tmp\/009b927b2ac0338e4405fb6de1375b3e.jpg"
        },
        {
            "id": 7,
            "name": "Est autem voluptatem voluptatem quidem veniam est nihil.",
            "description": "Mollitia voluptas deleniti saepe consequatur quam odit eos ea.",
            "image": "http:\/\/wajad.test\/\/tmp\/eddec1683b7e5dc707a96460f056f58c.jpg"
        },
        {
            "id": 8,
            "name": "Dolor dolore minima magnam quibusdam.",
            "description": "Nihil impedit sint dolorem.",
            "image": "http:\/\/wajad.test\/\/tmp\/5e218854a9cba83e95489bf6a53a871e.jpg"
        },
        {
            "id": 9,
            "name": "Ipsum cum voluptatem autem ut ex hic.",
            "description": "Fugit omnis consectetur ut ut.",
            "image": "http:\/\/wajad.test\/\/tmp\/55e59a9ddb87a959a6ed24df7caf7e56.jpg"
        },
        {
            "id": 10,
            "name": "Impedit magni molestias aut saepe.",
            "description": "Eaque accusamus repudiandae voluptatibus molestiae ut saepe.",
            "image": "http:\/\/wajad.test\/\/tmp\/dae82643d361e9200926f902609158b5.jpg"
        },
        {
            "id": 11,
            "name": "Et sed quibusdam error ad quia recusandae ea.",
            "description": "Et autem aperiam facere ut voluptate nihil nam.",
            "image": "http:\/\/wajad.test\/\/tmp\/d53fdda98ad64c41a13a782bf69f2949.jpg"
        },
        {
            "id": 12,
            "name": "Magnam est minima ab praesentium.",
            "description": "Et pariatur amet eos aut.",
            "image": "http:\/\/wajad.test\/\/tmp\/5604fac832e5af9adc9c34b0816d9900.jpg"
        },
        {
            "id": 13,
            "name": "Ut nemo cumque quidem.",
            "description": "Doloribus saepe et iusto enim expedita ut.",
            "image": "http:\/\/wajad.test\/\/tmp\/6b651e739e5667f3c5cad317fa483d49.jpg"
        },
        {
            "id": 14,
            "name": "Deserunt error reprehenderit ipsa delectus.",
            "description": "Sunt fugiat et eligendi repellat autem.",
            "image": "http:\/\/wajad.test\/\/tmp\/55732492b6ec1d290a1fe94d8614e9a1.jpg"
        },
        {
            "id": 15,
            "name": "Veritatis deserunt dolorum illo cumque pariatur quasi.",
            "description": "Ab et nihil omnis ut vel corrupti aut.",
            "image": "http:\/\/wajad.test\/\/tmp\/7fb252cac7f35fdab31c2d3d59779042.jpg"
        },
        {
            "id": 16,
            "name": "Et quia ut cumque alias.",
            "description": "Voluptates ipsa perferendis porro.",
            "image": "http:\/\/wajad.test\/\/tmp\/b6fd730124675baa3feea5f02c69476f.jpg"
        },
        {
            "id": 17,
            "name": "Eligendi quia ratione incidunt quis consequatur.",
            "description": "Voluptatem voluptatem minus et magnam.",
            "image": "http:\/\/wajad.test\/\/tmp\/167f175413f5a630d6f7216466a91e40.jpg"
        },
        {
            "id": 18,
            "name": "Est alias vel ipsum iste architecto ut deleniti optio.",
            "description": "Libero natus adipisci nihil eum et illo labore.",
            "image": "http:\/\/wajad.test\/\/tmp\/ce008c43cd4d98f2fcc28a264a29f69c.jpg"
        },
        {
            "id": 19,
            "name": "Qui fugit rerum fugit temporibus.",
            "description": "Provident rerum voluptatem et rem sit.",
            "image": "http:\/\/wajad.test\/\/tmp\/5868d2400dd9ce092a6137b28348b20e.jpg"
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
            "id": 1,
            "name": "Quasi quasi possimus molestiae quia eligendi aut.",
            "description": "Vero minima exercitationem provident vel quibusdam quam maiores.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 2,
            "name": "Repudiandae occaecati ea autem vel cupiditate totam doloribus.",
            "description": "Laudantium ipsum asperiores tempore qui enim et quod.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 3,
            "name": "Illo consequatur aliquam ut fugit aut.",
            "description": "Odio fugiat voluptas fugiat sapiente ab.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 4,
            "name": "Quia maiores ipsam ipsa qui corporis et suscipit.",
            "description": "Rerum doloribus qui error soluta perferendis accusantium voluptate et.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 5,
            "name": "Adipisci est ducimus est illum.",
            "description": "Dolore eos voluptas placeat laborum.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 6,
            "name": "Ea corporis eos doloribus delectus et ipsa.",
            "description": "Dolor cum tempora laudantium minus.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 7,
            "name": "Eligendi inventore harum inventore tenetur quos repellat dolor.",
            "description": "Vero consequatur ut quo maxime facere nihil totam.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 8,
            "name": "Quos mollitia sunt ut earum dolores aut.",
            "description": "Quae maxime autem veritatis nihil nisi.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 9,
            "name": "Unde omnis omnis molestias ut voluptatibus.",
            "description": "Quia ducimus sequi deleniti id fugiat.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 10,
            "name": "Ducimus dolor omnis debitis est.",
            "description": "Ut voluptas incidunt recusandae atque.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 11,
            "name": "Qui voluptatem non nam dolorem sed.",
            "description": "Architecto doloremque maiores modi quo.",
            "image": "http:\/\/wajad.test\/default-icon.png"
        },
        {
            "id": 12,
            "name": "Libero voluptate repellat pariatur est earum.",
            "description": "Et consequatur minima sapiente dolorem sed atque.",
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
            "name": "Sit ut rerum repellat esse inventore ab.",
            "icon": ""
        },
        {
            "id": 2,
            "name": "Error placeat repudiandae labore est qui.",
            "icon": ""
        },
        {
            "id": 3,
            "name": "Laboriosam eveniet quia minus cum nesciunt.",
            "icon": ""
        },
        {
            "id": 4,
            "name": "Eveniet et est nobis optio enim.",
            "icon": ""
        },
        {
            "id": 5,
            "name": "At incidunt totam incidunt explicabo autem.",
            "icon": ""
        },
        {
            "id": 6,
            "name": "Asperiores architecto alias cupiditate voluptatem laboriosam.",
            "icon": ""
        },
        {
            "id": 7,
            "name": "Non ut voluptate mollitia nobis saepe molestiae.",
            "icon": ""
        },
        {
            "id": 8,
            "name": "Animi aut officia qui natus.",
            "icon": ""
        },
        {
            "id": 9,
            "name": "Quo ipsam omnis aut quia.",
            "icon": ""
        },
        {
            "id": 10,
            "name": "Et aut eos tempora excepturi delectus et.",
            "icon": ""
        },
        {
            "id": 11,
            "name": "Itaque ratione perspiciatis non ut vel sed.",
            "icon": ""
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
        "name": "Sit ut rerum repellat esse inventore ab.",
        "icon": ""
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
<!-- START_727da77b51e4f96916de138b4b71c037 -->
<h2>api/pages/{page?}</h2>
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
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "",
    "code": 404
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/pages/{page?}</code></p>
<!-- END_727da77b51e4f96916de138b4b71c037 -->
<!-- START_726b7bf93b3209836a1cbcda5b3b6703 -->
<h2>api/posts/{post}</h2>
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
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Post is not found.",
    "code": 404
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/posts/{post}</code></p>
<!-- END_726b7bf93b3209836a1cbcda5b3b6703 -->
<!-- START_f01269a1d8321c0c8787967b5346c585 -->
<h2>api/posts/add/{type}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://api.wajad.test/api/posts/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/posts/add/{type}</code></p>
<!-- END_f01269a1d8321c0c8787967b5346c585 -->
<!-- START_753caa181befa10f8d0e0f5ca0e5b46f -->
<h2>api/posts/{post}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
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
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT api/posts/{post}</code></p>
<!-- END_753caa181befa10f8d0e0f5ca0e5b46f -->
<!-- START_790d23dbb8c799c36c70f7133a51e7a5 -->
<h2>api/posts/{post}</h2>
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
<h3>HTTP Request</h3>
<p><code>DELETE api/posts/{post}</code></p>
<!-- END_790d23dbb8c799c36c70f7133a51e7a5 -->
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