<?php
    require '../class/curl_api.php';

    $distritoJSON	= get_curl('200');
    $ciudadJSON		= get_curl('300');
	$tipoJSON		= get_curl('500');
	$workCodigo 	= $_GET['codigo'];
	$workModo 		= $_GET['mode'];

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('400/'.$workCodigo);

		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['pais_codigo'];
			$row_03			= $dataJSON['data'][0]['pais_nombre'];
			$row_04			= $dataJSON['data'][0]['pais_descripcion'];
			$row_05			= $dataJSON['data'][0]['distrito_codigo'];
			$row_06			= $dataJSON['data'][0]['distrito_nombre'];
			$row_07			= $dataJSON['data'][0]['distrito_descripcion'];
			$row_08			= $dataJSON['data'][0]['ciudad_codigo'];
			$row_09			= $dataJSON['data'][0]['ciudad_nombre'];
			$row_10			= $dataJSON['data'][0]['ciudad_descripcion'];
			$row_11			= $dataJSON['data'][0]['barrio_codigo'];
			$row_12			= $dataJSON['data'][0]['barrio_nombre'];
			$row_13			= $dataJSON['data'][0]['barrio_descripcion'];
			
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
	
	<title>Panel Administrador - Localidad Barrio</title>
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
                                        <a href="../public/locmlbl.php">Localidad Barrio</a>
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
                                <h4 class="card-title">Localidad Barrio</h4>
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/locmlba.php">
                                	<div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="barrioEstado">Estado</label>
                                		<select id="barrioEstado" name="barrioEstado" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
                                    		<optgroup label="Estado">
                                        		<option value="1" <?php echo $row_01_h; ?>>Habilitado</option>
                                        		<option value="2" <?php echo $row_01_d; ?>>Deshabilitado</option>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="barrioCiudad">Pa&iacute;s - Departamento - Distrito</label>
                                		<select id="barrioCiudad" name="barrioCiudad" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
<?php
    if ($distritoJSON['code'] == 200) {
        foreach ($distritoJSON['data'] as $distritoKey=>$distritoArray) {
            $row_distrito_00      	= $distritoArray['pais_codigo'];
			$row_distrito_01      	= $distritoArray['pais_nombre'];
			$row_distrito_02      	= $distritoArray['distrito_codigo'];
            $row_distrito_03      	= $distritoArray['distrito_nombre'];
?>
                                  			<optgroup label="<?php echo $row_distrito_01.' - '.$row_distrito_03; ?>">
								
<?php
    		if ($ciudadJSON['code'] == 200) {
        		foreach ($ciudadJSON['data'] as $ciudadKey=>$ciudadArray) {
					$row_ciudad_00      = $ciudadArray['distrito_codigo'];
					$row_ciudad_01      = $ciudadArray['distrito_nombre'];
            		$row_ciudad_02      = $ciudadArray['ciudad_codigo'];
					$row_ciudad_03      = $ciudadArray['ciudad_nombre'];
			
					if ($row_distrito_02 == $row_ciudad_00) {
						$selected			= '';
						if ($row_08 == $row_ciudad_02){
							$selected 		= 'selected';
						}
?>
												<option value="<?php echo $row_ciudad_02; ?>" <?php echo $selected; ?>><?php echo $row_ciudad_03; ?></option>
<?php
					}
				}
			}
?>
                                    		</optgroup>
<?php
		}
	}
?>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="barrioNombre">Barrio</label>
                                        <input id="barrioNombre" name="barrioNombre" class="form-control" type="text" placeholder="Nombre" value="<?php echo $row_12; ?>" required <?php echo $workReadonly; ?>>
                                    </div>
                                    <div class="form-group">
                                    	<label for="barrioDescripcion">Descripci&oacute;n</label>
                                    	<textarea id="barrioDescripcion" name="barrioDescripcion" class="form-control" rows="5" <?php echo $workReadonly; ?>><?php echo $row_13; ?></textarea>
                                	</div>
                                    <button type="submit" class="btn <?php echo $workAStyle; ?>" <?php echo $workReadonly; ?>><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/locmlbl.php">Volver</a>
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