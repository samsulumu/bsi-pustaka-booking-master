<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit User</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- DataTales Example -->
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<div class="d-flex justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">User Edit Form</h6>
					</div>
				</div>
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
				<div class="card-body">
                    <form class="form-signin" method="POST" action="<?= site_url('user/user_edit/'.$user->id) ?>">
                        <div class="form-label-group">
                            <label for="inputUserame">Full Name</label>
                            <input type="text" id="inputUserame" class="form-control" placeholder="Full Name" name="name" value="<?= $user->name ?>"
                                required autofocus>
                        </div>
    
                        <div class="form-label-group">
                            <label for="inputEmail">Username</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="username" value="<?= $user->username ?>"
                                required>
                        </div>
    
                        <div class="form-label-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?= $user->email ?>"
                                name="email" required>
                        </div>
    
                        <div class="form-label-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                                name="password" required>
                        </div>
    
                        <div class="form-label-group">
                            <label for="inputConfirmPassword">Confirm password</label>
                            <input type="password" id="inputConfirmPassword" class="form-control"
                                placeholder="Confirm password" name="password_confirm" required>
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