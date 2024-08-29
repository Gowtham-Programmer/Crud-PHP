<?php

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","crud");

$connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if (mysqli_connect_errno()) {
    die("Connection failed");
}
