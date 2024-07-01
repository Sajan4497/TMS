<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
include('config.php');
include('Admin-Sidebar.php');

if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

$id = $_SESSION['id'];
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    header("Location: Login.php");
    exit();
}

$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .update-button {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .view-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .delete-button {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .add-customer-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .content {
            margin-left: 190px; 
            
            padding: 20px;
        }
</style>
<body>
<div class="content">
<table id="myTable" class='display' style="width:100%">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            
            <th>Email</th>
            
            
            
            <th>Phonenumber</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rows as $row): ?>
      
        <tr id="row_<?= $row['id'] ?>">
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
        
            <td><?= $row['email'] ?></td>
            
            
            
            <td><?= $row['phonenumber'] ?></td>
            <td><img src="<?= $row['image'] ?>" width="100px" height="100px" alt="Image"></td>
            <td>
                <button class='update-button' data-toggle='modal' data-id="<?= $row['id'] ?>" 
                        data-name="<?= $row['name'] ?>" 
                        data-email="<?= $row['email'] ?>"
                        
                        data-phonenumber="<?= $row['phonenumber'] ?>" data-image="<?= $row['image'] ?>"
                        data-target='#updateModal'>Update
                </button>
                <button class='delete-button' data-id="<?= $row['id'] ?>">Delete</button>
                <button class='view-button' data-toggle='modal' data-id="<?= $row['id'] ?>" 
                        data-name="<?= $row['name'] ?>" 
                        data-email="<?= $row['email'] ?>"
                        
                        data-phonenumber="<?= $row['phonenumber'] ?>" data-image="<?= $row['image'] ?>"
                        data-target='#viewModal'>View
                </button>
                <button class='add-customer-button' data-toggle='modal' data-target='#addModal'>Add Customer</button>

        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    </div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Add Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" enctype="multipart/form-data">
                    <label for="addname">Name:</label>
                    <input type="text" id="addname" name="name" class="form-control" required><br>
                    <label for="addemail">Email:</label>
                    <input type="email" id="addemail" name="email" class="form-control" required><br>
                    <label for="addpassword">Password:</label>
                    <input type="password" id="addpassword" name="password" class="form-control" required><br>
                    <label for="addphonenumber">PhoneNumber:</label>
                    <input type="text" id="addphonenumber" name="phonenumber" class="form-control" required><br>
                    <label for="addimage">Upload Image:</label>
                    <input type="file" id="addimage" name="image" class="form-control"><br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addCustomer()">Add Customer</button>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <input type="hidden" id="updateid">
                    <label for="updatename"> Name:</label>
                    <input type="text" id="updatename" name="updatename" class="form-control"><br>
                    
                    <label for="updateemail">Email:</label>
                    <input type="email" id="updateemail" name="updateemail" disabled class="form-control"><br>
                
                    
                    <label for="updatephonenumber">PhoneNumber:</label>
                    <input type="text" id="updatephonenumber" name="updatephonenumber" class="form-control"><br>
                    <label for="image">Upload image:</label>
                    <input type="file" id="updateimage" name="image" class="form-control">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateUser()" >Update</button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">View Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody id="DetailView">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
    
    // Event listener for update button click
    $(document).on('click', '.update-button', function() {

        var id = $(this).data('id');
        var name = $(this).data('name');
    
        var email = $(this).data('email');
        
        
    
        var phonenumber = $(this).data('phonenumber');
        var image = $(this).data('image');

        $('#updateid').val(id);
        $('#updatename').val(name);
    
        $('#updateemail').val(email);
    
        
        
        $('#updatephonenumber').val(phonenumber);
        

        $('#updateModal').modal('show');
    });

    // Event listener for view button click
    $(document).on('click', '.view-button', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        
        var email = $(this).data('email');


        
        var phonenumber= $(this).data('phonenumber');
        var image = $(this).data('image');

        var detailsHtml = `
            <tr><td>ID</td><td>${id}</td></tr>
            <tr><td>Name</td><td>${name}</td></tr>
        
            <tr><td>Email</td><td>${email}</td></tr>
            
        
            <tr><td>PhoneNumber</td><td>${phonenumber}</td></tr>
            <tr><td>Image</td><td><img src="${image}" width="100px" height="100px" alt="Image"></td></tr>
        `;
        $('#DetailView').html(detailsHtml);

        $('#viewModal').modal('show');
    });


});

$(document).on('click', '.add-customer-button', function() {
        $('#addForm')[0].reset(); // Reset the form
        $('#addModal').modal('show');
    });


    // Update user function
    function updateUser() {

        var id = $('#updateid').val();
        var name = $('#updatename').val();
    
        var email = $('#updateemail').val();
    
    
        var phonenumber = $('#updatephonenumber').val();

        var formData = new FormData;
        var file = $('#updateimage')[0].files[0]; 
        

        formData.append('id', id);
        formData.append('name', name);
    
        formData.append('email', email);

    
        
        formData.append('phonenumber', phonenumber);
        formData.append('image', file);

        $.ajax({
        url: 'Updation.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            alert('Customer updated successfully');
            location.reload();
        },
        error: function(xhr, status, error) {
            alert('Error occurred while updating customer');
            console.error(xhr.responseText);
        }
    });
}

function addCustomer() {
    var formData = new FormData($('#addForm')[0]);



$.ajax({
        url: 'Add-Customer.php',
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            var result = JSON.parse(response);
            alert(result.msg);
            if (result.status) {
                $('#addModal').modal('hide');
                location.reload();
            }
        },
        error: function(xhr, status, error) {
            alert('Error occurred while adding customer');
            console.error(xhr.responseText);
        }
    });
}

$('.delete-button').click(function() {
        var id = $(this).data('id');
        
            $.ajax({
                type: 'POST',
                url: 'Delete.php',
                data: { id: id },
                success: function(response) {
                   // alert('User deleted successfully');
                    $('#row_' + id).remove();
                },
                error: function(xhr, status, error) {
                    alert('Error occur');
                    console.error(xhr.responseText);
                }


 
        
       
       
        });
    });
</script>

    
</body>
</html>