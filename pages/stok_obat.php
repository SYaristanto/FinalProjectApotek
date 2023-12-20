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
<body>
<div class="main-panel">
			<div class="content">
                <div class="page-inner">                    
                     	<div class="page-header">
						    <h4 class="page-title">Data Obat</h4>
						    <ul class="breadcrumbs">
							    <li class="nav-home">
								    <a href="dashboard.php">
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
										<a href = "tambah_stok_obat.php">
											<button class="btn btn-primary btn-round ml-auto" name="tambah stok obat" data-toggle="modal" data-target="#addRowModal">
												<i class="fa fa-plus"></i>
            									Tambah Stok Obat
        									</button>
										</a>
    						</div>
    							<div class="d-flex ms-auto align-items-center"> <!-- Tambahkan ms-auto di sini -->
        							<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
       								 <button class="btn btn-outline-success" type="submit">Search</button>
    							</div>
							</div>
								<div class="card-body">
									<!-- Modal -->
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>ID Obat</th>
													<th>Nama Obat</th>
                                                    <th>Stok</th>
                                                    <th>Obat Masuk</th>
                                                    <th>Obat Terjual</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>System Architect</td>
													<td>Edinburgh</td>
                                                    <td>Edinburgh</td>
                                                    <td>Edinburgh</td>
                                                    <td>Edinburgh</td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

</div>  
</body>

<!-- <?php require_once("{$base_dir}pages{$ds}core{$ds}footer.php");
?> -->