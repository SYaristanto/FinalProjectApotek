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
						<h4 class="page-title">Ubah User</h4>
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
					<form action="../backend/edit_user.php" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-row"> 
											<div class="form-group col-md-6">
											<?php
												require "../backend/config/db_apotek.php";
												$nama_user = mysqli_query($db_connect, "SELECT * FROM tbl_user");
												$nama_user_options = array();

												while($nama_user_row = mysqli_fetch_assoc($nama_user)) {
													$nama_user_options[] = $nama_user_row["nama"]; 
												}
												
												
												?>
													<label for="Nama">Nama</label>
													<select class="form-control" name="nama_user" id="nama_user">
														<option value="" disabled selected>--Pilih Nama--</option>
														<?php
														foreach($nama_user_options as $nama_user_option){
														 
														?>
														<option value="<?php echo $nama_user_option?>"><?php echo $nama_user_option?></option>
														<?php } ?>
													</select>
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
											<?php
												require "../backend/config/db_apotek.php";
												$role_user = mysqli_query($db_connect, "SELECT * FROM tbl_user");
												$role_user_options = array();

												while($role_user_row = mysqli_fetch_assoc($role_user)) {
													$role_user_options[] = $role_user_row["role"]; 
												}
												
												
												?>
													<label for="Role">Role</label>
													<select class="form-control" name="role" id="role">
														<option value="" disabled selected>--Pilih Role--</option>
														<?php
														foreach($role_user_options as $role_user_option){
														 
														?>
														<option value="<?php echo $role_user_option?>"><?php echo $role_user_option?></option>
														<?php } ?>
													</select>
											</div>
										</div>
									</div>
										<div class="card-action">
										<button type="submit" name="simpan" class="btn btn-primary mx-2">Simpan</button>
										<button type="submit" name="batal" class="btn btn-danger">Batal</button>
									</div>