<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domaci 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="completeModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="completename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="completename" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="completeemail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="completeemail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="completemobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="completemobile" placeholder="Enter your mobile">
                    </div>
                    <div class="mb-3">
                        <label for="completeplace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="completeplace" placeholder="Enter your place">
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updatename" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updatename" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="updateemail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="updateemail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="updatemobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="updatemobile" placeholder="Enter your mobile">
                    </div>
                    <div class="mb-3">
                        <label for="updateplace" class="form-label">Place</label>
                        <input type="text" class="form-control" id="updateplace" placeholder="Enter your place">
                    </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-dark" onClick="updateDetails()">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddenData">
                  
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <h1 class="text-center">PRVI DOMACI ITEH 2021</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark my-3" data-bs-toggle="modal" data-bs-target="#completeModel">
            Add new user
        </button>
        <div id="displayDataTable"></div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            displayData();
        });
        function displayData(){
            var displayData="true";
            $.ajax({
                url:"display.php",
                type:'post',
                data:{
                   displaySend:displayData
                },
                success:function(data,status){
                    $('#displayDataTable').html(data);
                }
            });
        }
        function adduser(){
            var nameAdd = $('#completename').val();
            var emailAdd = $('#completeemail').val();
            var mobileAdd = $('#completemobile').val();
            var placeAdd = $('#completeplace').val();
            console.log(nameAdd,emailAdd,mobileAdd,placeAdd);
            $.ajax({
                url:"insert.php",
                type:'post',
                data:{
                    nameSend:nameAdd,
                    emailSend:emailAdd,
                    mobileSend:mobileAdd,
                    placeSend:placeAdd
                },
                success:function(data,status){
                    $('#completeModel').modal('hide');
                    displayData();
                }
            });
        }

        function deleteUser(deleteid){
            $.ajax({
                url:"delete.php",
                type:'post',
                data:{
                    deleteSend:deleteid
                },
                success:function(data,status){
                    displayData();
                }
            });
        }

    function updateUser(updateid){
        $('#hiddenData').val(updateid);

        $.post("update.php",{updateid:updateid},function(data,status){
            var userid = JSON.parse(data);
            $('#updatename').val(userid.name);
            $('#updateemail').val(userid.email);
            $('#updatemobile').val(userid.mobile);
            $('#updateplace').val(userid.place);
        });

        $('#updateModal').modal("show");

    }

    function updateDetails(){
        var updatename = $('#updatename').val();
        var updateemail = $('#updateemail').val();
        var updatemobile = $('#updatemobile').val();
        var updateplace = $('#updateplace').val();
        var hiddendata=$('#hiddendata').val();

        $.post("update.php",{updatename:updatename,updateemail:updateemail,updatemobile:updatemobile,updateplace:updateplace,
            hiddendata:hiddendata}),function(data,status){
                $('#updateModal').modal('hide');
                displayData();
        });
    }

    </script>
</body>

</html>