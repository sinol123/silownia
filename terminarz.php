<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "strona";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $schedueSelectQuery = "SELECT * FROM schedue";
    $schedueSelectQueryResult = mysqli_query($conn, $schedueSelectQuery);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>terminarz</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="icon2.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="banner">
            <img src="p.svg" alt="zdjęcie">
        </div>
        <div class="xd"></div>
        <div class="nav">
            <ul>
                <li><a href="aktualnosci.php"><b>aktualności</b></a></li>
                <li><a href="cennik.php"><b>cennik</b></a></li>
                <li><a href="galeria.html"><b>galeria</b></a></li>
                <li><a href="terminarz.php" ><b>terminarz</b></a></li>
                <li><a href="index.html" ><b>kontakt</b></a></li>
            </ul>
        </div>
        <div class="terminarz">
            <table style="width:100%">
                <tr>
                    <td>Godzina:</td><td>Poniedziałek:</td><td>Wtorek:</td><td>Środa:</td><td>Czwartek:</td><td>Piątek:</td><td>Sobota:</td><td>Niedziela:</td>
                </tr>
            <?php 
                if (mysqli_num_rows($schedueSelectQueryResult) > 0) {
                    while($row = mysqli_fetch_assoc($schedueSelectQueryResult) ) {
                           echo "<tr>
                                    <td>" . $row['time'] . "</td>
                                    <td>" . $row['monday'] . "</td>
                                    <td>" . $row['tuesday'] . "</td>
                                    <td>" . $row['wednesday'] . "</td>
                                    <td>" . $row['thursday'] . "</td>
                                    <td>" . $row['friday'] . "</td>
                                    <td>" . $row['saturday'] . "</td>
                                    <td>" . $row['sunday'] . "</td>
                                </tr>";
                            }
                    }
                ?>
            </table>
        </div>
        <div class="footer">
            Lorem ipsum dolor sit amet.
          </div>
    </div>
</body>
</html>