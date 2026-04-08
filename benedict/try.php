<?php

$file = fopen("Activities.txt", "r");

echo fgets($file);

fwrite($file, "anino");

?>