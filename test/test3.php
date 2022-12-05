<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "strona";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        table{
            width: 200px;
            height: 80px;
        }

        th, td{
            text-align: center;
            width: 50%;
        }

        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <form action="test3.php" method="post">
        <table>
            <tr>
                <th>hehe</th>
                <th>hehe</th>
            </tr>
            <tr>
                <td id="td1" onclick="showSelect(1)">asdas</td>
                <td id="td2" onclick="showSelect(2)">asdasd</td>
            </tr>
        </table>
    </form>
</body>
</html>

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

        if(tableCell.firstChild.nodeType === 3){
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
        let tableCell =  document.getElementById(a);
        let select = tableCell.firstChild;
        tableCell.innerText = select.value;
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