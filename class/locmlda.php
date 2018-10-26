<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['distritoCodigo'];
    $val01                          = $_POST['distritoEstado'];
    $val02                          = $_POST['distritoPais'];
    $val03                          = $_POST['distritoNombre'];
    $val04                          = $_POST['distritoDescripcion'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02) && isset($val03)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'              	=> $val01,
				'pais_codigo'       				=> $val02,
				'distrito_nombre'					=> $val03,
				'distrito_descripcion'				=> $val04
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('200', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('200/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('200/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/locmldm.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>