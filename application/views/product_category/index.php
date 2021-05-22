<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">List Category</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- DataTales Example -->
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="d-flex justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Category DataTables</h6>
						<?= $this->session->userdata('is_admin') == 1 ? '<a href="'. site_url('productcategory/create_view') .'" class="btn btn-primary"><i class="fas fa-edit"></i> Create New Category</a>' : '' ?>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Category Name</th>
									<th>Description</th>
									<th width="18%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($list_product as $key => $value) {?>
								<tr>
									<td><?= $value->name ?></td>
									<td><?= $value->description ?></td>
									<td>
									<div class="btn-group" role="group" aria-label="Action Button">
										<?php if($this->session->userdata('is_admin') == 1) { ?>
											<a href="<?= site_url('productcategory/edit_view/').$value->id ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
											<a href="<?= site_url('productcategory/category_delete/').$value->id ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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