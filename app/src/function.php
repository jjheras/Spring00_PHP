
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])&& isset($_POST["edad"])&& isset($_POST["descripcion"])){
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $edad = isset($_POST["edad"]) ? $_POST["edad"] : "";
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
        // guardamos los datos en una array
        function guardar_array($nombre,$edad,$descripcion){
            $array = [
                "nombre" => $nombre,
                "edad" => $edad,
                "descripcion" => $descripcion
            ];
            return $array;
        }
        //Creamos los archivos separando la información del array
        function guardar_archivos($array){
            if($array['edad'] != ""){
                $fileEdades = fopen("archivos/edades_participantes.txt", "a");

                fwrite($fileEdades, "{$array['edad']}\n");
                fclose($fileEdades);
            }else{
                //echo "La edad esta vacia";
            }
            if($array['nombre'] != "" && $array['descripcion']!= ""){
                $fileInfoParticipantes = fopen("archivos/info_participantes.txt", "a");

                fwrite($fileInfoParticipantes, "{$array['nombre']}\n{$array['descripcion']}\n");
                fclose($fileInfoParticipantes);
            }else{
                //echo "O el nombre o la descripción estan vacios";
            }
        }
        if($_POST["nombre"] != "" && $_POST["edad"]!="" && $_POST["descripcion"]!=""){
            $arrayDatos = guardar_array($nombre,$edad,$descripcion);
            guardar_archivos($arrayDatos);
            //echo "Archivos creados";
        }

    }else {
        //echo "Hay algún elemento que esta vacio";
    }
    if(file_exists("archivos/edades_participantes.txt")){
        //leemos el contenido del archivo de las edades y lo guardamos en un array para obtener la media 
        $edades = file("archivos/edades_participantes.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        //lo convertimos en array de enteros para poder manejarlos
        $edades_enteros = array_map('intval', $edades);
        
        //reiniciamos las variables
        $suma_edades=0;
        $contador=0;

        //recorremos el array para sumar las edades y contar cuantas hay
        for($i=0;$i<count($edades_enteros);$i++){
            $suma_edades += $edades_enteros[$i];
            $contador++;
        }
        //calculamos la media y la guardamos en la variable 
        $media_edades = $suma_edades / $contador;

    }else{
        //echo "El archivo de las edades no existe";

    }
    ?>