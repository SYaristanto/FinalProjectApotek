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
						<h4 class="page-title">Ubah Obat Masuk</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<a href="obat_masuk.php">
								<i class="flaticon-right-arrow"></i>
								</a>
							</li>
							<li class="nav-item">
								<a href="#">Obat Masuk</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						</ul>
					</div>
					<form action="../backend/edit_obat_masuk.php" method="POST">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-row"> 
											<div class="form-group col-md-6">
                                            <?php
												require "../backend/config/db_apotek.php";
												$nama_supplier= mysqli_query($db_connect, "SELECT * FROM tbl_supplier");
												$nama_supplier_options = array();

												while($nama_supplier_row = mysqli_fetch_assoc($nama_supplier)) {
													$nama_supplier_options[] = $nama_supplier_row["nama_supplier"]; 
												}
												
												
												?>
													<label for="Nama_Supplier">Nama Supplier</label>
													<select class="form-control" name="nama_supplier" id="nama_supplier">
														<option value="" disabled selected>--Pilih Supplier--</option>
														<?php
														foreach($nama_supplier_options as $nama_supplier_option){
														 
														?>
														<option value="<?php echo $nama_supplier_option?>"><?php echo $nama_supplier_option?></option>
														<?php } ?>
													</select>
											</div>
                                            <div class="form-group col-md-6">
												<label for="Nama_Obat">Nama Obat</label>
												<input type="text" name="nama_obat" class="form-control" id="nama_obat">

											</div>
                                            <div class="form-group col-md-6">
												<label for="Tanggal_Masuk">Tanggal Masuk</label>
												<input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
											</div>
											<div class="form-group col-md-6">
												<label for="Jumlah_Masuk">Jumlah Masuk</label>
												<input type="text" name="jumlah_masuk" class="form-control" id="jumlah_masuk">
											</div>
											<div class="form-group col-md-6">
												<label for="Harga_Beli">Harga Beli</label>
												<input type="text" name="harga_beli" class="form-control" id="harga_beli">
											</div>
                                            <div class="form-group col-md-6">
												<label for="Satuan">Satuan</label>
												<input type="text" name="satuan" class="form-control" id="satuan">
											</div>
										</div>
									</div>
										<div class="card-action">
										<button type="submit" name="simpan" class="btn btn-primary mx-2">Simpan</button>
										<button type="submit" name="batal" class="btn btn-danger">Batal</button>
									</div>
					</form>