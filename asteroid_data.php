<?php
if (!isset($_SESSION['nID']))
    header("Location: login.php");
$content_array=array(
    "ssl"=>array(
    ),
);  

$response = file_get_contents("https://api.nasa.gov/neo/rest/v1/neo/2217013?api_key=bQVAYd3pMRBbIsTVkT73bd7ZLjr1fSOd4SFVk4EZ", false, stream_context_create($content_array));
$response = json_decode($response);
echo "Asteroid name: ".$response->name;
echo "<br>";
echo "First observaton date: ".$response->orbital_data->first_observation_date;
echo "<br>";
echo "Last observaton date: ".$response->orbital_data->last_observation_date;
echo "<br>";





//name
//close_approach_date
//initial relative_velocty/miles_per_hour
//initial miss_distance/miles_per_hour
//latest relative_velocity/miles_per_hour
//latest miss_distance/miles_per_hour
//orbital_data/first_observation_date
//orbital_data/last_observation_date
?>