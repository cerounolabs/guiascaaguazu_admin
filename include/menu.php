        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="../public/home.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li> -->
                        
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="../assets/images/users/1.jpg" alt="user" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">Steave Jobs</h4>
                                        <p class=" m-b-0">varun@gmail.com</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                                </div>
                            </div>
                        </li>-->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
        	</nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       	<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        		<i class="icon-Car-Wheel"></i>
                        		<span class="hide-menu"> Dashboard </span>
                        	</a>
                        </li>
                        
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Globe"></i>
                           		<span class="hide-menu"> Localidad </span>
                           	</a>
                            <ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="../public/locmlpl.php" class="sidebar-link">
                               			<i class="mdi mdi-localidad"></i>
                               			<span class="hide-menu"> Pa&iacute;s </span>
                               		</a>
                               	</li>
                                <li class="sidebar-item">
                                	<a href="../public/locmldl.php" class="sidebar-link">
                                		<i class="mdi mdi-localidad"></i>
                                		<span class="hide-menu"> Departamento </span>
                                	</a>
                                </li>
                                <li class="sidebar-item">
                                	<a href="../public/locmlcl.php" class="sidebar-link">
                                		<i class="mdi mdi-localidad"></i>
                                		<span class="hide-menu"> Distrito </span>
                                	</a>
                                </li>
                                <li class="sidebar-item">
                                	<a href="../public/locmlbl.php" class="sidebar-link">
                                		<i class="mdi mdi-localidad"></i>
                                		<span class="hide-menu"> Barrio </span>
                                	</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-File-HorizontalText"></i>
                           		<span class="hide-menu"> Empresa </span>
                           	</a>
                            <ul aria-expanded="false" class="collapse first-level">
                            </ul>
                        </li>
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Box-withFolders"></i>
                           		<span class="hide-menu"> Par&aacute;metro </span>
                           	</a>
                            <ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                                  	<a href="javascript:void(0)" class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false">
                                   		<i class="mdi mdi-parametro"></i>
                                   		<span class="hide-menu"> Empresa </span>
                                   	</a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=44" class="sidebar-link">
												<i class="mdi mdi-parametro-clasificado"></i>
												<span class="hide-menu"> Tipo Estado </span>
											</a>
										</li>
                                        <li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=76" class="sidebar-link">
												<i class="mdi mdi-parametro-clasificado"></i>
												<span class="hide-menu"> Tipo Red Social </span>
											</a>
										</li>
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=3" class="sidebar-link">
												<i class="mdi mdi-parametro-clasificado"></i>
												<span class="hide-menu"> Tipo Categoria </span>
											</a>
										</li>
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=4" class="sidebar-link">
												<i class="mdi mdi-parametro-clasificado"></i>
												<span class="hide-menu"> Tipo SubCategoria </span>
											</a>
										</li>
										<li class="sidebar-item">
											<a href="../public/parmtcl.php" class="sidebar-link">
												<i class="mdi mdi-parametro-clasificado"></i>
												<span class="hide-menu"> Categoria / SubCategoria </span>
											</a>
										</li>
									</ul>
                                </li>
                                <li class="sidebar-item">
                                  	<a href="javascript:void(0)" class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false">
                                   		<i class="mdi mdi-parametro"></i>
                                   		<span class="hide-menu"> Persona </span>
                                   	</a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=30" class="sidebar-link">
												<i class="mdi mdi-parametro-persona"></i>
												<span class="hide-menu"> Tipo Documento </span>
											</a>
										</li>
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=29" class="sidebar-link">
												<i class="mdi mdi-parametro-persona"></i>
												<span class="hide-menu"> Tipo Persona </span>
											</a>
										</li>
									</ul>
                                </li>
                                <li class="sidebar-item">
                                  	<a href="javascript:void(0)" class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false">
                                   		<i class="mdi mdi-parametro"></i>
                                   		<span class="hide-menu"> Sistema </span>
                                   	</a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=6" class="sidebar-link">
												<i class="mdi mdi-parametro-sistema"></i>
												<span class="hide-menu"> Tipo Estado </span>
											</a>
										</li>
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=5" class="sidebar-link">
												<i class="mdi mdi-parametro-sistema"></i>
												<span class="hide-menu"> Tipo Dominio </span>
											</a>
										</li>
									</ul>
                                </li>
                                <li class="sidebar-item">
                                  	<a href="javascript:void(0)" class="sidebar-link has-arrow waves-effect waves-dark" aria-expanded="false">
                                   		<i class="mdi mdi-parametro"></i>
                                   		<span class="hide-menu"> Usuario </span>
                                   	</a>
									<ul aria-expanded="false" class="collapse second-level">
										<li class="sidebar-item">
											<a href="../public/parmtdl.php?dominio=37" class="sidebar-link">
												<i class="mdi mdi-parametro-usuario"></i>
												<span class="hide-menu"> Tipo Acceso </span>
											</a>
											<a href="../public/parmtdl.php?dominio=36" class="sidebar-link">
												<i class="mdi mdi-parametro-usuario"></i>
												<span class="hide-menu"> Tipo Usuario </span>
											</a>
											<a href="../public/parmtdl.php?dominio=36" class="sidebar-link">
												<i class="mdi mdi-parametro-usuario"></i>
												<span class="hide-menu"> Usuario / Acceso </span>
											</a>
										</li>
									</ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                        	<a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                           		<i class="icon-Neutron"></i>
                           		<span class="hide-menu"> Sistema </span>
                           	</a>
                            <ul aria-expanded="false" class="collapse first-level">
                            	<li class="sidebar-item">
                               		<a href="../public/permpel.php" class="sidebar-link">
                               			<i class="mdi mdi-sistema"></i>
                               			<span class="hide-menu"> Persona </span>
                               		</a>
                               	</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->