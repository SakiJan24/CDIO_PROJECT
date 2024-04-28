<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "seguridad";
$conn = "";

try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    if (!$conn) {
        throw new mysqli_sql_exception("Could not connect to database");
    }
   // echo "You are connected<br>";

    // Example SQL INSERT statement with both user and password
    
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
