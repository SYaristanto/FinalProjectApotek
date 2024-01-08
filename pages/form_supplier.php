<?php

session_start();
if($_SESSION['role']!= 'admin'){
	header('Location:../login.php');
	exit();
}

$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header.php");
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Tambah Supplier</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<a href="supplier.php">
								<i class="flaticon-right-arrow"></i>
								</a>
							</li>
							<li class="nav-item">
								<a href="#">Tambah Supplier</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
						<form action="../backend/tambah_supplier.php" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-row"> 
												<div class="form-group col-md-6">
													<label for="Nama_Supplier">Nama Supplier</label>
													<input type="text" name="Nama_Supplier" class="form-control" id="Nama_Supplier">
												</div>
												<div class="form-group col-md-6">
													<label for="Email">Email</label>
													<input type="text" name="Email" class="form-control" id="Email">
												</div>
												<div class="form-group col-md-6">
													<label for="Alamat">Alamat</label>
													<input type="text" name="Alamat" class="form-control" id="Alamat">
												</div>
												<div class="form-group col-md-6">
													<label for="No_Telp">No Telp</label>
													<input type="text" name="No_Telp" class="form-control" id="No_Telp">
												</div>
											</div>
										</div>
									</div>
										<div class="card-action">
										<button type="submit" name="tambah" class="btn btn-warning mx-2">Tambah</button>
										<a href="">
											<button type="submit" name="batal" class="btn btn-danger">Batal</button>	
										</a>
									</div>
						</form>