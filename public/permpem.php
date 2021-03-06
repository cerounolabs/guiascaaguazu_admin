<?php
    require '../class/curl_api.php';

    $tipoJSON		= get_curl('500');
	$workCodigo 	= $_GET['codigo'];
	$workModo 		= $_GET['mode'];

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('700/'.$workCodigo);

		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['tipo_persona_codigo'];
			$row_03			= $dataJSON['data'][0]['tipo_documento_codigo'];
			$row_04			= $dataJSON['data'][0]['persona_nombre'];
			$row_05			= $dataJSON['data'][0]['persona_apellido'];
			$row_06			= $dataJSON['data'][0]['persona_documento_numero'];
			$row_07			= $dataJSON['data'][0]['persona_fecha_nacimiento'];						
			
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
	
	<title>Panel Administrador - Persona</title>
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
                                        <a href="../public/permpel.php">Persona</a>
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
                                <h4 class="card-title">Persona</h4>
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/permpea.php">
                                	<div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                    </div>
                                    <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="personaEstado">Estado</label>
												<select id="personaEstado" name="personaEstado" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
													<optgroup label="Estado">
														<option value="1" <?php echo $row_01_h; ?>>Habilitado</option>
														<option value="2" <?php echo $row_01_d; ?>>Deshabilitado</option>
													</optgroup>
												</select>
											</div>
										</div>
									   	<div class="col-md-4">
											<div class="form-group">
												<label for="personaTipo">Tipo Persona</label>
												<select id="personaTipo" name="personaTipo" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
													<optgroup label="Tipo Persona">
		<?php
			if ($tipoJSON['code'] == 200) {
				foreach ($tipoJSON['data'] as $detalleKey=>$detalleArray) {
					$row_tipo_persona_00          	= $detalleArray['tipo_estado_codigo'];
					$row_tipo_persona_01          	= $detalleArray['tipo_codigo'];
					$row_tipo_persona_02          	= $detalleArray['tipo_nombre'];
					$row_tipo_persona_03          	= $detalleArray['tipo_dominio'];
					$row_tipo_persona_04         	= $detalleArray['tipo_descripcion'];
					$selectedTipoPersona 			= '';

					if ($row_tipo_persona_00 == 1 && $row_tipo_persona_03 == 'PERSONATIPO') {
						if ($row_02 == $row_tipo_persona_01){
							$selectedTipoPersona = 'selected';
						}
		?>
														<option value="<?php echo $row_tipo_persona_01; ?>" <?php echo $selectedTipoPersona; ?>><?php echo $row_tipo_persona_02; ?></option>
		<?php
					}
				}
			}
		?>
													</optgroup>
												</select>
											</div>
										</div>
									</div>
                                    <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="documentoTipo">Tipo Documento</label>
												<select id="documentoTipo" name="documentoTipo" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
													<optgroup label="Tipo Documento">
		<?php
			if ($tipoJSON['code'] == 200) {
				foreach ($tipoJSON['data'] as $detalleKey=>$detalleArray) {
					$row_tipo_documento_00         	= $detalleArray['tipo_estado_codigo'];
					$row_tipo_documento_01         	= $detalleArray['tipo_codigo'];
					$row_tipo_documento_02         	= $detalleArray['tipo_nombre'];
					$row_tipo_documento_03          = $detalleArray['tipo_dominio'];
					$row_tipo_documento_04         	= $detalleArray['tipo_descripcion'];
					$selectedTipoDocumento 			= '';

					if ($row_tipo_documento_00 == 1 && $row_tipo_documento_03 == 'DOCUMENTOTIPO') {
						if ($row_03 == $row_tipo_documento_01){
							$selectedTipoDocumento = 'selected';
						}
		?>
														<option value="<?php echo $row_tipo_documento_01; ?>" <?php echo $selectedTipoDocumento; ?>><?php echo $row_tipo_documento_02; ?></option>
		<?php
					}
				}
			}
		?>
													</optgroup>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="documentoNumero">N&uacute;mero Documento</label>
												<input id="documentoNumero" name="documentoNumero" class="form-control" type="text" placeholder="N&uacute;mero Documento" value="<?php echo $row_06; ?>" maxlength="20" required <?php echo $workReadonly; ?>>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="personFechaNac">Fecha Nacimiento</label>
												<input id="personFechaNac" name="personFechaNac" class="form-control" type="date" placeholder="Fecha Nacimiento" value="<?php echo $row_07; ?>" required <?php echo $workReadonly; ?>>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="personaNombre">Nombre</label>
												<input id="personaNombre" name="personaNombre" class="form-control" type="text" placeholder="Nombre" value="<?php echo $row_04; ?>" maxlength="256" required <?php echo $workReadonly; ?>>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="personaApellido">Apellido</label>
												<input id="personaApellido" name="personaApellido" class="form-control" type="text" placeholder="Apellido" value="<?php echo $row_05; ?>" maxlength="256" required <?php echo $workReadonly; ?>>
											</div>
										</div>
									</div>
                                    <button type="submit" class="btn <?php echo $workAStyle; ?>" <?php echo $workReadonly; ?>><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/permpel.php">Volver</a>
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