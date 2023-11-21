<div class="container2">
        <h1>BMI and Age Calculator</h1>
        <label for="height">Height (cm):</label>
        <input type="number" id="height" placeholder="Enter height in cm">
        
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" placeholder="Enter weight in kg">
        
        <label for="age">Age:</label>
        <input type="number" id="age" placeholder="Enter age in years"><br><br>
    
        <button onclick="calculateBMIAndAge()" class="button-cal">Calculate BMI and Age</button>
        <?php
        session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo '<button onclick="fetchAndShowChart()" class="button-cal">Show Chart</button>';
        
    }

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo '<button onclick="fetchAndShowChart()" class="button-cal" style="display: none;">Show Chart</button>';
    }
    ?>
    <div id="bmiResult"></div>

    <canvas id="myChart" width="400" height="200"></canvas>
    </div>