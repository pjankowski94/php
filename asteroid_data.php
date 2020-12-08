<?php
session_start();
if (!isset($_SESSION['loggedin']))
    header("Location: login.php");
	
$content_array=array(
    "ssl"=>array(
    ),
);  

$response = file_get_contents("https://api.nasa.gov/neo/rest/v1/neo/2217013?api_key=bQVAYd3pMRBbIsTVkT73bd7ZLjr1fSOd4SFVk4EZ", false, stream_context_create($content_array));
$response = json_decode($response);
echo "<td><strong>Asteroid name:</strong> ".$response->name;
echo "<br><br>";

	foreach ($response->close_approach_data as $data => $close_approach_date) {
    echo '<strong>Close Approach date</strong> #' . ($data) . ':  ' . $close_approach_date->close_approach_date. '.<br>';
}
echo "<br>";

foreach ($response->close_approach_data as $data2 => $relative_velocity) {
    echo '<strong>Relative velocity</strong> #' . ($data2) . ': travelling at: ' . $relative_velocity->relative_velocity->miles_per_hour. " miles per hour.<br>";
}
echo "<br>";

	foreach ($response->close_approach_data as $data3 => $miss_distance) {
    echo '<strong>Miss distance</strong> #' . ($data3) . ': of ' . $miss_distance->miss_distance->miles. " miles per hour.<br>";
}
echo "<br>";

echo "<strong>First observaton date:</strong> ".$response->orbital_data->first_observation_date;
echo "<br><br>";
echo "<strong>Last observaton date:</strong> ".$response->orbital_data->last_observation_date;
echo "<br>";

?>
