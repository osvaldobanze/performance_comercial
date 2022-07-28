
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Osvaldo Silvestre Banze"> 
		<title>Comercial - Performance Comercial</title> 
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!-- Custom styles for this template -->
		<link rel="stylesheet" href="{{ asset('css/cust.css') }}">  


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


		<script>
			var SITE_URL = "{{ URL::to('/') }}";
		</script>
    </head>
    <body>
    
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
			<div class="navbar-nav">
				<div class="nav-item text-nowrap">
				<a class="nav-link px-3" href="#">Sign out</a>
				</div>
			</div>
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3 sidebar-sticky">
						{{-- <ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">
								<span data-feather="home" class="align-text-bottom"></span>
								Dashboard
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<span data-feather="file" class="align-text-bottom"></span>
								Orders
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<span data-feather="shopping-cart" class="align-text-bottom"></span>
								Products
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<span data-feather="users" class="align-text-bottom"></span>
								Customers
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<span data-feather="bar-chart-2" class="align-text-bottom"></span>
								Reports
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
								<span data-feather="layers" class="align-text-bottom"></span>
								Integrations
								</a>
							</li>
						</ul> --}}

						<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
						<span>Relatorios</span>
							<a class="link-secondary" href="#" aria-label="Add a new report">
								<span data-feather="plus-circle" class="align-text-bottom"></span>
							</a>
						</h6>
						<ul class="nav flex-column mb-2">

							<li class="nav-item">
								<a class="nav-link" href="">
									<span data-feather="bar-chart" class="align-text-bottom"></span>
									Por Cliente
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('cs_report') }}">
									<span data-feather="layers" class="align-text-bottom"></span>
									Por Consultor
								</a>
							</li>
							 
						</ul>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					@yield('content')
				</main>
			</div>
        </div>
		
		 
		<script src="{{ asset('js/custom.js') }}"></script>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
		</script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
		</script> 

		<script src="{{ asset('js/dashboard.js') }}"></script>

		<script>
			$(document).ready(function() {
				$('.multiple').select2({
					allowClear: true,
					width: '300px',
					height: '34px',
					placeholder: 'select..'
				});
 
			});
		</script>

    </body>
</html>
