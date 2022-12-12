<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "strona";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT id, headline, paragrapf FROM posts WHERE deleted = 0 ORDER BY id DESC LIMIT 4";
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
    <title>aktualności</title>
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
                <li><a onclick="console.log('ss')"><b>aktualności</b></li>
                <li><a href="cennik.php"><b>cennik</b></a></li>
                <li><a href="galeria.html"><b>galeria</b></a></li>
                <li><a href="terminarz.php" ><b>terminarz</b></a></li>
                <li><a href="index.html" ><b>kontakt</b></a></li>
            </ul>
        </div>
        <div class="sinol">
            <h2>Aktualności</h2>
        <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result) ) {
                    echo "<h3>" . $row["headline"]."</h3> <p> " . $row["paragrapf"]. "</p><br>";
                }
            }
        ?>
                </div>
                <div class="footer2">
                    Lorem ipsum dolor sit amet.
                </div>
            </div>
</body>
</html>