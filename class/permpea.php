<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['personaCodigo'];
    $val01                          = $_POST['personaEstado'];
    $val02                          = $_POST['personaTipo'];
    $val03                          = $_POST['documentoTipo'];
    $val04                          = $_POST['documentoNumero'];
	$val05 	                        = $_POST['personFechaNac'];
	$val06                          = $_POST['personaNombre'];
	$val07                          = $_POST['personaApellido'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02) && isset($val03) && isset($val04) && isset($val05) && isset($val06) && isset($val07)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'              	=> $val01,
				'tipo_persona_codigo'       		=> $val02,
				'tipo_documento_codigo'				=> $val03,
				'persona_nombre'					=> $val06,
				'persona_apellido'					=> $val07,
				'persona_documento_numero'			=> $val04,
				'persona_fecha_nacimiento'			=> $val05
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('700', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('700/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('700/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/permpem.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>