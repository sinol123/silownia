<?php

require 'content1.php';

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
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
        <link type="text/javascript" href="hehehe.js">
        <style>
            #leftBlock{
  float: left;
  width: 45%;
  margin: 2.5%;
}

#rightBlock{
  float: left;
  width: 45%;
  margin: 2.5%;
}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="banner">
                <form action="test.php" method="post">
                    <p>
                        <?php
                            echo $_SESSION['klucz1'];
                        ?>
                        <input class="logout" type="submit" name="logout" value="wyloguj">
                    </p>
                </form>
                <img  id="banerImg" src="p.svg" alt="zdjęcie">
            </div>
            <div class="nav">
                <ul>
                    <li><button href="aktualnosci.php" onclick="change(1)"><b>aktualności</b></button></li>
                    <li><button href="cennik.php" onclick="change(2)"><b>cennik</b></button></li>
                    <li><button href="galeria.html" onclick="change(3)"><b>galeria</b></button></li>
                    <li><button href="terminarz.php" onclick="change(4)"><b>terminarz</b></button></li>
                    <li><button href="index.html" onclick="change(5)"><b>kontakt</b></button></li>
                </ul>
            </div>

            <!--aktyalnosci---->
            <div id="sinol" class="content">
                <div id="leftblock">
                    <form action="test.php" method="post">
                        <h3>Lista postów</h3>
                        <table class="postList">
                        <tbody>
                            <?php
                                displayPostList()
                            ?>
                        </tbody>
                        </table>
                        <br>
                        <input class="submit" type="submit" name="hideSubmit" value="ukryj">
                        <input class="submit" type="submit" name="showSubmit" value="odkryj">
                    </form>
                </div>
                <div id="rightBlock">
                    <form action="test.php" method="post">
                        <h3>Napisz Post</h3>
                        <input required type="text" name="headline" placeholder="nagłówek"><br><br>
                        <textarea required name="paragrapf" cols="70" rows="24" placeholder="treść"></textarea><br><br>
                        <input class="submit" type="submit" name="postSubmit" value="hehehe">
                    </form>
                </div>
            </div>

            <!--cennik-->
            <div id="cennik" class="content">
                <h3>Cennik</h3>
                <form action="test.php" method="post">
                    <table style="width:100%">
                        <tr>
                            <td>Karnet:</td><td>Cena:</td>
                        </tr>
                        <?php 
                            displayPriceList();
                        ?>
                    </table>
                    <br>
                    <input class="submit" type="submit" name="priceListSubmit" value="hehehe">
                </form>

            </div>

            <!--galeria-->
            <div id="carousel-wrapper" class="content">
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

            <!--terminarz-->
            <div id="terminarz" class="content">
                <h3>Terminarz</h3>
                <form action="test.php" method="post">
                    <table style="width:100%">
                        <tr>
                            <td>Godzina:</td><td>Poniedziałek:</td><td>Wtorek:</td><td>Środa:</td><td>Czwartek:</td><td>Piątek:</td><td>Sobota:</td><td>Niedziela:</td>
                        </tr>
                        <?php
                            displaySchedue();
                        ?>
                    </table>
                    <br>
                    <input class="submit" type="submit" value="hehehe" name="schedueUpdate">
                </form>
                <br>
                <div class="schedueForm" id="classForm">
                    <form action="test.php" method="post">
                        <h2>Utwórz znowe zajęcia</h2>
                        <p>Nazwa: <input type="text" name="className"></p>
                        <p>Opis: <input type="text" name="description"></p>
                        <p>Czas twania: <input type="text" name="duration"></p>
                        <p>Trener <select name="trainer" id="">
                            <?php
                                displayTrainers();
                            ?>
                        </select></p>
                        <br>
                        <p class="classesSubmit"><input type="submit" class="submit" name="classesSubmit"  value="hehehe"></p>
                    </form>
                </div>
                <div class="schedueForm" id="trainerForm">
                    <form action="test.php" method="post">
                        <h2>Dodaj trenera</h2>
                        <p>imie: <input name="trainerName" type="text"></p>
                        <p>Nazwisko: <input name="surname" type="text"></p>
                        <p class="classesSubmit"><input name="trainerSubmit" value="hehehe" type="submit" class="submit"></p>
                    </form>
                </div>
            </div>
            
            <!--kontakt-->
            <div id="kontakt" class="content">
                <div class="adres">
                    <p class="siu">Kontakt:</p>
                    <p>nr.telefonu: 518 518 476</p>
                    <p>adres: Banana 36, Kiribati</p>
                </div>
                <div class="hours">
                    <p class="siu" >Godziny otwarcia:</p>
                    <p>Pon - Pt:  6:00 - 22:00</p>
                    <p>Sob:  8:00 - 20:00</p>
                    <p>Nd:  15:00 - 20:00</p>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d257611.57911911956!2d-157.3792604724713!3d2.056899439270722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7a02a1b43964bd51%3A0xef0431f28d5a2026!2sSand%20Beach%20Restaurant!5e1!3m2!1spl!2spl!4v1641895432170!5m2!1spl!2spl"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="footer">
                była była była moim ideałem.
            </div>
        </div>
    </body>
    <script type="text/javascript" src="hehehe.js"></script>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script>
    function showSelect(a){

        let numberOfRows = 
        <?php
            $sql = "SELECT COUNT(name) FROM classes;";
            $result = mysqli_query($GLOBALS['conn'], $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result) ) {
                    echo $row['COUNT(name)'];
                }
            }
        ?>;
    
        let tableCell =  document.getElementById(a);

        if(tableCell.firstChild === null || tableCell.firstChild.nodeType === 3 ){
            let select = document.createElement("select");
            select.id = "select" + a;
            select.name = "select" + a;
            select.value = tableCell.innerText;
            for(i = 0; i < numberOfRows; i++){
                let selectOption = document.createElement("option");
                selectOption.value = hehe[i];
                selectOption.innerText = hehe[i];
                select.appendChild(selectOption);
            }
            tableCell.innerText = null;
            tableCell.appendChild(select);
            document.getElementById(select.id).addEventListener('change', (event) => {
            onchange(a);
          }, true);
        }
    
    }
    
    function onchange(a){
        console.log(a);
        let tableCell =  document.getElementById(a);
        let input = document.getElementById(a + "Input");
        let select = tableCell.firstChild;
        tableCell.innerText = select.value;
        input.value = select.value;
        select.remove();
    }

    let hehe = 
    <?php        
        $sql = "SELECT name FROM classes";
        $result = mysqli_query($GLOBALS['conn'], $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "[";
            while($row = mysqli_fetch_assoc($result) ) {
                echo "'" . $row['name'] . "',";
            }
            echo "]";
        }
    ?>
</script>
