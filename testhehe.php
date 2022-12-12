<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "strona";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $schedueSelectQuery = "SELECT * FROM schedue";
    $schedueSelectQueryResult = mysqli_query($conn, $schedueSelectQuery);

    $sql = "SELECT id, headline, paragrapf FROM posts WHERE deleted = 0 ORDER BY id DESC LIMIT 4";
    $result = mysqli_query($conn, $sql);

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
    <link rel="stylesheet" href="styletete.css">
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
                <li><a onclick="change(1)"><b>aktualności</b></a></li>
                <li><a onclick="change(2)"><b>cennik</b></a></li>
                <li><a onclick="change(3)"><b>galeria</b></a></li>
                <li><a onclick="change(4)"><b>terminarz</b></a></li>
                <li><a onclick="change(5)"><b>kontakt</b></a></li>
            </ul>
        </div>


        <div id="sinol">
            <h2>Aktualności</h2>
        <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result) ) {
                    echo "<h3>" . $row["headline"]."</h3> <p> " . $row["paragrapf"]. "</p><br>";
                }
            }
        ?>
                </div>


        <div id="cennik">
            <h2>Cennik</h2>
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


        <div id="headline">
          <h2>Galeria</h2>
        </div>
        <div id="carousel-wrapper">
          <span id="item-1"></span>
          <span id="item-2"></span>
          <span id="item-3"></span>
          <span id="item-4"></span>
          <span id="item-5"></span>
          <div class="carousel-item item-1">
            <a href="#item-5" class="arrow-prev arrow"></a>
            <a href="#item-2" class="arrow-next arrow"></a>
          </div>
      
          <div class="carousel-item item-2">
            <a href="#item-1" class="arrow-prev arrow"></a>
            <a href="#item-3" class="arrow-next arrow"></a>
          </div>
      
          <div class="carousel-item item-3">
            <a href="#item-2" class="arrow-prev arrow"></a>
            <a href="#item-4" class="arrow-next arrow"></a>
          </div>
      
          <div class="carousel-item item-4">
              <a href="#item-3" class="arrow-prev arrow"></a>
              <a href="#item-5" class="arrow-next arrow"></a>
          </div>
      
          <div class="carousel-item item-5">
              <a href="#item-4" class="arrow-prev arrow"></a>
              <a href="#item-1" class="arrow-next arrow"></a>
          </div>
        </div>


        <div id="terminarz">
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


        <div id="contactAndHours">
            <div class="contact">
                <h2>Kontakt:</h2>
                <p>nr.telefonu: 518 518 476</p>
                <p>adres: Banana 36, Kiribati</p>
            </div>
            <div class="hours">
                <h2>Godziny otwarcia:</h2>
                <p>Pon - Pt:  6:00 - 22:00</p>
                <p>Sob:  8:00 - 20:00</p>
                <p>Nd:  15:00 - 20:00</p>
            </div>
        </div>
        <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d257611.57911911956!2d-157.3792604724713!3d2.056899439270722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7a02a1b43964bd51%3A0xef0431f28d5a2026!2sSand%20Beach%20Restaurant!5e1!3m2!1spl!2spl!4v1641895432170!5m2!1spl!2spl"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
        
        var aktualnosci = document.getElementById("sinol");
        var cennik = document.getElementById("cennik");
        var galeria = document.getElementById("headline");
        var galeria2 = document.getElementById("carousel-wrapper");
        var terminarz = document.getElementById("terminarz");
        var kontakt = document.getElementById("contactAndHours");
        var kontakt2 = document.getElementById("map");
        

        function eloelo(){
            aktualnosci.style.zIndex = 0
            cennik.style.zIndex = 0
            galeria.style.zIndex = 0
            galeria2.style.zIndex = 0
            terminarz.style.zIndex = 0
            kontakt.style.zIndex = 0
            kontakt2.style.zIndex = 0
            aktualnosci.style.opacity = 0
            cennik.style.opacity = 0
            galeria.style.opacity = 0
            galeria2.style.opacity = 0
            terminarz.style.opacity = 0
            kontakt.style.opacity = 0
            kontakt2.style.opacity = 0
        }

        function change(a){
            eloelo();
            switch (a){
                case 1: 
                    aktualnosci.style.zIndex = 1;
                    aktualnosci.style.opacity = 1;
                    break
                case 2: 
                    cennik.style.zIndex = 1;
                    cennik.style.opacity = 1;
                    break
                case 3: 
                    galeria.style.zIndex = 1;
                    galeria.style.opacity = 1;
                    galeria2.style.zIndex = 1;
                    galeria2.style.opacity = 1;
                    break
                case 4: 
                    terminarz.style.zIndex = 1;
                    terminarz.style.opacity = 1;
                    break
                case 5: 
                    kontakt.style.zIndex = 1;
                    kontakt.style.opacity = 1;
                    kontakt2.style.zIndex = 1;
                    kontakt2.style.opacity = 1;
                    break

            }
        }
    </script>
</body>
</html>
