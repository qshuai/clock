<?php
date_default_timezone_set('PRC');
$date = date('Y m d h i s');
$date = explode(' ', $date);
$key = ['year', 'month', 'day', 'hour', 'minute', 'second'];
$date = array_combine($key, $date);
echo $date = json_encode($date);