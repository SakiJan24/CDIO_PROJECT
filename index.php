<?php
    include("database.php")
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros </title> 
    <style>
        /* Your CSS code goes here */
        <?php include("style.css"); ?>
    </style>
    
</head>
<header>
    <img src="https://datosabiertos.bogota.gov.co/uploads/group/2021-03-11-194153.093663LogoPA3.PNG" alt="Logo">
</header>
<body>
<div class="wrapper">
    <h2>Registro</h2>
    <form action="#" method="POST">
        <div class="input-box">
            <input type="text" name="nombreApellido" placeholder="Ingrese su nombre prueba" required>
        </div>
        <select name="genero">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Otro">Otro</option>
        </select>       
        <div class="input-box">
            <input type="text" name="imei" placeholder="Ingrese su IMEI" required>
        </div>
        <div class="input-box">
            <input type="text" name="edad" placeholder="Ingrese su edad" required>
        </div>
        
        <select name="choice">
            <option value="TI">TI</option>
            <option value="CC">CC</option>
            <option value="Cedula Extranjeria">Cedula Extranjeria</option>
        </select>       
        

        <div class="input-box">
            <input type="text" name="cedula" placeholder="Ingrese su numero de documento " required>
        </div>
        <div class="policy">
            <input type="checkbox" required>
            <h3>Acepto Politica de Tratamiento de Datos</h3>
        </div>
        <div class="input-box button">
            <input type="submit" name="submit" value="Registrarse">
        </div>
        <div class="text">
            <h3>Ya tengo cuenta:     <a href="#">Boton emergencia</a></h3>
        </div>
    </form>
</div>
</body>
</html>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = filter_input(INPUT_POST, "nombreApellido", FILTER_SANITIZE_SPECIAL_CHARS);
        $genero = $_POST['genero'];
        $tipoDoc = $_POST['choice'];
        $imei = filter_input(INPUT_POST, "imei", FILTER_SANITIZE_SPECIAL_CHARS);
        $edad = filter_input(INPUT_POST, "edad", FILTER_SANITIZE_SPECIAL_CHARS);
        $cedula = filter_input(INPUT_POST, "cedula", FILTER_SANITIZE_SPECIAL_CHARS);

        if($tipoDoc == "TI") {

            echo "Please eneter a username";
        }

        else if(empty($cedula)) {

            echo "Please enter a password";
        }

        else {

            
            $sql = "INSERT INTO users2 (name, sex, imei, age, document_type, document_id) 
            VALUES ('$username', '$genero', '$imei', $edad, '$tipoDoc', '$cedula');";
            mysqli_query($conn, $sql);
            
            include("exito.php");
        }
    }

    mysqli_close($conn);
 /*   include("database.php");
    $sql = "INSERT INTO users (user, password) VALUES ('Joseco', 'password123')";
    if (mysqli_query($conn, $sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    

    mysqli_close($conn);*/
?>
