<?php
    require("funciones.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }



</style>

    <h1>Hola Mundo</h1>
    <?php
    //Comentario
    $titulo =  '<h1 class="text-warning">Hola desde PHP</h1>';
    $saludo ="buenas Noches";
    echo $titulo;
    echo "Hola Julio " .$saludo;
    
    $x =1;
    $contador =1;
    while($x<5){
        $contador +=2;
        if($contador==3){

            echo '<p>'.$contador;
        }
        $x +=1;
    }
    ?>

    

    <p>Hoy es <?=hoy()?></p>
    
    <a href="prueba.php">vamos a chambear</a>
    <a href="app.php"> ahora
    </a>
</body>
</html>