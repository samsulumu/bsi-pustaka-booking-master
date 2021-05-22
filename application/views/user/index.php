<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">List User</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- DataTales Example -->
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="d-flex justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">User DataTables</h6>
						<?= $this->session->userdata('is_admin') == 1 ? '<a href="'.site_url("user/create_view").'" class="btn btn-primary"><i class="fas fa-edit"></i> Create New User</a>' : '' ?>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Name</th>
									<th>Username</th>
									<th>Email</th>
									<th width="18%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($list_user as $key => $value) {?>
								<tr>
									<td><?= $value->name ?></td>
									<td><?= $value->username ?></td>
									<td><?= $value->email ?></td>
									<td>
										<div class="btn-group" role="group" aria-label="Action Button">
										<?php if($value->id == $this->session->userdata('user_id') || $this->session->userdata('is_admin') == 1) { ?>
											<a href="<?= site_url('user/edit_view/').$value->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
											<?php if($this->session->userdata('is_admin') == 1) { ?>
												<a href="<?= site_url('user/user_delete/').$value->id ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
											<?php } ?>
										<?php } ?>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->