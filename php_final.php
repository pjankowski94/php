<?php 
if (!isset($_SESSION['nID']))
    header("Location: login.php");
$start_date = isset($_GET['start_date']) ? date('Y-m-d', strtotime($_GET['start_date'])):null;
$end_date = $start_date ? date('Y-m-d', strtotime('+8 days', strtotime($start_date))): null;

echo '<h2>NASAs Near Earth Objects(NEO) - Summary screen API</h2>';

if($start_date) {

    echo "Showing all Near-Earth Objects from $start_date to $end_date";

$result = file_get_contents("https://api.nasa.gov/neo/rest/v1/feed?start_date={$start_date}&{$end_date}=&api_key=bQVAYd3pMRBbIsTVkT73bd7ZLjr1fSOd4SFVk4EZ");
$data = json_decode($result);

	foreach ($data->near_earth_objects as $date => $objects) {
		echo "<h4>" . count($objects) . " near-earth objects detected on</b> $date";
		echo "<ol>";

    foreach ($objects as $object) {
		echo "<li><a href='asteroid_data.php' target='_blank'>Asteroid details</a><br>"; 
        echo "Object ID: " .$object->id . "<br>";
		echo "Object name: " .$object->name . "<br>";
		echo "NASA_jpl_url:" ." <a href='" . $object->nasa_jpl_url . "'>" . $object->nasa_jpl_url . "</a><br><br>";

    foreach ($object->close_approach_data as $close_approach) {
        echo "Close approach date: " . $close_approach->close_approach_date ."<br>Traveling at " . $close_approach->relative_velocity->miles_per_hour . " miles per hour " ."<br>Missing Earth by " . $close_approach->miss_distance->miles . " miles </a></li><br>";
        }
    }
    echo "</ol>";
}

} else {
?>
	<form method="get">
	<p>Select a start date: </p>
     <input id="start_date" type="date" name="start_date" />
     <input type="submit" />
    </form><?php
	echo '<p>The result will add-on 8 additional days after the selected start-date.</p><br>';
	echo ' ------------------------------------------------------------<br>';
	echo '<strong><i>To logout, go back one page, click "logout".</i></strong><br>';
echo ' ------------------------------------------------------------<br><br><br>';
	}