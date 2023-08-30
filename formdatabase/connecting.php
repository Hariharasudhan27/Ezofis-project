<?php
// Database connection parameters
$host = "localhost"; // Usually 'localhost'
$port = "5432"; // Usually 5432
$dbname = "weather_data";
$user = "postgres";
$password = "Hari_027";

// Establish the database connection
$connection = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $precipitation = $_POST["precipitation"];
    $temp_max = $_POST["temp_max"];
    $temp_min = $_POST["temp_min"];
    $wind = $_POST["wind"];
    $weather = $_POST["weather"];
    
    // Convert date to desired format (dd-mm-yyyy)
    $dateParts = explode("-", $date);
    $formattedDate = $dateParts[2] . "-" . $dateParts[1] . "-" . $dateParts[0];

    // Prepare and execute the SQL query to insert data
    $query = "INSERT INTO tablename (date, precipitation, temp_max, temp_min, wind, weather) 
              VALUES (:date, :precipitation, :temp_max, :temp_min, :wind, :weather)";
    $statement = $connection->prepare($query);
    $statement->bindParam(":date", $formattedDate); // Use the formatted date
    $statement->bindParam(":precipitation", $precipitation);
    $statement->bindParam(":temp_max", $temp_max);
    $statement->bindParam(":temp_min", $temp_min);
    $statement->bindParam(":wind", $wind);
    $statement->bindParam(":weather", $weather);

    if ($statement->execute()) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data.";
    }
}
?>
