<?php

include 'connect.php';

if(isset($_POST['deleteSend'])){

    $unique=$_POST['deleteSend'];

    $sql = "DELETE FROM user WHERE id=$unique";
    $result = mysqli_query($conn,$sql);

}

?>