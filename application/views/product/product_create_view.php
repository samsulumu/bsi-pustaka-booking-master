<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- DataTales Example -->
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="d-flex justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Product Create Form</h6>
					</div>
				</div>
				<div class="card-body">
                <?php 
                if(validation_errors())
                {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($this->session->flashdata("error")) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata("error"); ?>
                    </div>
                    <?php
                }
                ?>
                    <form class="form-signin" method="POST" action="<?= site_url('product/product_create') ?>">
                        <div class="form-label-group">
                            <label for="inputEmail">Product Name</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="Product Name" name="name"
                            value="<?= $product->name ?? "" ?>" required>
                        </div>

                        <div class="form-label-group">
                            <label for="listCategory">List Category</label>
                            <select class="custom-select" id="listCategory" name="category_id" required>
                            <?php if($product) { ?>
                            <?= "<option value=".$product->category_id." selected>".$product->category_name."</option>" ?>
                            <?php } else { ?>
                                <option selected>Chose...</option>
                            <?php } ?>
                            <?php foreach ($list_category as $value)
                            {
                            ?>
                                <option value="<?= $value->id ?>"><?= $value->name ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
    
                        <div class="form-label-group">
                            <label for="inputEmail">Product Description</label>
                            <textarea id="inputEmail" class="form-control"
                                name="description" required><?= $product->description ?? "" ?></textarea>
                        </div>
    
                        <hr class="my-4">
    
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
                    </form>
                </div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->