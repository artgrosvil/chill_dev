<div class="modal fade" id="modal-c-p-add-file" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header pull-center">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<h2 class="modal-title">Add file</h2>
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="row c-p-add-file-modal">
					<div class="col-lg-8 col-lg-offset-2">
						<form class="form-horizontal" id="form-c-p-add-file" method="post" accept-charset="utf-8">
							<div class="form-group">
								<div class="col-lg-12">
									<input type="text" id="id_app" name="id_app" value="<?= $id_app; ?>" hidden>
									<input type="text" class="form-control" id="file_name" name="file_name" placeholder="Name">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<button type="button" class="btn btn-success" id="button-c-p-add-file">Add</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>