<?php 

$url = "http://api.openweathermap.org/data/2.5/weather?q=Alkmaar,NL&units=metric&appid=8242ae344535dc242394fe9a2fb1b3c7";
$json = file_get_contents($url);
$data = json_decode($json);

echo '<img class="weather pb-2" src="assets/weather/' . $data->weather[0]->icon . '.svg" /><span class="h4">' . $data->main->temp . ' &#176;C</span>';

?>