<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['tipoCodigo'];
    $val01                          = $_POST['tipoEstado'];
    $val02                          = $_POST['tipoCategoria'];
    $val03                          = $_POST['tipoSubcategoria'];
    $val04                          = $_POST['tipoDescripcion'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02) && isset($val03)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'            	  	=> $val01,
				'tipo_categoria_codigo'       			=> $val02,
				'tipo_subcategoria_codigo'				=> $val03,
				'categoria_subcategoria_descripcion'	=> $val04
            ));

		switch($work02){
			case 'C':
				$result	= post_curl('600', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('600/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('600/'.$work01, $dataJSON);
				break;
		}
    }


	header('Location: ../public/parmtcm.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>