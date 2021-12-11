<?php

include 'connect.php';

if(isset($_POST['displaySend'])){
    $table='<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NAME</th>
        <th scope="col">EMAIL</th>
        <th scope="col">MOBILE</th>
        <th scope="col">PLACE</th>
        <th scope="col">OPERATIONS</th>
      </tr>
    </thead>';

    $sql="SELECT * FROM user";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $place = $row['place'];
        $table.='<tr>
        <td scope="row">'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$place.'</td>
        <td>
            <button class="btn btn-dark">UPDATE</button>
            <button class="btn btn-danger" onclick="deleteUser('.$id.')">DELETE</button>
        </td>
      </tr>';
    }
    $table.='</table>';
    echo $table;

}

?>

