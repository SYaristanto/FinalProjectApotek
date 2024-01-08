<?php

session_start();
if($_SESSION['role']!= 'super_admin'){
	header('Location:../login.php');
	exit();

}
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..' . $ds) . $ds;
require_once("{$base_dir}pages{$ds}core{$ds}header_owner.php");
require_once("{$base_dir}pages{$ds}stokbat_owner.php");
?>
<body>
<div class="main-panel">
			<div class="content">
                <div class="page-inner">                    
                     	<div class="page-header">
						    <h4 class="page-title">Data Obat</h4>
						    <ul class="breadcrumbs">
							    <li class="nav-home">
								    <a href="dashboard_owner.php">
									    <i class="flaticon-home"></i>
								    </a>
							    </li>
							        <li class="separator">
								        <i class="flaticon-right-arrow"></i>
                                        <a href ="Data Obat"></a>
							        </li>
							    <li class="nav-item">
                                    <a href="sub-item">Stok Obat</a>
							        </li>
								<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
						    </ul>
						</div>
				</div>
                <div class="col-md-12">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
    								<div class="justify-content-start">
										<h4 class="card-title">Stok Obat</h4>
										<!-- <a href = "form_stok_obat.php">
											<button class="btn btn-primary btn-round ml-auto" name="tambah stok obat" data-toggle="modal" data-target="#addRowModal">
												<i class="fa fa-plus"></i>
            									Tambah Stok Obat
        									</button>
										</a> -->
    						</div>
    							<div class="d-flex ms-auto align-items-center">
    							</div>
							</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Obat</th>
                                                    <th>Jenis</th>
                                                    <th>Stok</th>
                                                    <th>Expired</th>
													<th>Satuan</th>
													<th>Harga Satuan</th>
													<!-- <th>Gambar</th> -->
													<!-- <th>Action</th> -->
												</tr>
											</thead>
											<tbody>
													<?php
													require "../backend/config/db_apotek.php";
													$daftar_stok_obat = mysqli_query($db_connect, "SELECT * FROM tbl_stok_obat");
													$no = 1;
													
													while ($tbl_stok_obat = mysqli_fetch_array($daftar_stok_obat)){
													
													?>
														<tr>
															<td>
																<?php echo $no++; ?>
															</td>
															<td>
																<?php echo $tbl_stok_obat ['nama_obat']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_stok_obat ['jenis']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_stok_obat ['stok']; ?>
															</td>
                                                    		<td>
																<?php echo $tbl_stok_obat ['expired']; ?>
															</td>
															<td>
																<?php echo $tbl_stok_obat ['satuan']; ?>
															</td>
															<td>
																<?php echo $tbl_stok_obat ['harga_satuan']; ?>
															</td>
														</tr>
													<?php
													 }
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div> 
						
</body>
<!-- <?php require_once("{$base_dir}pages{$ds}core{$ds}footer_owner.php");
?> -->