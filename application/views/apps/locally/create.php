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
	<div class="row c-p-head">
		<div class="col-lg-12">
			<h1>Create app</h1>
		</div>
	</div>
	<div class="row c-p-app">
		<form class="form-horizontal" id="form-c-p-app-create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="col-lg-3 col-lg-offset-1 c-p-avatar">
				<img src="http://cdn.iamchill.co/statics/avatars/avatar.png">
				<a class="c-p-file-change">
					<span>change avatar</span>
					<input type="file" name="img" id="img">
				</a>
			</div>
			<div class="col-lg-7">
				<div class="form-group">
					<label for="name" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input id="id_app" name="id_app" value="<?= $id_app; ?>" hidden>
						<input type="text" class="form-control" id="name" name="name" placeholder="First app">
					</div>
				</div>
				<div class="form-group">
					<label for="id_category" class="col-lg-2 control-label">Category</label>
					<div class="col-lg-10">
						<select class="form-control" id="id_category" name="id_category">
							<?php foreach ($categories->result() as $data): ?>
								<option value="<?= $data->id; ?>"><?= $data->title; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="api_key" class="col-lg-2 control-label">API key</label>
					<div class="col-lg-10">
						<div class="input-group">
							<input type="text" class="form-control" id="api_key" name="api_key" placeholder="<?= $api_key; ?>" disabled>
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="button">Copy</button>
                            </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="status" class="col-lg-2 control-label">Status</label>
					<div class="col-lg-10">
						<select class="form-control" id="status" name="status">
							<option value="0" selected="selected">Not published</option>
							<option value="1">Published</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="type" class="col-lg-2 control-label">Type app</label>
					<div class="col-lg-10">
						<?php if ($type_app == 'locally'): ?>
							<input type="text" class="form-control" id="type" name="type" placeholder="Locally" disabled>
						<?php endif; ?>
						<?php if ($type_app == 'cloud'): ?>
							<input type="text" class="form-control" id="type" name="type" placeholder="Cloud" disabled>
						<?php endif; ?>
						<?php if ($type_app == 'blocks'): ?>
							<input type="text" class="form-control" id="type" name="type" placeholder="Blocks" disabled>
						<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-lg-2 control-label">Description</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="4" id="description" name="description" placeholder="140 symbols"></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- icons include start -->
	<?php $this->load->view('include/apps/icons'); ?>
	<!-- icons include end -->

	<div class="row c-p-submit-app">
		<div class="col-lg-1 col-lg-offset-10">
			<button type="button" class="btn btn-success" id="button-c-p-app-create">Save</button>
		</div>
	</div>
</div>

<!-- modals include start -->
<?php $this->load->view('include/apps/modals/add_icons'); ?>
<!-- modals include end -->

<!-- js start -->
<?php $this->load->view('include/js'); ?>
<!-- js end -->
<script>
	$(window).bind('beforeunload', function () {
		return "Please finish sign up to create your app.";
	});
</script>
</body>
</html>