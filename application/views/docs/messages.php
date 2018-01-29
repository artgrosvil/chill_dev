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
			<h2>Отправка сообщений</h2>

			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">POST</span>
				<input type="text" class="form-control" aria-describedby="basic-addon1"
				       placeholder="http://dev.iamchill.co/api/v1/messages/index">
			</div>

			<h2>Header</h2>
			<table class="table">
				<thead>
				<tr>
					<th>Field</th>
					<th>Type</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>X-API-KEY</td>
					<td>String</td>
					<td>API key</td>
				</tr>
				</tbody>
			</table>

			<h2>Parameter</h2>
			<table class="table">
				<thead>
				<tr>
					<th>Field</th>
					<th>Type</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>id_app</td>
					<td>Number</td>
					<td>App unique ID.</td>
				</tr>
				<tr>
					<td>content</td>
					<td>String</td>
					<td>Name content.</td>
				</tr>
				<tr>
					<td>type</td>
					<td>String</td>
					<td>Type content.</td>
				</tr>
				<tr>
					<td>text</td>
					<td>String</td>
					<td>Text message.</td>
				</tr>
				</tbody>
			</table>

			<h2>Success 200</h2>
			<table class="table">
				<thead>
				<tr>
					<th>Field</th>
					<th>Type</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>status</td>
					<td>String</td>
					<td>String status.</td>
				</tr>
				<tr>
					<td>response</td>
					<td>Object</td>
					<td>Object data.</td>
				</tr>
				<tr>
					<td>id_sender</td>
					<td>Number</td>
					<td>App sender content unique ID.</td>
				</tr>
				<tr>
					<td>content</td>
					<td>String</td>
					<td>Content message.</td>
				</tr>
				<tr>
					<td>type</td>
					<td>String</td>
					<td>Type message.</td>
				</tr>
				<tr>
					<td>text</td>
					<td>String</td>
					<td>API key</td>
				</tr>
				</tbody>
			</table>

			<code>
				HTTP/1.1 200 OK
				{
				"status": "success",
				"response":
				{
				"id_sender":
				"id_recipient":
				"content":
				"type":
				"text":
				"type_message":
				}
				}
			</code>

			<h2>Error 4xx</h2>
			<table class="table">
				<thead>
				<tr>
					<th>Field</th>
					<th>Type</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>status</td>
					<td>String</td>
					<td>String status.</td>
				</tr>
				<tr>
					<td>response</td>
					<td>Object</td>
					<td>Object data.</td>
				</tr>
				<tr>
					<td>id_sender</td>
					<td>Number</td>
					<td>App sender content unique ID.</td>
				</tr>
				<tr>
					<td>content</td>
					<td>String</td>
					<td>Content message.</td>
				</tr>
				<tr>
					<td>type</td>
					<td>String</td>
					<td>Type message.</td>
				</tr>
				<tr>
					<td>text</td>
					<td>String</td>
					<td>API key</td>
				</tr>
				</tbody>
			</table>
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