<?php

include 'connect.php';

if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];

    $sql="SELECT * FROM user WHERE id=$user_id";

    $result = mysqli_query($conn,$sql);
    $response = array();
    while($row=mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="Invalid or data not found";
}


if(isset($_POST['hiddendata'])){
    $uniqueid = $_POST['hiddendata'];

    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $mobile = $_POST['updatemobile'];
    $place = $_POST['updateplace'];

    $sql = "UPDATE user SET name='$name',email='$email',mobile='$mobile',place='$place' WHERE id=$uniqueid";

    $result=mysqli_query($conn,$sql);
    

}


?>