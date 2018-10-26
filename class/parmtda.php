<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['tipoCodigo'];
    $val01                          = $_POST['tipoEstado'];
    $val02                          = $_POST['tipoNombre'];
    $val03                          = $_POST['tipoDominio'];
    $val04                          = $_POST['tipoDescripcion'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];
    $work03                         = $_POST['workDominio'];

    if (isset($val01) && isset($val02) && isset($val03)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'              	=> $val01,
				'tipo_nombre'       				=> $val02,
				'tipo_dominio'						=> $val03,
				'tipo_descripcion'					=> $val04
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('500', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('500/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('500/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/parmtdm.php?dominio='.$work03.'&mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>