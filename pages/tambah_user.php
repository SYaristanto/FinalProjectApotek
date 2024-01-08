<?php

session_start();
if($_SESSION['role']!= 'super_admin'){
	header('Location:../login.php');
	exit();
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header_owner.php");
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Tambah User</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard_owner.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<a href="data_user.php">
								<i class="flaticon-right-arrow"></i>
								</a>
							</li>
							<li class="nav-item">
								<a href="#">User</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
					<form action="../backend/tambah_user.php" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-row"> 
											<div class="form-group col-md-6">
												<label for="Nama">Nama</label>
												<input type="text" name="nama" class="form-control" id="nama">
											</div>
											<div class="form-group col-md-6">
												<label for="Email">Email</label>
												<input type="text" name="email" class="form-control" id="email">
											</div>
											<div class="form-group col-md-6">
												<label for="Password">Password</label>
												<input type="password" name="password" class="form-control" id="password">
											</div>
											<div class="form-group col-md-6">
                                                <label for="Role">Role</label>
												<input type="text" name="role" class="form-control" id="role">
											</div>
										</div>
									</div>
										<div class="card-action">
										<button type="submit" name="simpan" class="btn btn-primary mx-2">Simpan</button>
										<button type="submit" name="batal" class="btn btn-danger">Batal</button>
									</div>
                    </form>