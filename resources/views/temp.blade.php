
<!DOCTYPE html>
<html lang="uk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Portal Буча</title>
		<link rel="icon" href="/favicon.ico">
		<!-- CSS FILES -->
		<link href="{{ mix('css/app.css')}}" rel="stylesheet">
	</head>
	<body>
		<!-- TOP -->
		<div class="top-wrap uk-position-relative uk-light uk-background-secondary">

			<!-- NAV -->
			<div class="nav" data-uk-sticky="cls-active: uk-background-primary uk-box-shadow-medium; top: 100vh; animation: uk-animation-slide-top">
				<div class="uk-container">
					<nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
						<div class="uk-navbar-left">
							<div class="uk-navbar-item uk-padding-remove-horizontal">
								<a class="uk-logo" title="Logo" href=""><img src="/logo.svg" alt="Logo"></a>
							</div>
						</div>
						<div class="uk-navbar-right">
							<ul class="uk-navbar-nav uk-visible@s">
								<li class="uk-visible@m"><a href="/"><i class="fas fa-home"></i></a></li>
								<li><a href="">Новини</a></li>
								<li>
									<a href="#">Проекти <i class="fas fa-angle-down uk-margin-small-left"></i></a>
									<div class="uk-navbar-dropdown">
										<ul class="uk-nav uk-navbar-dropdown-nav">
                      <li><a href="#">Новий проект</a></li>
											<li><a href="#">Проект 1</a></li>
                      <li><a href="#">Проект 2</a></li>
											<li><a href="#">Проект 3</a></li>
										</ul>
									</div>
								</li>
								<li><a href="">Контакти</a></li>
								<li class="uk-visible@m"><a href="#"><i class="fas fa-power-off uk-text-success"></i></a></li>
							</ul>
							<a class="uk-navbar-toggle uk-navbar-item uk-hidden@s" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
						</div>
					</nav>
				</div>
			</div>
			<!-- /NAV -->

			<div class="uk-cover-container uk-light uk-flex uk-flex-middle top-wrap-height">

        <!-- TOP CONTAINER -->
				<div class="uk-container uk-flex-auto top-container uk-position-relative uk-margin-medium-top" data-uk-parallax="y: 0,50; easing:0; opacity:0.2">
					<div class="uk-width-1-2@s" data-uk-scrollspy="cls: uk-animation-slide-right-medium; target: > *; delay: 150">
						<h6 class="uk-text-primary uk-margin-small-bottom">PORTAL - BUCHA</h6>
						<h1 class="uk-margin-remove-top">Зміни на краще вже сьогодні</h1>
						<p class="subtitle-text uk-visible@s">Долучись до соціальних ініціатив - допоможи своєму місту </p>
						<a href="#" title="Читати далі" class="uk-button uk-button-default" data-uk-scrollspy-class="uk-animation-fade">Читати далі</a>
					</div>
				</div>
				<!-- /TOP CONTAINER -->
        <!-- TOP IMAGE -->
				<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="main.jpeg" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0"
				>
				<!-- /TOP IMAGE -->
			</div>
			<div class="uk-position-bottom-center uk-position-medium uk-position-z-index uk-text-center">
				<a href="#content" data-uk-scroll="duration: 500"><i class="fas fa-arrow-down uk-text-large"></i></a>
			</div>
		</div>
		<!-- /TOP -->
		<section id="content" class="uk-section uk-section-default">
			<div class="uk-container">
				<div class="uk-section uk-section-small uk-padding-remove-top">
					<ul class="uk-subnav uk-subnav-pill uk-flex uk-flex-center" data-uk-switcher="connect: .uk-switcher; animation: uk-animation-fade">
						<li><a class="uk-button" style="background-color: #074C86"href="#">Знайомство</a></li>
						<li><a class="uk-button uk-button-default" href="#">Наша місія</a></li>
						<li><a class="uk-button uk-button-default" href="#">Проекти</a></li>
					</ul>
				</div>

				<ul class="uk-switcher uk-margin">
					<li>
						<div class="uk-grid uk-child-width-1-2@l uk-flex-middle" data-uk-grid data-uk-scrollspy="target: > div; cls: uk-animation-slide-left-medium">
							<div>
								<img data-src="/dum.jpg" alt="" uk-img>
							</div>
							<div data-uk-scrollspy-class="uk-animation-slide-right-medium">
								<h6 class="uk-text-primary">Заголовок</h6>
								<h2 class="uk-margin-small-top">Підзаголовок основна думка</h2>
								<p class="subtitle-text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation.
								</p>
								<div class="uk-grid uk-child-width-1-2@s" data-uk-grid>
									<div>
										<h4>Great stuff</h4>
										<p>Ut enim ad minim veniam, quis nostrud magna aliqua exercitation. <a href="">Читати далі.</a></p>
									</div>
									<div>
										<h4>Data analysis</h4>
										<p>Ut enim ad minim veniam, quis nostrud magna aliqua exercitation. <a href="">Читати далі.</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="uk-grid uk-child-width-1-2@l uk-flex-middle" data-uk-grid data-uk-scrollspy="target: > div; cls: uk-animation-slide-left-medium">
							<div>
								<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" alt="" data-uk-img>
							</div>
							<div data-uk-scrollspy-class="uk-animation-slide-right-medium">
								<h6 class="uk-text-primary">Заголовок</h6>
								<h2 class="uk-margin-small-top">Підзаголовок основна думка</h2>
								<p class="subtitle-text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation.
								</p>
								<div class="uk-grid uk-child-width-1-2@s" data-uk-grid>
									<div>
										<h4>Great stuff</h4>
										<p>Ut enim ad minim veniam, quis nostrud magna aliqua exercitation. <a href="">Читати далі.</a></p>
									</div>
									<div>
										<h4>Data analysis</h4>
										<p>Ut enim ad minim veniam, quis nostrud magna aliqua exercitation. <a href="">Читати далі.</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="uk-grid uk-child-width-1-2@l uk-flex-middle" data-uk-grid data-uk-scrollspy="target: > div; cls: uk-animation-slide-left-medium">
							<div>
								<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" alt="" data-uk-img>
							</div>
							<div data-uk-scrollspy-class="uk-animation-slide-right-medium">
								<h6 class="uk-text-primary">Заголовок</h6>
								<h2 class="uk-margin-small-top">Підзаголовок основна думка</h2>
								<p class="subtitle-text">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation.
								</p>
								<div class="uk-grid uk-child-width-1-2@s" data-uk-grid>
									<div>
										<h4>Great stuff</h4>
										<p>Ut enim ad minim veniam, quis nostrud magna aliqua exercitation. <a href="">Читати далі.</a></p>
									</div>
									<div>
										<h4>Data analysis</h4>
										<p>Ut enim ad minim veniam, quis nostrud magna aliqua exercitation. <a href="">Читати далі.</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>


			</div>
		</section>
		<section class="uk-section uk-section-secondary uk-section-large">
			<div class="uk-container">
				<div class="uk-grid uk-child-width-1-2@l uk-flex-middle">
					<div>
						<h6>PORTAL - BUCHA</h6>
						<h2 class="uk-margin-small-top uk-h1">Заголовок, заклик до дії ...</h2>
						<p class="subtitle-text">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.
						</p>
						<a href="#" class="uk-button uk-button-primary uk-border-pill" data-uk-icon="arrow-right">Читати далі</a>
					</div>
					<div data-uk-scrollspy="cls: uk-animation-fade">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
				</div>
			</div>
		</section>
		<section class="uk-cover-container overlay-wrap">
			<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="main2.jpg" alt="" data-uk-cover data-uk-img
			>
			<div class="uk-container uk-position-z-index uk-position-relative uk-section uk-section-xlarge uk-light">
				<div class="uk-grid uk-flex-right">

					<div class="uk-width-2-5@m" data-uk-parallax="y: 50,-50; easing: 0; media:@l">
						<h6>PORTAL</h6>
						<div class="uk-position-relative uk-visible-toggle uk-light" data-uk-slider="easing: cubic-bezier(.16,.75,.47,1)">
							<ul class="uk-slider-items uk-child-width-1-1">
								<li>
									<div data-uk-slider-parallax="opacity: 0.2,1,0.2">
										<h2 class="uk-margin-small-top">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor"</h2>
										<p class="uk-text-meta">Lorena Smith, founder of Some Cool Startup</p>
									</div>
								</li>
								<li>
									<div data-uk-slider-parallax="opacity: 0.2,1,0.2">
										<h2 class="uk-margin-small-top">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt "</h2>
										<p class="uk-text-meta">Lorena Smith, founder of Some Cool Startup</p>
									</div>
								</li>
								<li>
									<div data-uk-slider-parallax="opacity: 0.2,1,0.2">
										<h2 class="uk-margin-small-top">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt "</h2>
										<p class="uk-text-meta">Lorena Smith, founder of Some Cool Startup</p>
									</div>
								</li>
							</ul>
							<ul class="uk-slider-nav uk-dotnav uk-margin-top"><li></li></ul>

						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- BOTTOM -->
		<section class="uk-section uk-section-default">

			<div class="uk-container uk-container-xsmall uk-text-center uk-section uk-padding-remove-top">
				<h5 class="uk-text-primary">ДОСЯГНЕННЯ</h5>
				<h2 class="uk-margin-remove uk-h1">Плитки з короткою інформацією.</h2>
			</div>
			<div class="uk-container">
				<div class="uk-grid uk-grid-large uk-child-width-1-3@m" data-uk-grid data-uk-scrollspy="target: > div; delay: 150; cls: uk-animation-slide-bottom-medium">
					<div class="uk-text-center">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
						<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Lorem ipsum dolor sit amet</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
					</div>
					<div class="uk-text-center">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
						<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Lorem ipsum dolor sit amet</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
					</div>
					<div class="uk-text-center">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
						<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Lorem ipsum dolor sit amet</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
					</div>
					<div class="uk-text-center">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
						<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Lorem ipsum dolor sit amet</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
					</div>
					<div class="uk-text-center">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
						<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Lorem ipsum dolor sit amet</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
					</div>
					<div class="uk-text-center">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
						<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent">Lorem ipsum dolor sit amet</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
					</div>

				</div>
			</div>
		</section>
		<!-- BOTTOM -->
		<!-- LOGOS -->
		<div class="uk-section uk-section-small uk-section-muted">
			<div class="uk-container uk-container-small">
				<div class="uk-grid uk-child-width-1-4 uk-child-width-expand@m logos-grid" data-uk-grid data-uk-scrollspy="cls: uk-animation-scale-down; target: > div > img; delay: 100">
					<div>
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
					<div>
            <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/dum.jpg" data-uk-img alt="Image">
					</div>
				</div>
			</div>
		</div>
		<!-- /LOGOS -->
		<!-- FOOTER -->
		<footer class="uk-section uk-section-secondary uk-padding-remove-bottom">
			<div class="uk-container">
				<div class="uk-grid uk-grid-large" data-uk-grid>
					<div class="uk-width-1-2@m">
						<h5>Додаткова інформація</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip: <a href="#" title="">email@ukr.com</a></p>
						<div>
              <a href="#" class="uk-icon-button"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="uk-icon-button"><i class="fab fa-twitter"></i></a>
              <a href="#" class="uk-icon-button"><i class="fab fa-instagram"></i></a>
						</div>
					</div>
					<div class="uk-width-1-6@m">
						<h5>Проекти</h5>
						<ul class="uk-list">
              <li>Перший елемент</li>
              <li>Другий елемент</li>
              <li>Третій елемент</li>
							<li>Четвертий елемент</li>
						</ul>
					</div>
					<div class="uk-width-1-6@m">
						<h5>Діячі</h5>
						<ul class="uk-list">
              <li>Перший елемент</li>
              <li>Другий елемент</li>
              <li>Третій елемент</li>
							<li>Четвертий елемент</li>
						</ul>
					</div>
					<div class="uk-width-1-6@m">
						<h5>Активісти</h5>
						<ul class="uk-list">
              <li>Перший елемент</li>
              <li>Другий елемент</li>
              <li>Третій елемент</li>
							<li>Четвертий елемент</li>
						</ul>
					</div>

				</div>
			</div>

			<div class="uk-text-center uk-padding uk-padding-remove-horizontal">
				<span class="uk-text-small uk-text-muted">© 2019 Bucha-Portal - <a href="#">Smart link</a> | Make with <a href="#" title="Brain" target="_blank" data-uk-tooltip> <i class="fas fa-brain"></i> </a></span>
			</div>
		</footer>
		<!-- /FOOTER -->
		<!-- OFFCANVAS -->
		<div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: false">
			<div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
				<button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
				<ul class="uk-nav uk-nav-default">
					<li class="uk-active"><a href="#">Active</a></li>
					<li class="uk-parent">
						<a href="#">Parent</a>
						<ul class="uk-nav-sub">
							<li><a href="#">Sub item</a></li>
							<li><a href="#">Sub item</a></li>
						</ul>
					</li>
					<li class="uk-nav-header">Header</li>
					<li><a href="#js-options"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: table"></span> Item</a></li>
					<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: thumbnails"></span> Item</a></li>
					<li class="uk-nav-divider"></li>
					<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: trash"></span> Item</a></li>
				</ul>
				<h3>Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
		</div>
		<!-- /OFFCANVAS -->

		<!-- JS FILES -->
		<script src="{{ mix('js/app.js') }}"></script>
	</body>
</html>
