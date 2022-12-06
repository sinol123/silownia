<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "strona";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $schedueSelectQuery = "SELECT * FROM schedue";
    $schedueSelectQueryResult = mysqli_query($conn, $schedueSelectQuery);


    function showSchedue(){

        if (mysqli_num_rows($GLOBALS['schedueSelectQueryResult']) > 0) {
            while($row = mysqli_fetch_assoc($GLOBALS['schedueSelectQueryResult']) ) {
                $rowArray =  array($row['time'], $row['monday'], $row['tuesday'], $row['wednesday'], $row['thursday'], $row['friday'], $row['saturday'],  $row['sunday']);
                echo '<tr>';
                echo '<td>' . $rowArray[0] . '</td>';

                    
                for ($i = 1; $i < 8; $i++) {
                
                    $halo = "SELECT classes.description, classes.duration, trainers.name, trainers.surname FROM classes INNER JOIN trainers ON classes.trainerId = trainers.id WHERE classes.name = '" . $rowArray[$i] . "'" ;

                    $haloQueryResult = mysqli_query($GLOBALS['conn'], $halo);

                    if (mysqli_num_rows($haloQueryResult) > 0) {
                        while($row = mysqli_fetch_assoc($haloQueryResult) ) {
                            echo
                                    '<td onclick="alerte(`' . $rowArray[0] . '`, `' . $rowArray[$i] . '`, `' . $row['description'] . '`, `' . $row['name'] . ' ' . $row['surname'] . '`, `' . $row['duration'] . '`)">' . $rowArray[$i] . '</td>';

                        }
                    }
                }
                  
                echo '</tr>';
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
            <h2>Terminarz</h2>
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

</div>

<div id="popup1" class="overlay">
  <div class="popup">
    <h2>Zajęcia :00</h2>
    <a class="close" href="#">×</a>
    <div class="content">
      <p id="p1"></p>
      <p id="p2"></p>
      <p id="p3"></p>
      <p id="p4"></p>
      <p id="p5"></p>
    </div>
  </div>
</div>
    <script>
        function alerte(a, b, c ,d, e){
            if(c != `brak`){
                let p1 = document.getElementById("p1");
                let p2 = document.getElementById("p2");
                let p3 = document.getElementById("p3");
                let p4 = document.getElementById("p4");
                let p5 = document.getElementById("p5");

                p1.innerText = "Godzina: " + a;
                p2.innerText = "Nazwa: " + b;
                p3.innerText = "Opis: " + c;
                p4.innerText = "Trener: " + d;
                p5.innerText = "Czas trwania: " + e;

                location.href="#popup1"
            }
        }
        
    </script>
</body>
</html>
