<?php
include('parametros.php');

$mesaje=$_POST['mensaje'];
$archivo=$_POST['archivo'];
$proceso=$_GET['proceso'];

function makeApiCall( $endpoint, $type, $params ) {
    $ch = curl_init();

    if ( 'POST' == $type ) {
        curl_setopt( $ch, CURLOPT_URL, $endpoint );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params ) );
        curl_setopt( $ch, CURLOPT_POST, 1 );
    } elseif ( 'GET' == $type ) {
        curl_setopt( $ch, CURLOPT_URL, $endpoint . '?' . http_build_query( $params ) );
    }

    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

    $response = curl_exec( $ch );
    curl_close( $ch );

    return json_decode( $response, true );
}



switch ($proceso) {
    case 'EnviarFb':
       
    break;
    case 'EnviarIns':
        makeApiCall();      
    break;
    case 'EnviarTw':
              
    break;
    default:
        # code...
        break;
}

die(json_encode($datos)); // Convierte un array en un objeto json
?>