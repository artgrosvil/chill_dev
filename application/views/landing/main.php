<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="icon" href="http://cdn.iamchill.co/design/img/favicon.ico">

	<title>Chill - the way we communicate is about to change</title>

	<!-- css start -->
	<?php $this->load->view('include/css'); ?>
	<!-- css end -->
</head>
<body>
<div class="container-fluid">
	<div class="row c-p-nav">
		<div class="col-xs-6">
			<h2><a href="http://store.iamchill.co/" target="_blank">Store</a></h2>
			<h2><a href="http://iamchill.co/" target="_blank">Chill</a></h2>
		</div>
		<div class="col-xs-1 col-xs-offset-5">
			<img src="http://cdn.iamchill.co/design/img/logo_mini.png">
		</div>
	</div>
</div>
<div class="container">
	<div class="row c-p-l">
		<div class="col-lg-5 col-lg-offset-1 c-p-l-auth">
			<div class="row">
				<div class="col-lg-12">
					<h2>Be the first to test Chill Platform</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-lg-offset-2">
					<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#c-l-p-auth">Sign in
					</button>
				</div>
				<div class="col-lg-4">
					<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#c-l-p-reg">Sign up
					</button>
				</div>
			</div>
		</div>
		<div class="col-lg-6 c-p-l-des">
			<div class="row">
				<div class="col-lg-12">
					<h2>Build notification based apps in minutes</h2>
				</div>
			</div>
			<div class="row c-p-l-ex">
				<div class="col-lg-5">
					<span>Your favourite team scores?</span>
				</div>
				<div class="col-lg-1">
					<span>></span>
				</div>
				<div class="col-lg-1">
					<img src="http://cdn.iamchill.co/design/img/icon1.png">
				</div>
				<div class="col-lg-3">
					<span>#anderson</span>
				</div>
			</div>
			<div class="row c-p-l-ex">
				<div class="col-lg-5">
					<span>Need a weather update?</span>
				</div>
				<div class="col-lg-1">
					<span>></span>
				</div>
				<div class="col-lg-1">
					<img src="http://cdn.iamchill.co/design/img/icon3.png">
				</div>
				<div class="col-lg-3">
					<span>#20C</span>
				</div>
			</div>
			<div class="row c-p-l-ex">
				<div class="col-lg-5">
					<span>Reached a milestone?</span>
				</div>
				<div class="col-lg-1">
					<span>></span>
				</div>
				<div class="col-lg-1">
					<img src="http://cdn.iamchill.co/design/img/icon2.png">
				</div>
				<div class="col-lg-3">
					<span>#10000</span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="c-l-p-auth" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row pull-center">
					<div class="col-lg-8 col-lg-offset-2">
						<h2 class="modal-title">Sign in to Chill Cloud Platform</h2>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row c-p-l-auth-modal">
					<div class="col-lg-8 col-lg-offset-2">
						<form class="form-horizontal" id="form-c-l-p-auth" method="post" accept-charset="utf-8">
							<div class="form-group">
								<div class="col-lg-12">
									<input type="email" class="form-control" id="email" name="email"
									       placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<input type="password" class="form-control" id="password" name="password"
									       placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<button type="button" class="btn btn-success" id="button-c-l-p-auth">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="c-l-p-reg" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row pull-center">
					<div class="col-lg-8 col-lg-offset-2">
						<h2 class="modal-title">Sign up to Chill Cloud Platform</h2>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row c-p-l-auth-modal">
					<div class="col-lg-8 col-lg-offset-2">
						<form class="form-horizontal" id="form-c-l-p-reg" method="post" accept-charset="utf-8">
							<div class="form-group">
								<div class="col-lg-12">
									<input type="email" class="form-control" id="email" name="email"
									       placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<input type="password" class="form-control" id="password" name="password"
									       placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<button type="button" class="btn btn-success" id="button-c-l-p-reg">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- js start -->
<?php $this->load->view('include/js'); ?>
<!-- js end -->
</body>
</html>