		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<!-- <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"> -->
							<img width="45" height="45" src="https://img.icons8.com/3d-fluency/94/administrator-male--v4.png" alt="administrator-male--v4"/>
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['nama'];?>
									<span class="user-level"><?php echo $_SESSION['role'];?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item">
							<a href="dashboard_owner.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-user-friends"></i>
								<p>Data User</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="data_user.php">
											<span class="sub-item">User</span>
										</a>
									</li>
							</div>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Pages</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-medkit"></i>
								<p>Data Obat</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="stokbat_owner.php">
											<span class="sub-item">Stok Obat</span>
										</a>
									</li>
									<li>
										<a href="obt_masuk_owner.php">
											<span class="sub-item">Obat Masuk</span>
										</a>
									</li>
									<!-- <li>
										<a href="./laporan_stok_obat.php">
											<span class="sub-item">Laporan</span>
										</a>
									</li> -->
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-file-invoice-dollar"></i>
								<p>Data Penjualan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="penjualan_owner.php">
											<span class="sub-item">Penjualan</span>
										</a>
									</li>
									<!-- <li>
										<a href="overlay-sidebar.html">
											<span class="sub-item">Laporan</span>
										</a>
									</li> -->
									<!-- <li>
										<a href="compact-sidebar.html">
											<span class="sub-item">Laporan</span>
										</a>
									</li> -->
									<!-- <li>
										<a href="static-sidebar.html">
											<span class="sub-item">Supplier</span>
										</a>
                                    </li> -->
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-dolly"></i>
								<p>Data Supplier</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="supplier_owner.php">
											<span class="sub-item">Supplier</span>
										</a>
									</li>
									<!-- <li>
										<a href="">
											<span class="sub-item">Laporan</span>
										</a>
									</li> -->
								</ul>
							</div>
							<li class="mx-4 mt-2">
          						<a href="../backend/logout.php" class="btn btn-primary btn-block"><span class="btn-label mr-2">
            					</span>Log Out</a>
							</li>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->