<?php
    require '../class/curl_api.php';

    $tipoJSON		= get_curl('500');
	$workCodigo 	= $_GET['codigo'];
	$workModo 		= $_GET['mode'];

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('600/'.$workCodigo);

		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['tipo_categoria_codigo'];
			$row_03			= $dataJSON['data'][0]['tipo_categoria_nombre'];
			$row_04			= $dataJSON['data'][0]['tipo_subcategoria_codigo'];
			$row_05			= $dataJSON['data'][0]['tipo_subcategoria_nombre'];
			$row_06			= $dataJSON['data'][0]['categoria_subcategoria_descripcion'];
			
			if ($row_01 == 1){
				$row_01_h = 'selected';
				$row_01_d = '';
			}else{
				$row_01_h = '';
				$row_01_d = 'selected';
			}
		}
	}

	switch($workModo){
		case 'C':
			$workReadonly	= '';
			$workATitulo	= 'Agregar';
			$workAStyle		= 'btn-info';
			break;
		case 'R':
			$workReadonly	= 'disabled';
			$workATitulo	= 'Ver';
			$workAStyle		= 'btn-primary';
			break;
		case 'U':
			$workReadonly	= '';
			$workATitulo	= 'Actualizar';
			$workAStyle		= 'btn-success';
			break;
		case 'D':
			$workReadonly	= 'disabled';
			$workATitulo	= 'Eliminar';
			$workAStyle		= 'btn-danger';
			break;
	}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
<?php
    include '../include/header.php';
?>
	
	<title>Panel Administrador - Par&aacute;metro Tipo Categoria/SubCategoria</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
<?php
    	include '../include/menu.php';
?>
       
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Mantenimiento</h4>
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../public/home.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="../public/parmtcl.php">Par&aacute;metro Categoria/SubCategoria</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Mantenimiento</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Par&aacute;metro Categoria/SubCategoria</h4>
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/parmtca.php">
                                	<div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoEstado">Estado</label>
                                		<select id="tipoEstado" name="tipoEstado" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
                                    		<optgroup label="Estado">
                                        		<option value="1" <?php echo $row_01_h; ?>>Habilitado</option>
                                        		<option value="2" <?php echo $row_01_d; ?>>Deshabilitado</option>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoCategoria">Categoria</label>
                                		<select id="tipoCategoria" name="tipoCategoria" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
                                    		<optgroup label="Categoria">
<?php
    if ($tipoJSON['code'] == 200) {
        foreach ($tipoJSON['data'] as $detalleKey=>$detalleArray) {
            $row_categoria_00          	= $detalleArray['tipo_estado_codigo'];
			$row_categoria_01          	= $detalleArray['tipo_codigo'];
			$row_categoria_02          	= $detalleArray['tipo_nombre'];
			$row_categoria_03          	= $detalleArray['tipo_dominio'];
			$row_categoria_04         	= $detalleArray['tipo_descripcion'];
			$selectedCategoria 			= '';
			
			if ($row_categoria_00 == 1 && $row_categoria_03 == 'CATEGORIATIPO') {
				if ($row_02 == $row_categoria_01){
					$selectedCategoria = 'selected';
				}
?>
												<option value="<?php echo $row_categoria_01; ?>" <?php echo $selectedCategoria; ?>><?php echo $row_categoria_02; ?></option>
<?php
			}
		}
	}
?>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoSubcategoria">SubCategoria</label>
                                		<select id="tipoSubcategoria" name="tipoSubcategoria" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
                                    		<optgroup label="SubCategoria">
<?php
    if ($tipoJSON['code'] == 200) {
        foreach ($tipoJSON['data'] as $detalleKey=>$detalleArray) {
            $row_subcategoria_00          	= $detalleArray['tipo_estado_codigo'];
			$row_subcategoria_01          	= $detalleArray['tipo_codigo'];
			$row_subcategoria_02          	= $detalleArray['tipo_nombre'];
			$row_subcategoria_03          	= $detalleArray['tipo_dominio'];
			$row_subcategoria_04         	= $detalleArray['tipo_descripcion'];
			$selectedSubcategoria 			= '';
			
			if ($row_subcategoria_00 == 1 && $row_subcategoria_03 == 'SUBCATEGORIATIPO') {
				if ($row_04 == $row_subcategoria_01){
					$selectedSubcategoria = 'selected';
				}
?>
												<option value="<?php echo $row_subcategoria_01; ?>" <?php echo $selectedSubcategoria; ?>><?php echo $row_subcategoria_02; ?></option>
<?php
			}
		}
	}
?>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                    	<label for="tipoDescripcion">Descripci&oacute;n</label>
                                    	<textarea id="tipoDescripcion" name="tipoDescripcion" class="form-control" rows="5" <?php echo $workReadonly; ?>><?php echo $row_06; ?></textarea>
                                	</div>
                                    <button type="submit" class="btn <?php echo $workAStyle; ?>" <?php echo $workReadonly; ?>><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/parmtcl.php">Volver</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Todos los derechos reservados. Dise&ntilde;ado y desarrollado por 
                <a href="http://cerouno.com.py">CEROUNO Labs</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>
<?php
    include '../include/footer.php';
?>

</body>
</html>