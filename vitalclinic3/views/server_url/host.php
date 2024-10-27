<?php

//cargar .env datos

$env = parse_ini_file(".env");

$host="http://".$env["HOST_URL"]."/".$env["PROJECT_NAME"];

echo var_dump(isset($host));
 