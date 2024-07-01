<?php
session_start();
include('config.php');
include('extra.php');

// print_r($_SESSION);

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("location: Login.php");
    exit();
}

// Fetch user data based on whether an ID is provided in the URL or not
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $userData = mysqli_fetch_assoc($result);
    } else {
        echo "Failed to fetch user data.";
        exit();
    }
} else {
    // If ID is not provided, fetch data of logged-in user
    $id = $_SESSION['id'];

    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $userData = mysqli_fetch_assoc($result);
    } else {
        // Redirect to login if user does not exist
        header("location: Login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .user-profile {
            display: none;
            text-align: center;
        }

        .badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
        }
    </style>
</head>

<body>


    <div class="content">
        <a class="nav-link dropdown-toggle" href="tableform.php">
            <i class="fas fa-bell fa-fw"></i>
            <span id='notificationBadge' class='badge badge-danger badge-counter'></span></a>

    </div>




    <div class="content">
        <?php if (!isset($_GET['id'])) : ?>
            <h1>Welcome <?php echo $userData['name']; ?>!</h1>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><?php echo $userData['id']; ?></td>
                    <td><?php echo $userData['name']; ?></td>
                    <td><?php echo $userData['email']; ?></td>
                    <td><?php echo $userData['phonenumber']; ?></td>
                    <td><img src="<?php echo $userData['image']; ?>" width="100px" height="100px" alt="User Image"></td>
                    <td>
                        <button class="update-button" data-toggle="modal" data-id="<?= $userData['id'] ?>" data-name="<?= $userData['name'] ?>" data-email="<?= $userData['email'] ?>" data-phonenumber="<?= $userData['phonenumber'] ?>" data-image="<?= $userData['image'] ?>" data-target="#updateModal">Update
                        </button>
                        <button class="view-button" data-toggle="modal" data-id="<?= $userData['id'] ?>" data-name="<?= $userData['name'] ?>" data-email="<?= $userData['email'] ?>" data-phonenumber="<?= $userData['phonenumber'] ?>" data-image="<?= $userData['image'] ?>" data-target="#viewModal">View
                        </button>
                    </td>
                </tr>
            </table>
        <?php else : ?>
            <div class="user-profile" style="display: block;">
                <h1>Welcome <?php echo $userData['name']; ?>!</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><?php echo $userData['id']; ?></td>
                        <td><?php echo $userData['name']; ?></td>
                        <td><?php echo $userData['email']; ?></td>
                        <td><?php echo $userData['phonenumber']; ?></td>
                        <td><img src="<?php echo $userData['image']; ?>" width="100px" height="100px" alt="User Image"></td>
                        <td>
                            <button class="view-button" data-toggle="modal" data-id="<?= $userData['id'] ?>" data-name="<?= $userData['name'] ?>" data-email="<?= $userData['email'] ?>" data-phonenumber="<?= $userData['phonenumber'] ?>" data-image="<?= $userData['image'] ?>" data-target="#viewModal">View
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalTitle">Update Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm">
                        <input type="hidden" id="updateid">
                        <div class="form-group">
                            <label for="updatename">Name:</label>
                            <input type="text" id="updatename" name="updatename" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="updateemail">Email:</label>
                            <input type="email" id="updateemail" name="updateemail" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="updatephonenumber">Phone Number:</label>
                            <input type="text" id="updatephonenumber" name="updatephonenumber" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="updateimage">Upload Image:</label>
                            <input type="file" id="updateimage" name="updateimage" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateUser()">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalTitle">View Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody id="DetailView">
                            <!-- Details will be filled via JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {


            function fetchNotifications() {
                $.ajax({
                    type: 'GET',
                    url: 'Fetch-notification.php',
                    success: function(response) {
                       $('#notificationBadge').text(response);
                    },
                         error: function(xhr, status, error) {
                         console.error(xhr.responseText);
                    }
                });
            }
            // Initial fetch
            fetchNotifications();
        });




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

        // Function to handle click on View button to populate view modal
        $(document).on('click', '.view-button', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var phonenumber = $(this).data('phonenumber');
            var image = $(this).data('image');

            var detailsHtml = `
                    <tr><td>ID</td><td>${id}</td></tr>
                    <tr><td>Name</td><td>${name}</td></tr>
                    <tr><td>Email</td><td>${email}</td></tr>
                    <tr><td>Phone Number</td><td>${phonenumber}</td></tr>
                    <tr><td>Image</td><td><img src="${image}" width="100px" height="100px" alt="Image"></td></tr>
                `;
            $('#DetailView').html(detailsHtml);

            $('#viewModal').modal('show');
        });

        // Function to handle form submission and update user details
        function updateUser() {
            var id = $('#updateid').val();
            var name = $('#updatename').val();
            var email = $('#updateemail').val();
            var phonenumber = $('#updatephonenumber').val();
            var formData = new FormData();
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
                    console.log(response);
                    alert('Customer updated successfully');
                    updateNotificationCount(); 
                    location.reload(); 
                },
                error: function() {
                    console.log('Error updating user details');
                },

            });

        };
    </script>
</body>

</html>