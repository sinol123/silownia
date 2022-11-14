<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "silownia";
$conn = mysqli_connect($servername, $username, $password, $dbname);

#pushPost
if(isset($_POST['postSubmit'])){
    $postInsertQuery = "INSERT INTO posts(id, headline, paragrapf, deleted) VALUES (NULL,'" . $_POST['headline'] . "','" . $_POST['paragrapf'] . "', 0)";
    mysqli_query($conn, $postInsertQuery);
    echo "<script>alert('post wstawiony :))')</script>";
}

#priceListUpdate
if(isset($_POST['priceListSubmit'])){
    for ($i = 1; $i < 5; $i++) {
        $priceListUpdateQuery = "UPDATE cennik SET product = '" . $_POST['product' . $i] . "', price = '" . $_POST['price' . $i] . "' WHERE `cennik`.`id` =" . $i;
        mysqli_query($conn, $priceListUpdateQuery);
    }
    echo "<script>alert('cennik zaktualizowany :))')</script>";
}

#schedueUpdate
if(isset($_POST['schedueUpdate'])){
    for ($i = 1; $i < 7; $i++) {
        $schedueUpdateQuery = "UPDATE schedue SET time = '" . $_POST['time' . $i] . "', monday = '" . $_POST['monday' . $i] . "', tuesday = '" . $_POST['tuesday' . $i] . "', wednesday = '" . $_POST['wednesday' . $i] . "', thursday = '" . $_POST['thursday' . $i] . "', friday = '" . $_POST['friday' . $i] . "', saturday = '" . $_POST['saturday' . $i] . "', sunday = '" . $_POST['sunday' . $i] . "' WHERE id =" . $i;
        mysqli_query($conn, $schedueUpdateQuery);
     }
     echo "<script>alert('terminarz zaktualizowany :))')</script>";
}

#showPosts
if(isset($_POST['showSubmit'])){

    #count rows for the loop
    $postsCountQuery = "SELECT COUNT(id) FROM posts";
    $postsCountQueryResult = mysqli_query($conn, $postsCountQuery);

    while($row = mysqli_fetch_assoc($postsCountQueryResult)){
        $rows = $row['COUNT(id)'];
    }
    

    #showPosts
    for($i = 1; $i < $rows + 1; $i++){
        if(isset($_POST['post' . $i])){
            $postUpdateQuery = "UPDATE `posts` SET `deleted`= 0 WHERE id =" . $i;
            mysqli_query($conn, $postUpdateQuery);
        };
    }
    echo "<script>alert('posty odkryte :))')</script>";
}

#hidePosts
if(isset($_POST['hideSubmit'])){

    #count rows for the loop
    $postsCountQuery = "SELECT COUNT(id) FROM posts";
    $postsCountQueryResult = mysqli_query($conn, $postsCountQuery);

    while($row = mysqli_fetch_assoc($postsCountQueryResult)){
        $rows = $row['COUNT(id)'];
    }
    

    #hidePosts
    for($i = 1; $i < $rows + 1; $i++){
        if(isset($_POST['post' . $i])){
            $postUpdateQuery = "UPDATE `posts` SET `deleted`= 1 WHERE id =" . $i;
            mysqli_query($conn, $postUpdateQuery);
        };
    }
    echo "<script>alert('posty ukryte :))')</script>";
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
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
        <link type="text/javascript" href="hehehe.js">
    </head>
    <body>
        <div class="container">
            <div class="banner">
                <img src="p.svg" alt="zdjęcie">
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
                        <h3>lista postów</h3>
                        <table class="postList">
                        <tbody>
                            <?php
                                #displayPostLIst
                                $postSelectQuery = "SELECT * FROM posts";
                                $postSelectQueryResult = mysqli_query($conn, $postSelectQuery);

                                if(mysqli_num_rows($postSelectQueryResult) > 0){
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($postSelectQueryResult)){
                                        echo"<tr class='postLi'>
                                        <td class='postTd1' ><input class='checkbox' type='checkbox' id='post" . $i . "' name='post" . $i . "'></td>
                                        <td class='postTd2'>" . $row['headline'] . "</td>
                                        <td class='postTd3'> deleted? " . $row['deleted'] . "</td></tr>";
                                        $i++;
                                    }
                                }
                            ?>
                        </tbody>
                        </table>
                        <input type="submit" name="hideSubmit" value="ukryj">
                        <input type="submit" name="showSubmit" value="odkryj">
                    </form>
                </div>
                <div id="rightBlock">
                    <form action="test.php" method="post">
                        <h3>Napisz Post</h3>
                        <input type="text" name="headline" placeholder="nagłówek"><br><br>
                        <textarea name="paragrapf" cols="30" rows="10" placeholder="treść"></textarea><br><br>
                        <input type="submit" name="postSubmit" value="hehehe">
                    </form>
                </div>
            </div>

            <!--cennik-->
            <div id="cennik" class="content">
                <form action="test.php" method="post">
                    <table style="width:100%">
                        <tr>
                            <td>Karnet:</td><td>Cena:</td>
                        </tr>
                        <?php 
                            $sql2 = "SELECT * FROM cennik";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($result2) ) {
                                    echo    '<tr>
                                                <td name="product' . $i . '" id="product' . $i . '" onclick="replaceNode(`product' . $i . '`)">'. $row['product']. '</td>
                                                <td name="price' . $i . '" id="price' . $i . '" onclick="replaceNode(`price' . $i . '`)">'. $row['price']. '</td>
                                            </tr>';
                                    echo '<input type="hidden" value="'. $row['product']. '" id="product' . $i . 'Input" name="product' . $i . '"><input value="'. $row['price']. '" type="hidden" id="price' . $i . 'Input" name="price' . $i . '">';
                                    $i++;
                                    }
                            }
                        ?>
                    </table>
                    <input type="submit" name="priceListSubmit" value="hehehe">
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
                <form action="test.php" method="post">
                    <table style="width:100%">
                        <tr>
                            <td>Godzina:</td><td>Poniedziałek:</td><td>Wtorek:</td><td>Środa:</td><td>Czwartek:</td><td>Piątek:</td><td>Sobota:</td><td>Niedziela:</td>
                        </tr>
                        <?php
                            $schedueSelectQuery = "SELECT * FROM schedue";
                            $schedueSelectQueryResult = mysqli_query($conn, $schedueSelectQuery);
                            if (mysqli_num_rows($schedueSelectQueryResult) > 0) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($schedueSelectQueryResult) ) {
                                    echo '<tr>
                                            <td name="time' . $i . '" id="time' . $i . '" onclick="replaceNode(`time' . $i . '`)">'. $row['time']. '</td>
                                            <td name="monday' . $i . '" id="monday' . $i . '" onclick="replaceNode(`monday' . $i . '`)">'. $row['monday']. '</td>
                                            <td name="tuesday' . $i . '" id="tuesday' . $i . '" onclick="replaceNode(`tuesday' . $i . '`)">'. $row['tuesday']. '</td>
                                            <td name="wednesday' . $i . '" id="wednesday' . $i . '" onclick="replaceNode(`wednesday' . $i . '`)">'. $row['wednesday']. '</td>
                                            <td name="thursday' . $i . '" id="thursday' . $i . '" onclick="replaceNode(`thursday' . $i . '`)">'. $row['thursday']. '</td>
                                            <td name="friday' . $i . '" id="friday' . $i . '" onclick="replaceNode(`friday' . $i . '`)">'. $row['friday']. '</td>
                                            <td name="saturday' . $i . '" id="saturday' . $i . '" onclick="replaceNode(`saturday' . $i . '`)">'. $row['saturday']. '</td>
                                            <td name="sunday' . $i . '" id="sunday' . $i . '" onclick="replaceNode(`sunday' . $i . '`)">'. $row['sunday']. '</td>
                                        </tr>';
                                        echo '<input type="hidden" value="'. $row['time']. '" id="time' . $i . 'Input" name="time' . $i . '">
                                        <input type="hidden" value="'. $row['monday']. '" id="monday' . $i . 'Input" name="monday' . $i . '">
                                        <input type="hidden" value="'. $row['tuesday']. '" id="tuesday' . $i . 'Input" name="tuesday' . $i . '">
                                        <input type="hidden" value="'. $row['wednesday']. '" id="wednesday' . $i . 'Input" name="wednesday' . $i . '">
                                        <input type="hidden" value="'. $row['thursday']. '" id="thursday' . $i . 'Input" name="thursday' . $i . '">
                                        <input type="hidden" value="'. $row['friday']. '" id="friday' . $i . 'Input" name="friday' . $i . '">
                                        <input type="hidden" value="'. $row['saturday']. '" id="saturday' . $i . 'Input" name="saturday' . $i . '">
                                        <input value="'. $row['sunday']. '" type="hidden" id="sunday' . $i . 'Input" name="sunday' . $i . '">';
                                        $i++;
                                }
                            }
                        ?>
                    </table>
                    <input type="submit" value="hehehe" name="schedueUpdate">
                </form>
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
      
        </div>
    </body>
    <script type="text/javascript" src="hehehe.js"></script>
</html>
