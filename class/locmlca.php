<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['ciudadCodigo'];
    $val01                          = $_POST['ciudadEstado'];
    $val02                          = $_POST['ciudadDistrito'];
    $val03                          = $_POST['ciudadNombre'];
    $val04                          = $_POST['ciudadDescripcion'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02) && isset($val03)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'              	=> $val01,
				'distrito_codigo'       			=> $val02,
				'ciudad_nombre'						=> $val03,
				'ciudad_descripcion'				=> $val04
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('300', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('300/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('300/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/locmlcm.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>