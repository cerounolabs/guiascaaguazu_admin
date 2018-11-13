<?php
	ob_start();

    require '../class/curl_api.php';

    $val00                          = $_POST['empresaCodigo'];
    $val01                          = $_POST['empresaEstado'];
    $val02                          = $_POST['empresaTipo'];
    $val03                          = $_POST['empresaNombre'];
    $val04                          = $_POST['empresaRuc'];
	$val05 	                        = $_POST['empresaLogo'];
	$val06                          = $_POST['empresaOAdministrador'];
	$val07                          = $_POST['empresaOCliente'];

    $work01                         = $_POST['workCodigo'];
    $work02                         = $_POST['workModo'];

    if (isset($val01) && isset($val02) && isset($val03) && isset($val04)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'			=> $val01,
				'tipo_subcategoria_codigo'		=> $val02,
				'empresa_nombre'				=> $val03,
				'empresa_ruc'					=> $val04,
				'empresa_logo'					=> $val05,
				'empresa_obs_administrador'		=> $val06,
				'empresa_obs_cliente'			=> $val07
            ));
		
		switch($work02){
			case 'C':
				$result	= post_curl('800', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('800/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('800/'.$work01, $dataJSON);
				break;
		}
    }

	header('Location: ../public/empmemm.php?mode='.$work02.'&codigo='.$work01);

	ob_end_flush();
?>