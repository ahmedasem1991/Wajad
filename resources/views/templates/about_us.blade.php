<!DOCTYPE HTML>
<!--
	Binary by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
	<title>{{ $page->meta_title }}</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="{{ $page->meta_description }}">
		<meta name="og:title" content="{{ $page->meta_title }}">
		<meta name="og:description" content="{{ $page->meta_description }}">
		<meta name="og:image" content="{{ !empty($page->og_image) ? url($page->og_image) : null }}">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="template-{{ $page->template }} page-{{ $page->slug }}">

		<!-- Header -->
			<header id="header">
			<h1>{{ $page->title }}</h1>
			 
			</header>

		<!-- Nav -->
 

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<div class="image fit">
						<img src="images/pic11.jpg" alt="" />
					</div>
					<header>
					<h1>{{ $page->title }}</h1>
					 
					</header>
					<div class="content">
			{!! $page->sanitizedContent !!}
		</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				</ul>
				<div class="copyright">
					&copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a>.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>