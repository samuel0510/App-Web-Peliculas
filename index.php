<?php
	//require 'api.php';
	$new = file_get_contents('https://api.themoviedb.org/3/movie/top_rated?api_key=5b812339ff5a7fd950dc41d20c6754c8&language=en-US&page=1');
	$new = json_decode($new,true)["results"];

	$popular = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=5b812339ff5a7fd950dc41d20c6754c8&language=en-US&page=1');
	$popular = json_decode($popular,true)["results"];

	$upcoming = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key=5b812339ff5a7fd950dc41d20c6754c8&language=en-US&page=1');
	$upcoming = json_decode($upcoming,true)["results"];

	//print_r($new[0]);
	//exit;
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Movies</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/styles.css">

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/script.js"></script>


	<!-- Demo styles -->
	<style>



	</style>
</head>
<body>
	<div class="wrapper">

		<header class="header">
			<figure class="logo"><a href="index.html"><img src="img/logo.png" alt="Logo"></figure></a>
			<nav class="menu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a>Genres</a>
						<ul>
							<li><a href="genre.html">Action</a></li>
							<li><a href="genre.html">Comedy</a></li>
							<li><a href="genre.html">Drama</a></li>
							<li><a href="genre.html">Romance</a></li>
						</ul>
					</li>
					<li><a>Year</a>
						<ul>
							<li><a href="year.html">2017</a></li>
							<li><a href="year.html">2016</a></li>
							<li><a href="year.html">2015</a></li>
							<li><a href="year.html">2014</a></li>
						</ul>
					</li>
					<li><a>Language</a>
						<ul>
							<li><a href="language.html">English</a></li>
							<li><a href="language.html">German</a></li>
						</ul>
					</li>
					<li><a href="mostwatched.html">Most Watched</a></li>
					<li class="mobsearch">
						<form class="mobform">
							<input type="text" name="s" class="mobsearchfield" placeholder="Search...">
							<input type="submit" value="" class="mobsearchsubmit">
						</form>
					</li>
				</ul>
			</nav>
			<form class="search">
				<input type="text" name="s" class="searchfield" placeholder="Search...">
				<input type="submit" value="" class="searchsubmit">
			</form>

			<div class="toggle"><img src="img/menu.svg"></div>
		</header>
		<!-- Swiper -->
		<div class="homeslider">
			<div class="swiper-container">

				<div class="swiper-wrapper">
					<?php

					foreach ($upcoming as $movie ) {
						echo '<div class="swiper-slide">
						<img src="https://image.tmdb.org/t/p/w780'.$movie['backdrop_path'].'">
						<div class="caption">
							<div class="captioninside">
								<h3>'.$movie['title'].'</h3>
								<p>'.$movie['overview'].'</p>
								<a href="movie.php?id='.$movie['id'].'" class="playbutton">Play</a>
							</div>
						</div>
					</div>';
						
					}


					?>


				</div>



				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<main class="content">
			<section class="panel">
				<h2> Proximos extrenos</h2>
				<div class="recentslider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							
						<?php
								foreach ($upcoming as $movies ) {
									echo '<div class="swiper-slide"><a href="movie.php?id='.$movies['id'].'"><img src="https://image.tmdb.org/t/p/w185'.$movies['poster_path'].'"><h3 class="hometitle">'.$movies['title'].'</h3></a></div>';
								}
						?>

							<div class="swiper-slide"><a href="mostwatched.html"><img src="img/others.png"></a></div>
						</div>
						<div class="nextdirection recent-next"><img src="img/right-arrow.svg"> </div>
						<div class="leftdirection recent-prev"><img src="img/left-arrow.svg"> </div>
					</div>
				</div>
			</section>

			<section class="panel">
				<h2>Las mas populares</h2>
				<div class="mostslider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
						
						<?php
								foreach ($popular as $movies ) {
									echo '<div class="swiper-slide"><a href="movie.php?id='.$movies['id'].'"><img src="https://image.tmdb.org/t/p/w185'.$movies['poster_path'].'"><h3 class="hometitle">'.$movies['title'].'</h3></a></div>';
								}
						?>

							<div class="swiper-slide"><a href="mostwatched.html"><img src="img/others.png"></a></div>
						</div>
						<div class="nextdirection most-next"><img src="img/right-arrow.svg"> </div>
						<div class="leftdirection most-prev"><img src="img/left-arrow.svg"> </div>
						<!-- Add Pagination -->
					</div>
				</div>
			</section>

			<section class="panel">
				<h2>Pelicula mas valoradas</h2>
				<div class="topslider">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<?php
								foreach ($new as $movies ) {
									echo '<div class="swiper-slide"><a href="movie.php?id='.$movies['id'].'"><img src="https://image.tmdb.org/t/p/w185'.$movies['poster_path'].'"><h3 class="hometitle">'.$movies['title'].'</h3></a></div>';
								}
							?>

							<div class="swiper-slide"><a href="mostwatched.html"><img src="img/others.png"></a></div>
						</div>
						<div class="nextdirection top-next"><img src="img/right-arrow.svg"> </div>
						<div class="leftdirection top-prev"><img src="img/left-arrow.svg"> </div>
						<!-- Add Pagination -->
					</div>
				</div>
			</section>

			
		</main>

		<footer class="footer">
			<div class="copyright"><p>Copyright &copy 2017 www.focusoncode.com</p></div>
			<div class="footermenu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="terms.html">Terms and conditions</a></li>
				</ul>
			</div>
			<div class="tags">
				<ul>
					<li>Watch Free Movies Trailers</li>
					<li>Movie Trailers</li>
					<li>English Subtitled Movies Trailers</li>
					<li>Latest Movies Trailers</li>
					<li>New Movies Trailers</li>

				</ul>
			</div>

		</footer>

		<!-- Swiper JS -->
		<script src="js/swiper.min.js"></script>

		<!-- Initialize Swiper -->
		<script>
			$(document).ready(function(){


				var swiper = new Swiper('.homeslider > .swiper-container', {
					pagination: '.swiper-pagination',
					paginationClickable: true,
					preventClicks:false,
					preventClicksPropagation:false,
					effect:'fade',
					breakpoints: {
						320: {
							height:200
						},

						480: {
							height:300
						},

						768: {
							height:400
						},
						1024: {
							height:500
						}
					}
				});

				var recentswiper = new Swiper('.recentslider > .swiper-container', {
					nextButton: '.recent-next',
					prevButton: '.recent-prev',
					slidesPerView: 8,
					paginationClickable: true,
					preventClicks:false,
					preventClicksPropagation:false,
					spaceBetween: 10,
					breakpoints: {
						320: {
							slidesPerView: 3,
							spaceBetween: 5
						},

						480: {
							slidesPerView: 3,
							spaceBetween: 5
						},

						768: {
							slidesPerView: 5,
							spaceBetween: 5
						},
						1024: {
							slidesPerView: 6,
							spaceBetween: 10
						}
					}
				});

				var mostswiper = new Swiper('.mostslider > .swiper-container', {
					nextButton: '.most-next',
					prevButton: '.most-prev',
					slidesPerView: 8,
					paginationClickable: true,
					preventClicks:false,
					preventClicksPropagation:false,
					spaceBetween: 10,
					breakpoints: {
						320: {
							slidesPerView: 3,
							spaceBetween: 5
						},

						480: {
							slidesPerView: 3,
							spaceBetween: 5
						},

						768: {
							slidesPerView: 5,
							spaceBetween: 5
						},
						1024: {
							slidesPerView: 6,
							spaceBetween: 10
						}
					}
				});

				var topswiper = new Swiper('.topslider > .swiper-container', {
					nextButton: '.top-next',
					prevButton: '.top-prev',
					slidesPerView: 8,
					paginationClickable: true,
					preventClicks:false,
					preventClicksPropagation:false,
					spaceBetween: 10,
					breakpoints: {
						320: {
							slidesPerView: 3,
							spaceBetween: 5
						},

						480: {
							slidesPerView: 3,
							spaceBetween: 5
						},

						768: {
							slidesPerView: 5,
							spaceBetween: 5
						},
						1024: {
							slidesPerView: 6,
							spaceBetween: 10
						}
					}
				});

			});

			
		</script>


	</div>
</body>
</html>