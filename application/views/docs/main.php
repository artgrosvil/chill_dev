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
<div class="container">
	<!-- navigation start -->
	<?php $this->load->view('include/nav'); ?>
	<!-- navigation end -->
	<div class="row c-p-docs">
		<div class="col-lg-7 col-lg-offset-1">
			<h2>Авторизация</h2>
			<p>После создания приложения, Вы получите ID приложения и API KEY, который нужно отправлять в заголовках всех обращений к
				методам API. Ключ API можно найти в настройках приложения.</p>
			<p>В случаи отправки неправильного API ключа, Вы получите следующую ошибку:</p>
			<code>
				{"status": false,"error": "Invalid API key @api-key@"}
			</code>

		</div>
		<div class="col-lg-3">
			<a href="/docs" class="btn btn-success btn-block" role="button">Авторизация</a>
			<a href="/docs/messages" class="btn btn-success btn-block" role="button">Отправка сообщений</a>
			<a href="/docs/notifications" class="btn btn-success btn-block" role="button">Отправка нотификаций</a>
		</div>
	</div>
</div>

<!-- js start -->
<?php $this->load->view('include/js'); ?>
<!-- js end -->
</body>
</html>