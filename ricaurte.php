<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
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
    <h2>Registros</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Tipo de documento</th>
            <th>Número de documento</th>
            <th>Fecha de registro</th>
            <th>Estación</th>
        </tr>
        <?php
        // Database connection
        $conn = mysqli_connect("localhost", "root", "", "seguridad");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // SQL query
        $sql = "SELECT u.name, u.document_type, u.document_number, d.fecha, d.estacion
                FROM users u
                INNER JOIN denuncia d ON u.document_number = d.document_number
                WHERE d.estacion = 'Ricaurte'";
        
        // Execute query
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["document_type"] . "</td>";
                echo "<td>" . $row["document_number"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td>" . $row["estacion"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay registros</td></tr>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </table>
</div>
<script>
    // Function to check time difference and display notification
    function checkTimeDifference() {
        // Get all table rows except the header row
        const rows = document.querySelectorAll("table tr:not(:first-child)");

        rows.forEach(row => {
            // Get the timestamp from the table cell
            const timestamp = new Date(row.cells[3].textContent);

            // Calculate the time difference in milliseconds
            const timeDifference = new Date() - timestamp;

            // Check if the time difference is less than 5 minutes (300,000 milliseconds)
            if (timeDifference < 300000) {
                // Display a warning notification
                
                const audio = document.createElement('audio');
                audio.src = 'emergency_alert.mp3'; // Path to your audio file
                audio.autoplay = true; // Autoplay the audio
                audio.style.display = 'none'; // Hide the audio element

                // Append the audio element to the document body
                document.body.appendChild(audio);
                alert("ADVERTENCIA: Robo reciente en progreso");
                
            }
        });
    }

    // Call the function after the page is loaded
    window.onload = function() {
        checkTimeDifference();
    };
</script>
</body>
</html>
