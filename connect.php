<?php

$conn=new mysqli('localhost','root','','prvidomaci');

if(!$conn){
    die(mysqli_error($conn));
}

?>