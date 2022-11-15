<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "silownia";
$conn = mysqli_connect($servername, $username, $password, $dbname);

#pushPost
if(isset($_POST['postSubmit'])){
    $postInsertQuery = "INSERT INTO posts(id, headline, paragrapf, deleted) VALUES (NULL,'" . $_POST['headline'] . "','" . $_POST['paragrapf'] . "', 0)";
    mysqli_query($GLOBALS['conn'], $postInsertQuery);
    echo "<script>alert('post wstawiony :))')</script>";
}

#priceListUpdate
if(isset($_POST['priceListSubmit'])){
    for ($i = 1; $i < 5; $i++) {
        $priceListUpdateQuery = "UPDATE cennik SET product = '" . $_POST['product' . $i] . "', price = '" . $_POST['price' . $i] . "' WHERE `cennik`.`id` =" . $i;
        mysqli_query($GLOBALS['conn'], $priceListUpdateQuery);
    }
    echo "<script>alert('cennik zaktualizowany :))')</script>";
}

#schedueUpdate
if(isset($_POST['schedueUpdate'])){
    for ($i = 1; $i < 7; $i++) {
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
    $sql2 = "SELECT * FROM cennik";
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
}
    ?>