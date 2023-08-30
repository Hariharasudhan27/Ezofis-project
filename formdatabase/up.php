<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather Data Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      background-color: aqua;
    }
    
    .container {
      max-width: 600px;
      margin: 20px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      background-color: white;
    }
    
    form {
      display: grid;
      grid-gap: 10px;
    }
    
    label {
      font-weight: bold;
    }
    
    input[type="date"],
    input[type="number"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h5 style="text-align: center;font-size: 25px;">UPDATE CURRENT DATA IN DATABASE</h5>
  <div class="container">
    <form action="connecting.php" method="POST">
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" min="2012-01-01" required>
      
      <label for="precipitation">Precipitation:</label>
      <input type="number" id="precipitation" name="precipitation" step="0.01" required>
      
      <label for="temp_max">Max Temperature (°C):</label>
      <input type="number" id="temp_max" name="temp_max" step="0.01" required>
      
      <label for="temp_min">Min Temperature (°C):</label>
      <input type="number" id="temp_min" name="temp_min" step="0.01" required>
      
      <label for="wind">Wind (km/h):</label>
      <input type="number" id="wind" name="wind" step="0.01" required>
      
      <label for="weather">Weather:</label>
      <select id="weather" name="weather" required>
        <option value="">Select weather condition</option>
        <option value="sun">Sun</option>
        <option value="rain">Rain</option>
        <option value="snow">Snow</option>
        <option value="drizzle">Drizzle</option>
      </select><br>
      
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
