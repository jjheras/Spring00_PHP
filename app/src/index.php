<?php
    include "function.php";
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="formularioLab" content="width=device-width, initial-scale=1.0">
    <title>Formulario lab0</title>
</head>
<body>
    <h1>Información de usuarios</h1>
    <form method="POST" action="index.php">
        <div>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" require>
                <br><br>
            </div>
            <div>
                <label for="Edad">Edad</label>
                <input type="number" id="edad" name="edad" require>
                <br><br>
            </div>
            <div>
                <label for="descripcion">Descripción personal</label>
                <textarea type="text" id="descripcion" name="descripcion" require></textarea>
                <br><br>
            </div>
            <div>
                <input type="submit" value="Enviar">
                <br><br>
            </div>
            <div>
                <label for="edadMedia">La edad media de los usuarios es: </label>
                <label id="nEdadMedia" for="resultado"><?php if(isset ($media_edades)) echo round($media_edades); ?></label>
            </div>
        </div>
    </form>
</body>
</html>
