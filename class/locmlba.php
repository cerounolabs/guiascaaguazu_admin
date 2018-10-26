<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['barrioCodigo'];
    $val01                          = $_POST['barrioEstado'];
    $val02                          = $_POST['barrioCiudad'];
    $val03                          = $_POST['barrioNombre'];
    $val04                          = $_POST['barrioDescripcion'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02) && isset($val03)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'              	=> $val01,
				'ciudad_codigo'       				=> $val02,
				'barrio_nombre'						=> $val03,
				'barrio_descripcion'				=> $val04
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('400', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('400/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('400/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/locmlbm.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>