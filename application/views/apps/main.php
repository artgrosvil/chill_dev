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
	<div class="row c-p-boxs">
		<div class="col-lg-3 c-p-box">
			<h2>Develop locally</h2>
			<p>Create apps <br> using your own servers</p>
			<a href="<?= base_url('app/create/locally'); ?>" class="btn btn-success" role="button">Create</a>
		</div>
		<div class="col-lg-3 c-p-box">
			<h2>Develop with cloud</h2>
			<p>Create apps <br> within Chill cloud</p>
			<a href="<?= base_url('app/create/cloud'); ?>" class="btn btn-success" role="button">Create</a>
		</div>
		<div class="col-lg-3 c-p-box" style="border: 1px solid #9b9b9b;">
			<h2 style="color: #9b9b9b;">Blocks</h2>
			<p>Create apps <br> in a few clicks</p>
			<a href="<?= base_url('#'); ?>" class="btn btn-success" role="button"
			   style="background-color: #9b9b9b; border-color: #9b9b9b;">Coming soon</a>
		</div>
	</div>

	<div class="row c-p-apps">
		<div class="col-lg-12">
			<?php if ($apps->num_rows() == 0): ?>
				<h2>Your apps will be here</h2>
			<?php else: ?>
				<table id="table_apps" class="table table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Name app</th>
						<th>Type</th>
						<th>Category</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($apps->result() as $data): ?>
						<tr id="app-<?= $data->id_app; ?>" <?php if ($data->finished == 0): ?>class="c-p-no-finished-app" <?php endif; ?>>
							<td><?= $data->id_app; ?></td>
							<td><?= $data->name_app; ?></td>
							<?php if ($data->type == 'locally'): ?>
								<td>Locally</td>
							<?php endif; ?>
							<?php if ($data->type == 'cloud'): ?>
								<td>Cloud</td>
							<?php endif; ?>
							<?php if ($data->type == 'blocks'): ?>
								<td>Blocks</td>
							<?php endif; ?>
							<td><?= $data->title; ?></td>
							<?php if ($data->status == 0): ?>
								<td>Not published</td>
							<?php endif; ?>
							<?php if ($data->status == 1): ?>
								<td>Published</td>
							<?php endif; ?>
							<td class="c-p-icon-action">
								<a href="javascript:void(0)" onclick="deleteApp(<?= $data->id_app; ?>)"><span
										class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								<a href="/app/<?= $data->id_app; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
								<?php if ($data->type == 'cloud'): ?>
									<a href="/app/editor/<?= $data->id_app; ?>"><span class="glyphicon glyphicon-console"
									                                                  aria-hidden="true"></span></a>
								<?php endif; ?>
								<?php if ($data->type == 'blocks'): ?>
									<a href="/app/blocks/<?= $data->id_app; ?>"><span class="glyphicon glyphicon-console"
									                                                  aria-hidden="true"></span></a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
	</div>
</div>

<!-- js start -->
<?php $this->load->view('include/js'); ?>
<!-- js end -->
</body>
</html>