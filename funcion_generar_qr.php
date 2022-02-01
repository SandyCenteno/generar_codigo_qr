

<?php
include_once(dirname(__FILE__) . '/phpqrcode/qrlib.php');

$carpeta = dirname(__FILE__) . "/imagenes/";

$links = array(
    array(
        "nombre" => "google",
        "url" => "https://www.google.com.mx"
    ),
    array(
        "nombre" => "facebook",
        "url" => "https://www.facebook.com.mx"
    )
);

print_r($links); 

foreach ($links as $key => $link) {
    $contenido = $link['url'];

    $nombre_imagen = $link['nombre'];

    $generar_qr = generar_qr($contenido, $carpeta, $nombre_imagen);

    print_r($generar_qr);
}


/**
 * Funciones
 * 
 * */

function generar_qr($contenido, $carpeta, $nombre)
{
    try {

        /**
         * Información a codificar,
         * Ubicación donde guardar el código generado,
         * Nivel de código: Al igual que la información a codificar, se obtiene de lo marcado en el formulario (H, M, Q, L),
         * Tamaño: Hace referencia al tamaño del código generado. Se puede poner un valor fijo para que todos sean iguales
         * Margen
         * */

        QRcode::png($contenido, $carpeta . $nombre . "_" . date('d-m-Y-h-i-s') . ".png", "H", 50, 2);

        return 200;

    } catch (\Throwable $th) {

        return 500;
        
    }
}
