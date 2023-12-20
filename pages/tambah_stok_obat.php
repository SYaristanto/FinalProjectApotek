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
						<h4 class="page-title">Tambah Stok Obat</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="stok_obat.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Forms</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-row"> 
											<div class="form-group col-md-6">
												<label for="Nama_Obat">Nama Obat</label>
												<input type="text" name="Nama_Obat" class="form-control" id="Nama_Obat">
											</div>
											<div class="form-group col-md-6">
												<label for="Stok">Stok</label>
												<input type="text" name="Stok" class="form-control" id="stok">
											</div>
											<div class="form-group col-md-6">
												<label for="Obat_In">Obat Masuk</label>
												<input type="text" name="Obat_In" class="form-control" id="email2">
											</div>
											<div class="form-group col-md-6">
												<label for="Obat_Out">Obat Terjual</label>
												<input type="text" name="Obat_Out" class="form-control" id="password">
											</div>
											<div class="form-group col-md-6">
												<label for="Obat_In">Obat Masuk</label>
												<input type="text" name="Obat_In" class="form-control" id="email2">
											</div>
											<div class="form-group col-md-6">
												<label for="Obat_Out">Obat Terjual</label>
												<input type="text" name="Obat_Out" class="form-control" id="password">
											</div>
											</div>
										</div>
									</div>
										<div class="card-action">
										<button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
									</div>