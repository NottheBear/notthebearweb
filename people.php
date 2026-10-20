<?php
//this shit is vibe coded ngl
// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Capture and sanitize user inputs
    $name     = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $agerange = isset($_POST['agerange']) ? htmlspecialchars($_POST['agerange']) : '';
    
    // Checkboxes only send a value if checked
    $enjoy    = isset($_POST['enjoy']) ? 'Yes' : 'No';

    // 2. Format the data row (CSV format)
    $dataLine = '"' . $name . '","' . $agerange . '","' . $enjoy . '",' . date("Y-m-d H:i:s") . "\n";

    // 3. Append the data line to a file named 'people.csv'
    file_put_contents('people.csv', $dataLine, FILE_APPEND | LOCK_EX);

    // 4. Show a confirmation message to the user
    echo "<h1>Thank you, " . $name . "!</h1>";
    echo "<p>Your submission has been recorded.</p>";
    echo '<a href="form.html">Back to form</a>';
} else {
    // If accessed directly without submitting
    header("Location: form.html");
    exit();
}
?>