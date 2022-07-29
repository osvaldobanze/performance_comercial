
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Osvaldo Silvestre Banze"> 
		<title>Comercial - Performance Comercial</title> 
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        
		<!-- Custom styles for this site -->
		<link rel="stylesheet" href="{{ asset('css/cust.css') }}">  
		<link rel="stylesheet" href="{{ asset('select/2/vanillaSelectBox.css') }}" />
		<script> var SITE_URL = "{{ URL::to('/') }}"; </script>
 


    </head>
    <body>
    
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><img src="{{ asset('agence.png') }}" alt=""></a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="pesquisar....." aria-label="Search">
			<div class="navbar-nav">
				<div class="nav-item text-nowrap">
				<a class="nav-link px-3" href="#">Sair <i class="fa fa-sign-out" aria-hidden="true"></i></a>
				</div>
			</div>
		</header>

		<div class="container-fluid">
			<div class="row">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
					<div class="position-sticky pt-3 sidebar-sticky">

						<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
						<span>Relatorios</span> <hr>
							<a class="link-secondary" href="#" aria-label="Add a new report">
								<span data-feather="plus-circle" class="align-text-bottom"></span>
							</a>
						</h6>
						<ul class="nav flex-column mb-2">

							<li class="nav-item">
								<a class="nav-link" href="{{ route('cl_report') }}">
									<span data-feather="bar-chart" class="align-text-bottom"></span>
									<i class="fa fa-user" aria-hidden="true"></i> Por Cliente 
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('cs_report') }}">
									<span data-feather="layers" class="align-text-bottom"></span>
									<i class="fa fa-address-book"></i> Por Consultor
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


		<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="https://use.fontawesome.com/527e3803fd.js"></script>
		<script src="{{ asset('select/2/vanillaSelectBox.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
		<script src="{{ asset('js/dashboard.js') }}"></script>
    </body>
</html>
