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

        let tableCell =  document.getElementById("td" + a);

        if(tableCell.firstChild.nodeType === 3){
            let select = document.createElement("select");
            select.id = "select" + a;
            select.name = "select" + a;
            select.value = tableCell.innerText;
            for(i = 0; i < 5; i++){
                let selectOption = document.createElement("option");
                selectOption.value = "opcja" + i;
                selectOption.innerText = "opcja" + i;
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
        let tableCell =  document.getElementById("td" + a);
        let select = tableCell.firstChild;
        tableCell.innerText = select.value;
        select.remove();
    }
</script>