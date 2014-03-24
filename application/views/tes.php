<?php
print_r($weekly);
echo "</br>";
echo "</br>";
$time   = "2014W12";
echo date(datetime::ISO8601,strtotime($time));

?>