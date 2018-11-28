<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield('pageName', 'System zarządzania konspektami') | foska.pl</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	{!! Html::Style('dist/css/bootstrap.min.css') !!}
	{!! Html::Style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
	{!! Html::Style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}
	{!! Html::Style('dist/css/AdminLTE.min.css') !!}
	{!! Html::Style('dist/css/skins/skin-blue.min.css') !!}
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="../../index2.html" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>O</b>AZA</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>OAZA</b> .app</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top" role="navigation">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					@if(Auth::check())
					<li class="user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<span class="hidden-xs">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
						</a>
					</li>
					@endif
					@if(Auth::check())
							<li>{{ Html::linkRoute('main.logout.get', 'Wyloguj się', [], []) }}</li>
					@else
						<li>{{ Html::linkRoute('main.login.get', 'Zaloguj się', [], []) }}</li>
						<li><a href='#'>Załóż konto</a></li>
					@endif
					
				</ul>
			</div>
		</nav>
	</header>

	<!-- =============================================== -->

	<aside class="main-sidebar">
		<section class="sidebar">
			<ul class="sidebar-menu">
				@include('template.main.menu')
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- =============================================== -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				@yield('pageName') <small>@yield('pageDesc')</small>
			</h1>
			{{--<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Examples</a></li>
				<li class="active">Blank page</li>
			</ol>--}}
		</section>

		<!-- Main content -->
		<section class="content">
			@yield('pageContent')
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			Powered by <em><strong>Laravel</strong> PHP Framework</em>.
		</div>
		Copyright &copy; 2016 by <em><strong>Kubas</strong></em>.
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>
		<!-- Tab panes -->

	</aside>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
			 immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
{!! Html::Script('dist/js/jQuery-2.1.4.min.js') !!}
{!! Html::Script('dist/js/bootstrap.min.js') !!}
{!! Html::Script('dist/js/app.min.js') !!}

@yield('scripts')
</body>
</html>

