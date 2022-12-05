<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "strona";
$conn = mysqli_connect($servername, $username, $password, $dbname);

#login check
session_start();
if(isset($_SESSION['klucz1'])){
    
}
else{
    exit("Fuck Offf");
}

#logout
if(isset($_POST['logout'])){
    session_destroy();
    exit('zostałeś wylogowany');
}

#createClass
if(isset($_POST['classesSubmit'])){
    $classInsertQuery = "INSERT INTO classes (name, description, trainerId, duration) VALUES ('" . $_POST['className'] . "', '" . $_POST['description'] . "', '" . $_POST['trainer'] . "', '" . $_POST['duration'] . "');";
    mysqli_query($conn, $classInsertQuery);
    echo "<script>alert('Zajęcia utworzone :))')</script>";
}

#createTrainer
if(isset($_POST['trainerSubmit'])){
    $trainerInsertQuery = "INSERT INTO trainers (id, name, surname) VALUES (NULL, '" . $_POST['trainerName'] . "', '" . $_POST['surname'] . "')";
    mysqli_query($conn, $trainerInsertQuery);
    echo "<script>alert('trener Dodany :))')</script>";
}

#pushPost
if(isset($_POST['postSubmit'])){
    unset($_POST['postSubmit']);
    $postInsertQuery = "INSERT INTO posts(id, headline, paragrapf, deleted) VALUES (NULL,'" . $_POST['headline'] . "','" . $_POST['paragrapf'] . "', 0)";
    mysqli_query($conn, $postInsertQuery);
    echo "<script>alert('post wstawiony :))')</script>";
}

#priceListUpdate
if(isset($_POST['priceListSubmit'])){
    for ($i = 1; $i < 5; $i++) {
        $priceListUpdateQuery = "UPDATE pricelist SET product = '" . $_POST['product' . $i] . "', price = '" . $_POST['price' . $i] . "' WHERE pricelist.id =" . $i;
        mysqli_query($conn, $priceListUpdateQuery);
    }
    echo "<script>alert('cennik zaktualizowany :))')</script>";
}

#schedueUpdate
if(isset($_POST['schedueUpdate'])){
    for ($i = 1; $i < 6; $i++) {
        $schedueUpdateQuery = "UPDATE schedue SET time = '" . $_POST['time' . $i] . "', monday = '" . $_POST['monday' . $i] . "', tuesday = '" . $_POST['tuesday' . $i] . "', wednesday = '" . $_POST['wednesday' . $i] . "', thursday = '" . $_POST['thursday' . $i] . "', friday = '" . $_POST['friday' . $i] . "', saturday = '" . $_POST['saturday' . $i] . "', sunday = '" . $_POST['sunday' . $i] . "' WHERE id =" . $i;
        mysqli_query($GLOBALS['conn'], $schedueUpdateQuery);
     }
     echo "<script>alert('terminarz zaktualizowany :))')</script>";
}

#showPosts
if(isset($_POST['showSubmit'])){

    #count rows for the loop
    $postsCountQuery = "SELECT COUNT(id) FROM posts";
    $postsCountQueryResult = mysqli_query($GLOBALS['conn'], $postsCountQuery);

    while($row = mysqli_fetch_assoc($postsCountQueryResult)){
        $rows = $row['COUNT(id)'];
    }
    

    #showPosts
    for($i = 1; $i < $rows + 1; $i++){
        if(isset($_POST['post' . $i])){
            $postUpdateQuery = "UPDATE `posts` SET `deleted`= 0 WHERE id =" . $i;
            mysqli_query($GLOBALS['conn'], $postUpdateQuery);
        };
    }
    echo "<script>alert('posty odkryte :))')</script>";
}

#hidePosts
if(isset($_POST['hideSubmit'])){

    #count rows for the loop
    $postsCountQuery = "SELECT COUNT(id) FROM posts";
    $postsCountQueryResult = mysqli_query($GLOBALS['conn'], $postsCountQuery);

    while($row = mysqli_fetch_assoc($postsCountQueryResult)){
        $rows = $row['COUNT(id)'];
    }
    
    #hidePosts
    for($i = 1; $i < $rows + 1; $i++){
        if(isset($_POST['post' . $i])){
            $postUpdateQuery = "UPDATE `posts` SET `deleted`= 1 WHERE id =" . $i;
            mysqli_query($GLOBALS['conn'], $postUpdateQuery);
        };
    }
    echo "<script>alert('posty ukryte :))')</script>";
}

#displayTrainers
function displayTrainers(){

    $trainersSelectQuery = "SELECT * FROM trainers";
    $trainersSelectQueryResult = mysqli_query($GLOBALS['conn'], $trainersSelectQuery);

    if(mysqli_num_rows($trainersSelectQueryResult) > 0){
        $i = 1;
        while($row = mysqli_fetch_assoc($trainersSelectQueryResult)){
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . " " . $row['surname'] . "</option>";
        }
    }
}

#displayPostList
function displayPostList(){
    
    $postSelectQuery = "SELECT * FROM posts";
    $postSelectQueryResult = mysqli_query($GLOBALS['conn'], $postSelectQuery);

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
}

#displayPriceList
function displayPriceList(){
    $sql2 = "SELECT * FROM priceList";
    $result2 = mysqli_query($GLOBALS['conn'], $sql2);
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
}


#displaySchedue
function displaySchedue(){
    $schedueSelectQuery = "SELECT * FROM schedue";
    $schedueSelectQueryResult = mysqli_query($GLOBALS['conn'], $schedueSelectQuery);
    if (mysqli_num_rows($schedueSelectQueryResult) > 0) {
        $i = 1;
        while($row = mysqli_fetch_assoc($schedueSelectQueryResult) ) {
            echo '<tr>
                    <td name="time' . $i . '" id="time' . $i . '" onclick="replaceNode(`time' . $i . '`)">'. $row['time']. '</td>
                    <td id="monday' . $i . '" onclick=showSelect("monday' . $i . '")>'. $row['monday']. '</td>
                    <td id="tuesday' . $i . '" onclick=showSelect("tuesday' . $i . '")>'. $row['tuesday']. '</td>
                    <td id="wednesday' . $i . '" onclick=showSelect("wednesday' . $i . '")>'. $row['wednesday']. '</td>
                    <td id="thursday' . $i . '" onclick=showSelect("thursday' . $i . '")>'. $row['thursday']. '</td>
                    <td id="friday' . $i . '" onclick=showSelect("friday' . $i . '")>'. $row['friday']. '</td>
                    <td id="saturday' . $i . '" onclick=showSelect("saturday' . $i . '")>'. $row['saturday']. '</td>
                    <td id="sunday' . $i . '" onclick=showSelect("sunday' . $i . '")>'. $row['sunday']. '</td>
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
}
    ?>