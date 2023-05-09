<?php
require 'connection.php';
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Users.xls");

require 'dat.php';
?>