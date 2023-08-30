<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
            table,th,tr,td{
                border:2px solid black;
                border-collapse:collapse;
                padding:10px;
                text-align:center;
            } 
            body{
                background-color: lightskyblue; /* Use a gradient of violet to blue */ 
            }
            h2{
                text-align: center;
            }
        </style>
</head>
<body>
    <h2>Weather Prediction Dataset</h2>
    <?php
    $connection=pg_connect("host=localhost dbname=weather_data user=postgres password=Hari_027");
    if(!$connection){
        echo "An error occurred.<br>";
        exit;
    }
    $result=pg_query($connection,"SELECT * FROM datas");
    ?>
    <table width="100%" id="table-body">
        <tr>
            <th>date</th>
            <th>percipitation</th>
            <th>temp_max</th>
            <th>temp_min</th>
            <th>wind</th>
            <th>weather</th>
        </tr>

        <?php
        while($row=pg_fetch_assoc($result)){
            echo"
            <tr>
                <td>$row[date]</td>
                <td>$row[percipitation]</td>
                <td>$row[temp_max]</td>
                <td>$row[temp_min]</td>
                <td>$row[wind]</td>
                <td>$row[weather]</td>
            </tr>
            ";
        }
        ?>
    </table>
</body>
</html>