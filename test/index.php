<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>test</title>
</head>
<body>
    <div id="container">
        <div id="test1">
            <p>heheheh</p>
        </div>
        <div id="test2">
            <p>ogohohogo</p>
        </div>
    </div>
    <button onclick="test2()">hehehe</button>
    <button onclick="test3()">hehehe</button>
</body>
</html>

<script>
    function test(){
        <?php
            $sql = "INSERT INTO `hoho` (`id`, `imie`, `nazwisko`) VALUES (NULL, 'michał', 'pazdan')";
            mysqli_query($conn, $sql);
        ?>
    }

    function test2(){
        let siema = document.getElementById("test2");
        siema.style.visibility = 'hidden';
    }

    function test3(){
        let siemah = document.getElementById("test2");
        siemah.style.visibility = 'visible';
    }
</script>