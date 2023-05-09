<?php
require 'connection.php';
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename = Users.pdf");
require 'dat.php';
?>