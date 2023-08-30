<?php
// Connect to database
$con = pg_connect("host=localhost port=5432 dbname=weather_data user=postgres password=Hari_027");

// Check connection
if (!$con) {
    die("Connection failed: " . pg_last_error());
}

$query = "SELECT * FROM tablename";
$result = pg_query($con, $query);

// Close PostgreSQL connection
pg_close($con);
?>
<!DOCTYPE html>
<head>
    <title>Inserted Successfully</title>
    <style>
        table, th, tr, td {
            border: 3px solid rgb(0, 0, 0);
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }

        body {
            background-color: lightskyblue;
        }

        h2 {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
<h2>Updated Data in the Database</h2>
<table width="100%" id="table-body">
    <thead>
    <tr>
        <th><span class="las la-sort"></span><h3>date</h3></th>
        <th><span class="las la-sort"></span><h3>precipitation</h3></th>
        <th><span class="las la-sort"></span><h3>temp_max</h3></th>
        <th><span class="las la-sort"></span><h3>temp_min</h3></th>
        <th><span class="las la-sort"></span><h3>wind</h3></th>
        <th><span class="las la-sort"></span><h3>weather</h3></th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["precipitation"] . "</td>";
        echo "<td>" . $row["temp_max"] . "</td>";
        echo "<td>" . $row["temp_min"] . "</td>";
        echo "<td>" . $row["wind"] . "</td>";
        echo "<td>" . $row["weather"] . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
