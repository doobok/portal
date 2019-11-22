<!DOCTYPE html>
<html lang="uk">

	@include('layouts.partials.seohead')

	<body>
		
		<div id="app">

		@include('layouts.partials.topnav')

			@yield('content')

		@include('layouts.partials.footer')

		@include('layouts.partials.offcanvas')

		</div>

		<script src="{{ mix('js/app.js') }}"></script>

	</body>
</html>
