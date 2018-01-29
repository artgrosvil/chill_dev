<div class="row c-p-head">
	<div class="col-lg-9">
		<h1>Icons</h1>
	</div>
	<div class="col-lg-3">
		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal-c-p-add-icons">+ Add icons</button>
	</div>
</div>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		<table id="table_user_icons" class="table table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Name icon</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($icons->result() as $data): ?>
				<tr id="icon-<?= $data->id; ?>">
					<td><?= $data->id; ?></td>
					<td><?= $data->name; ?></td>
					<td><?= $data->description; ?></td>
					<td>
						<a href="javascript:void(0)" onclick="deleteIcon(<?= $data->id; ?>, <?= $id_app; ?>)"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>