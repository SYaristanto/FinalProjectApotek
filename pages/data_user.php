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
<body>
<div class="main-panel">
			<div class="content">
                <div class="page-inner">                    
                     	<div class="page-header">
						    <h4 class="page-title">Data User</h4>
						    <ul class="breadcrumbs">
							    <li class="nav-home">
								    <a href="dashboard_owner.php">
									    <i class="flaticon-home"></i>
								    </a>
							    </li>
							        <li class="separator">
								        <i class="flaticon-right-arrow"></i>
                                        <a href =""></a>
							        </li>
							    <li class="nav-item">
                                    <a href="sub-item">User</a>
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
										<a href = "tambah_user.php">
											<button class="btn btn-primary btn-round ml-auto" name="tambah penjualan" data-toggle="modal" data-target="#addRowModal">
												<i class="fas fa-user-plus mx-1"></i>
            									Tambah User
        									</button>
										</a>
    							</div>
							</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama</th>
													<th>Email</th>
                                                    <th>Role</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												require "../backend/config/db_apotek.php";
												$user = mysqli_query($db_connect, "SELECT * FROM tbl_user");
												$no = 1;

												while ($tbl_user = mysqli_fetch_array($user)){
												
												?>
												<tr>
													<td>
														<?php echo $no++; ?>
													</td>
													<td>
														<?php echo $tbl_user ['nama']; ?>
													</td>
													<td>
														<?php echo $tbl_user ['email']; ?>
													</td>
													<td>
														<?php echo $tbl_user ['role']; ?>
													</td>
													<!-- <td>
														<?php echo $tbl_penjualan ['jumlah_terjual']; ?>
													</td> -->
													<!-- <td>
														<?php echo $tbl_penjualan ['harga_satuan']; ?>
													</td> -->
													<!-- <td>
														<?php echo $tbl_penjualan ['total_harga']; ?>
													</td> -->
													<td>
														<div class="card-action d-flex justify-content-between">
															<a href="edit_user.php">
                                                                <button type="submit" name="Edit" class="btn btn-primary" style="margin-right: 10px;">Edit</button>
                                                            </a>
															<a href="../backend/hapus_user.php?id_user=<?php echo $tbl_user['id_user']; ?>">
															<button type="submit" name="Hapus" class="btn btn-danger">Hapus</button>
														</div>
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

<!-- <?php require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?>  -->