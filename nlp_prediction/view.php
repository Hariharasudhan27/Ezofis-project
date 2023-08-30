<?php
// Connect to the database
$connection = pg_connect("host=localhost dbname=weather_data user=postgres password=Hari_027");
if (!$connection) {
    echo "An error occurred while connecting to the database.<br>";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlQuery = $_POST["sqlQuery"];

    // Execute the SQL query
    $result = pg_query($connection, $sqlQuery);

    if ($result) {
        // Display the results in an HTML table
        echo "<table border='1' >";

        // Display header row using field names
        echo "<tr>";
        $numFields = pg_num_fields($result);
        for ($i = 0; $i < $numFields; $i++) {
            echo "<th>" . pg_field_name($result, $i) . "</th>";
        }
        echo "</tr>";

        // Display data rows
        while ($row = pg_fetch_row($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error executing query: " . pg_last_error($connection);
    }

    // Free the result set
    pg_free_result($result);
}

// Close the database connection
pg_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL Query Results</title>
    <style>
        /* Your existing CSS styles go here */
        body {
            font-family: Arial, sans-serif;
            background-color: lightskyblue; /* Use a gradient of violet to blue */
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to center content vertically */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Ensure the content is centered on the entire viewport height */
        }

        h1 {
            color: Black;
            text-align: center;
            margin-top: 40px;
        }

        form {
            max-width: 400px;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 12px;
            font-size: 16px;
            color: #fff;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table, th, tr, td {
            border: 3px solid rgb(0, 0, 0);
            border-collapse: collapse;
            padding: 10px;
            text-align: center;

        }
    </style>
</head>
<body>

    <div class="button-container">
        <h1>Enter SQL Query</h1>
        <form method="post" action="">
            <textarea name="sqlQuery" rows="5" cols="50"></textarea><br>
            <input type="submit" value="Execute Query">
        </form>
    </div>
</body>
</html>






