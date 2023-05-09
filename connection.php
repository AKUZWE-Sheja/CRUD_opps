<?php
// $servername="localhost";
$servername='127.0.0.1';
$username="root";
$dbname="crud_app_one";
$password='Edwige_sroot';
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "connection failed";
}
?>