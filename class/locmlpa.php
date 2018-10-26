<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['paisCodigo'];
    $val01                          = $_POST['paisEstado'];
    $val02                          = $_POST['paisNombre'];
    $val03                          = $_POST['paisDescripcion'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'              	=> $val01,
				'pais_nombre'       				=> $val02,
				'pais_descripcion'					=> $val03
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('100', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('100/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('100/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/locmlpm.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>