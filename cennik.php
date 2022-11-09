<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "strona";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM cennik";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>cennik</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="icon2.png" type="image/x-icon">

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
        <div class="cennik">
            <table style="width:100%">
            <tr>
                <td>Karnet:</td><td>Cena:</td>
            </tr>
                <?php 
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result) ) {
                            echo    "<tr>
                                        <td>". $row['product']. "</td>
                                        <td>".$row['price'].  "</td>
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
