<?php
echo '<h1>Aqui estamos procesando las fotos</h1>';

$imagenes = $_FILES['img'];

echo '<hr>';
echo count($imagenes);
foreach ($imagenes as $un_archivo){
    echo '<br> ==> ';
    var_dump($un_archivo);
    foreach ($un_archivo as $item){
        echo '<br> ==> ==> ';
        var_dump($item);
    }
    echo '<hr>';
}
echo '<hr>';
echo $imagenes['name'][0];
echo '<br>';
echo $imagenes['type'][0];
echo '<br>';
echo $imagenes['tmp_name'][0];
echo '<br>';
echo $imagenes['error'][0];
echo '<br>';
echo $imagenes['size'][0];
echo '<hr>';
echo count($imagenes['name']);
echo '<br>';
echo date('m-d-Y');

$ruta_directorio = './imagenes/'.$_POST['marca'];
crear_directorio($ruta_directorio);
guardar_varios_archivos($imagenes, $ruta_directorio);

function crear_directorio($nombre_directorio){
    if(!is_dir($nombre_directorio)){
        mkdir($nombre_directorio);
    }
}

// $array_files = $_FILES['nombre input']
function guardar_varios_archivos($array_files, $ruta_donde_guardarlos){
    for($i = 0; $i < count($array_files['name']); $i++){
        $nombre_archivo = date('m-d-Y') . '--' . $array_files['name'][$i];
        move_uploaded_file($array_files['tmp_name'][$i], $ruta_donde_guardarlos . '/' . $nombre_archivo);
    }
}
