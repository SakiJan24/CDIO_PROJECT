<?php
    include("database.php")
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration or Sign Up </title> 
    <style>
        /* Your CSS code goes here */
        <?php include("style2.css"); ?>
    </style>
</head>
<header>
    <img src="https://datosabiertos.bogota.gov.co/uploads/group/2021-03-11-194153.093663LogoPA3.PNG" alt="Logo">
</header>
<body>
<div class="wrapper">
    <h2>Botón the pánico</h2>
    <form action="#" method="POST">
        

        <div class="input-box">
            <input type="text" name="cedula" placeholder="Ingrese su numero de documento " required>
        </div>
        <select name="choice">
            <option value="Ricaurte">Ricaurte</option>
            <option value="Jimenez">Jiménez</option>
            <option value="PortalNorte">Portal Norte</option>
            <option value="MuseoOro">Museo del Oro</option>
            <option value="Calle127">Calle 127</option>
            <option value="PortalUsme">Portal Usme</option>
        </select>       
        <div class="policy">
            <input type="checkbox" required>
            <h3>Acepto Politica de Tratamiento de Datos</h3>
        </div>
        <div class="input-box button">
            <input type="submit" name="submit" value="Denunciar">
        </div>
    </form>
</div>
</body>
</html>


<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $cedula = filter_input(INPUT_POST, "cedula", FILTER_SANITIZE_SPECIAL_CHARS);
        $estacion = $_POST['choice'];
        if($tipoDoc == "TI") {

            echo "Please eneter a username";
        }

        else if(empty($cedula)) {

            echo "Please enter a password";
        }

        else {

            

            $sql1 = "SELECT user FROM users WHERE document_number = '{$cedula}'";
            $row = mysqli_query($conn, $sql1);
            
            if(empty($row)) {
                //echo "user not registered, please register before denouncing";
                include("fallo.php");
            }

            else {  

                $sql2 = "INSERT INTO denuncia (document_number, estacion )
                    VALUES('$cedula', '$estacion')";
                mysqli_query($conn, $sql2);
                include("exito2.php");
            }
           
            
            
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
