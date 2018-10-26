<?php
	require '../class/curl_api.php';

	$tipoJSON		= get_curl('500');
	$workCodigo 	= $_GET['codigo'];
	$workModo 		= $_GET['mode'];
	$workValor 		= $_GET['dominio'];

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('500/'.$workCodigo);

		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['tipo_codigo'];
			$row_03			= $dataJSON['data'][0]['tipo_nombre'];
			$row_04			= $dataJSON['data'][0]['tipo_dominio'];
			$row_05			= $dataJSON['data'][0]['tipo_descripcion'];

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

	switch($workValor){
		case 3:
			$dominioTitulo	= 'Categoria';
			$dominioNombre 	= 'CATEGORIATIPO';
			break;
		case 4:
			$dominioTitulo 	= 'SubCategoria';
			$dominioNombre 	= 'SUBCATEGORIATIPO';
			break;
		case 5:
			$dominioTitulo 	= 'Dominio';
			$dominioNombre 	= 'DOMINIOSISTEMA';
			break;
		case 6:
			$dominioTitulo 	= 'Estado';
			$dominioNombre 	= 'DOMINIOESTADO';
			break;
		case 29:
			$dominioTitulo 	= 'Persona';
			$dominioNombre 	= 'PERSONATIPO';
			break;
		case 30:
			$dominioTitulo 	= 'Documento';
			$dominioNombre 	= 'DOCUMENTOTIPO';
			break;
		case 36:
			$dominioTitulo 	= 'Usuario';
			$dominioNombre 	= 'USUARIOTIPO';
			break;
		case 37:
			$dominioTitulo 	= 'Acceso';
			$dominioNombre 	= 'ACCESOTIPO';
			break;
		case 44:
			$dominioTitulo 	= 'Estado';
			$dominioNombre 	= 'PUBLICACIONESTADO';
            break;
        case 76:
			$dominioTitulo 	= 'Red Social';
			$dominioNombre 	= 'EMPRESAREDSOCIAL';
			break;
	}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
<?php
    include '../include/header.php';
?>
	
	<title>Panel Administrador - Par&aacute;metro Tipo Dominio</title>
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
                                        <a href="../public/parmtdl.php?dominio=<?php echo $workValor; ?>">Par&aacute;metro Tipo <?php echo $dominioTitulo; ?></a>
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
                                <h4 class="card-title">Par&aacute;metro Tipo <?php echo $dominioTitulo; ?></h4>
                                <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/parmtda.php">
                                   	<div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                        <input id="workDominio" name="workDominio" class="form-control" type="hidden" placeholder="Dominio" value="<?php echo $workValor; ?>" required readonly>
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
                                        <label for="tipoNombre">Tipo</label>
                                        <input id="tipoNombre" name="tipoNombre" class="form-control" type="text" placeholder="Nombre" value="<?php echo $row_03; ?>" required <?php echo $workReadonly; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoDominio">Dominio</label>
                                        <input id="tipoDominio" name="tipoDominio" class="form-control" type="text" placeholder="Dominio" value="<?php echo $dominioNombre; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                    	<label for="tipoDescripcion">Descripci&oacute;n</label>
                                    	<textarea id="tipoDescripcion" name="tipoDescripcion" class="form-control" rows="5" <?php echo $workReadonly; ?>><?php echo $row_05; ?></textarea>
                                	</div>
                                    <button type="submit" class="btn <?php echo $workAStyle; ?>" <?php echo $workReadonly; ?>><?php echo $workATitulo; ?></button>
                                    <a role="button" class="btn btn-dark" href="../public/parmtdl.php?dominio=<?php echo $workValor; ?>">Volver</a>
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