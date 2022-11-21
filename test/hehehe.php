<?php
if(isset($_POST['submit'])){
    echo sha1($_POST['hehe']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="hehehe.php" method="post">
        <input type="text" name="hehe">
        <input type="submit" name="submit" value="ohoho">
    </form>
</body>
</html>