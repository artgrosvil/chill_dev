<div class="modal fade" id="modal-c-p-add-icons" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header pull-center">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<h2 class="modal-title">Add icons</h2>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row c-p-icons-table">
					<div class="col-lg-12">
						<table id="table_icons" class="table table-hover">
							<thead>
							<tr>
								<th>#</th>
								<th>Name icon</th>
								<th>Description</th>
								<th>Emoji</th>
								<th>Icon</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($all_icons->result() as $data): ?>
								<tr>
									<td><?= $data->id; ?></td>
									<td><?= $data->name; ?></td>
									<td><?= $data->description; ?></td>
									<td><?= $data->bytes; ?></td>
									<td><img src="<?= $data->size42; ?>"></td>
									<td>
										<button type="submit" class="btn btn-link" onclick="addIcon(<?= $data->id; ?>, <?= $id_app; ?>)">Add</button>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>