<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "strona";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $schedueSelectQuery = "SELECT * FROM schedue";
    $schedueSelectQueryResult = mysqli_query($conn, $schedueSelectQuery);
    mysqli_close($conn);

    function showSchedue(){
        if (mysqli_num_rows($GLOBALS['schedueSelectQueryResult']) > 0) {
            $i = 1;
            while($row = mysqli_fetch_assoc($GLOBALS['schedueSelectQueryResult']) ) {
                   echo "<tr>
                            <td>" . $row['time'] . "</td>
                            <td onclick=alert('monday". $i .", 'asd','asda,')>" . $row['monday'] . "</td>
                            <td onclick=hehe('tuesday". $i ."')>" . $row['tuesday'] . "</td>
                            <td onclick=hehe('wednesday". $i ."')>" . $row['wednesday'] . "</td>
                            <td onclick=hehe('thursday". $i ."')>" . $row['thursday'] . "</td>
                            <td onclick=hehe('friday". $i ."')>" . $row['friday'] . "</td>
                            <td onclick=hehe('saturday". $i ."')>" . $row['saturday'] . "</td>
                            <td onclick=hehe('sunday". $i ."')>" . $row['sunday'] . "</td>
                        </tr>";
                    }

            }
    }
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
                <form id="form" action="terminarz.php" method="post">
                    <?php
                        showSchedue();
                    ?>
                </form>
            </table>
        </div>
        <div class="footer">
            Lorem ipsum dolor sit amet.
          </div>
    </div>
    <script>
        function alert(a, b, c ,d){
        alert(a+ "\n" + b +"\n"+c+ "\n" + d )
        }
    </script>
</body>
</html>
