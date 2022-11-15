<?php

#login check
session_start();
if(isset($_SESSION['klucz1'])){
    header("Location: admin4.php");
}
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="mateusz.jpg" type="image/x-icon">
        <link rel="stylesheet" href="style2.css">
        <title>Panel logowania</title>
    </head>
    <body>
        <form id="form" action="admin3.php" method="POST">
            <h2>Zaloguj się</h2>
            <input placeholder="login" type="text" name="login" id="">
            <input placeholder="hasło" type="password" name="password">
            <input type="submit" value="Zaloguj">
            <p><?php
                
                if(isset($_POST['login']) && isset($_POST['password'])){
                                    
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $shaPassword = sha1($password);
                
                    $servername = "localhost";
                    $username = "root";
                    $dbpassword = "";
                    $dbname = "strona";
                
                    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);
                    $sql = "SELECT login, password FROM users WHERE login = '$login' AND password= '$shaPassword'";
                    $result = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result) ) {
                            session_start();
                            $_SESSION['klucz1'] = "Jesteś zalogowany jako: ".$row["login"];
                        }
                        header("Location: test/test.php");
                    }
                    else {
                        echo "nie ma takiego użytkownika :00";
                    }
                }
                ?></p>
        </form>
    </body>
</html>