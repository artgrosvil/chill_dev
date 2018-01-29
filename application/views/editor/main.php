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
	<!-- navigation start -->
	<?php $this->load->view('include/nav'); ?>
	<!-- navigation end -->
	<div class="row c-p-dev">
		<div class="col-lg-2 c-p-files">
			<h1>Source files</h1>
			<ul class="list-group" id="list_app_files">
				<?php foreach ($files->result() as $data): ?>
					<li class="list-group-item" id="file-<?= $data->id; ?>">
						<a href="javascript:void(0)" onclick="getDataFile(<?= $data->id; ?>, <?= $data->id_app; ?>, '<?= $data->name; ?>')"><?= $data->name; ?></a>
						<?php if ($data->name != 'index.php'): ?>
							<a href="javascript:void(0)" class="c-p-remove-icon" onclick="deleteFile(<?= $data->id; ?>, <?= $id_app; ?>)"><span
									class="glyphicon glyphicon-trash"></span></a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
				<li>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-c-p-add-file"><span>Add</span></button>
				</li>
			</ul>

			<h1>Icons</h1>
			<ul class="list-group" id="list_user_icons">
				<?php foreach ($icons->result() as $data): ?>
					<li class="list-group-item c-p-icon-action" id="icon-<?= $data->id; ?>">
						<a href=""><?= $data->name; ?></a>
						<a href="javascript:void(0)" class="c-p-remove-icon" onclick="deleteIcon(<?= $data->id; ?>, <?= $id_app; ?>)"><span
								class="glyphicon glyphicon-trash"></span></a>
					</li>
				<?php endforeach; ?>
				<li>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-c-p-add-icons"><span>Add</span></button>
				</li>
			</ul>

			<h1>Manage app</h1>
			<ul class="list-group">
				<li class="list-group-item"><a href="">Upload file (coming soon)</a></li>
				<li class="list-group-item"><a href="">Download project (coming soon)</a></li>
			</ul>
		</div>
		<div class="col-lg-10" id="full-screen-editor">
			<div class="row">
				<div class="col-lg-6 c-p-edit-settings-link">
					<div class="btn-group" role="group">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								File
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">New</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Close</a></li>
							</ul>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Edit
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#" data-toggle="modal" data-target="#c-p-editor-themes">Themes</a></li>
								<li><a href="#">Font</a></li>
								<li><a href="#">Font size</a></li>
							</ul>
						</div>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Find
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Find</a></li>
								<li><a href="#">Find next</a></li>
								<li><a href="#">Find previous</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Replace</a></li>
								<li><a href="#">Replace next</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div id="editor"></div>
					</div>
					<div class="form-group">
						<div class="btn-group pull-right" role="group">
							<button type="button" class="btn btn-success">
								<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-success" id="button-c-p-save-file" data-button-id-file="" data-button-id-app="" data-button-name-file="">
								<span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
								Save
							</button>
							<?php if ($status_exec == 0) : ?>
								<button type="button" class="btn btn-success">
									<span class="glyphicon glyphicon-play" aria-hidden="true"></span>
									Run project
								</button>
							<?php endif; ?>
							<?php if ($status_exec == 1) : ?>
								<button type="button" class="btn btn-success">
									<span class="glyphicon glyphicon-stop" aria-hidden="true"></span>
									Stop project
								</button>
							<?php endif; ?>
						</div
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- modals include start -->
<?php $this->load->view('include/apps/modals/add_icons'); ?>
<?php $this->load->view('include/editor/modals/add_file'); ?>
<?php $this->load->view('include/editor/modals/edit_name_file'); ?>
<?php $this->load->view('include/editor/modals/change_theme'); ?>
<?php $this->load->view('include/editor/modals/change_font'); ?>
<!-- modals include end -->

<!-- js start -->
<?php $this->load->view('include/js'); ?>
<!-- js end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.2/ace.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.2/theme-twilight.js"></script>
<script>
	var editor = ace.edit("editor");
	editor.getSession().setMode("ace/mode/php");
	editor.getSession().setMode("ace/mode/python");
	editor.getSession().setMode("ace/mode/ruby");
	editor.getSession().setTabSize(4);
	document.getElementById('editor').style.fontSize = '16px';
</script>
</body>
</html>