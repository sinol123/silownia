<?php
#login check
session_start();
if(isset($_SESSION['klucz1'])){
    echo "<script>console.log('siema siema')</script>";
}
else{
    exit("Fuck Offf");
}

#logout
if(isset($_POST['logout'])){
    session_destroy();
    exit('zostałeś wylogowany');
}

#connectToDataBase
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "strona";

$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

#priceListUpdate
if(isset($_POST['priceListSubmit'])){
    for ($i = 1; $i < 5; $i++) {
        $priceListUpdateQuery = "UPDATE cennik SET product = '" . $_POST['product' . $i] . "', price = '" . $_POST['price' . $i] . "' WHERE `cennik`.`id` =" . $i;
        mysqli_query($conn, $priceListUpdateQuery);
     }
     echo "<script>alert('cennik zaktualizowany :))')</script>";
}

#schedueUpdate
if(isset($_POST['schedueSubmit'])){
    for ($i = 1; $i < 7; $i++) {
        $schedueUpdateQuery = "UPDATE schedue SET time = '" . $_POST['time' . $i] . "', monday = '" . $_POST['monday' . $i] . "', tuesday = '" . $_POST['tuesday' . $i] . "', wednesday = '" . $_POST['wednesday' . $i] . "', thursday = '" . $_POST['thursday' . $i] . "', friday = '" . $_POST['friday' . $i] . "', saturday = '" . $_POST['saturday' . $i] . "', sunday = '" . $_POST['sunday' . $i] . "' WHERE id =" . $i;
        mysqli_query($conn, $schedueUpdateQuery);
     }
     echo "<script>alert('terminarz zaktualizowany :))')</script>";
}

#pushPost
if(isset($_POST['postSubmit'])){
    $postInsertQuery = "INSERT INTO posts(id, headline, paragrapf, deleted) VALUES (NULL,'" . $_POST['headline'] . "','" . $_POST['paragrapf'] . "', 0)";
    mysqli_query($conn, $postInsertQuery);
    echo "<script>alert('post wstawiony :))')</script>";
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
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="mateusz.jpg" type="image/x-icon">
    <title>admin</title>
    <style>

        .postList{
            display: block;
            border:2px solid rgb(119, 118, 118); 
	        width:300px; 
	        height: 100px; 
	        overflow-y: scroll;
        }

        td:hover{
            background-color: rgb(143, 143, 143);
        }

        .postTd1{
            width: 41px;
        }

        .postTd2{
            width:160px;
        }

        .postTd3{
            width: 66px;
        }

        .checkbox{
            margin: 0px 14px 0px 14px;
        }
    </style>
    
</head>
<body>
        <form action="admin4.php" method="post">
            <p>
                <?php
                    echo $_SESSION['klucz1'];
                ?>
                <input type="submit" name="logout" value="wyloguj">
            </p>
        </form>
        <form action="admin4.php" method="post">
            <h3>Cennik</h3>
            <table>
                <tr>
                    <td>Karnet</td><td>Cena</td>
                </tr>
                <?php
                    #displayPriceList
                    $priceListSelectQuery = "SELECT * FROM cennik";
                    $priceListSelectQueryResult = mysqli_query($conn, $priceListSelectQuery);

                    if(mysqli_num_rows($priceListSelectQueryResult) > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($priceListSelectQueryResult)){
                            echo"<tr>
                                    <td class='inputCell' ><input type='text' value='" . $row['product'] ."' name='product" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['price'] ."' name='price" . $i . "'></td>
                                </tr>";
                            $i++;
                        }
                    }
                ?>
            </table>
            <br>
            <input type="submit" name="priceListSubmit" value="hehehe">
        </form>
        <hr>
        <form action="admin4.php" method="post">
            <h3>Terminarz</h3>
            <table>
                <tr>
                    <td>Godzina:</td><td>Poniedziałek:</td><td>Wtorek:</td><td>Środa:</td><td>Czwartek:</td><td>Piątek:</td><td>Sobota:</td><td>Niedziela:</td>
                </tr>
                <?php
                    #displaySchedue
                    $schedueSelectQuery = "SELECT * FROM schedue";
                    $schedueSelectQueryResult = mysqli_query($conn, $schedueSelectQuery);

                    if(mysqli_num_rows($schedueSelectQueryResult) > 0){
                        $i = 1;
                        while($row = mysqli_fetch_assoc($schedueSelectQueryResult)){
                            echo"<tr>
                                    <td class='inputCell' ><input type='text' value='" . $row['time'] ."' name='time" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['monday'] ."' name='monday" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['tuesday'] ."' name='tuesday" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['wednesday'] ."' name='wednesday" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['thursday'] ."' name='thursday" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['friday'] ."' name='friday" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['saturday'] ."' name='saturday" . $i . "'></td>
                                    <td class='inputCell' ><input type='text' value='" . $row['sunday'] ."' name='sunday" . $i . "'></td>
                                </tr>";
                                $i++;
                        }
                    }
                ?>
            </table>
            <br>
            <input type="submit" name="schedueSubmit" value="hehehe">
        </form>
        <hr>
        <form action="admin4.php" method="post">
            <h3>Napisz Post</h3>
            <input type="text" name="headline" placeholder="nagłówek"><br><br>
            <textarea name="paragrapf" cols="30" rows="10" placeholder="treść"></textarea><br><br>
            <input type="submit" name="postSubmit" value="hehehe">
        </form>
        <hr>
        <form action="admin4.php" method="post">
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
</body>
</html>