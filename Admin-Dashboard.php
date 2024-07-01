<?php
session_start();
//if($_SESSION['admin_role']){
if ($_SESSION['admin_role'] == 'Customer') {
    header("location: Customer-dashboard.php");
    exit();
}

include('config.php');

include('Admin-Header.php');
include('Admin-sidebar.php');


if (!isset($_SESSION["id"])) {
    header("Location:Login.php");
    exit();
}
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
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id = $id AND is_admin = 1";
    $result = $conn->query($sql);


    if ($result->num_rows === 0) {
        header("Location: Login.php");
        exit();
    }

    $rows = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 150px;
            background-color: #333;
            padding-top: 20px;
            color: #fff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            padding: 10px;
        }

        .sidebar li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar li a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 130px;
            padding: 20px;
        }

        .user-profile {
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #fff;
        }

        .user-profile span {
            display: block;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

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
    </style>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li><a href="Admin-Dashboard.php">Admin View</a></li>
            <li><a href="All-Customers.php">Customer View</a></li>
            <li><a href="All-Package.php">Packages</a></li>
            <li><a href="admin-data.php">Booked Packages</a></li>
            <li><a href="view-Enquiry.php">All Enquiries</a></li>

            <li><a href="About-Us.php">About US</a></li>
            <li><a href="Policy.php">Privacy Policy</a></li>
            <li><a href="edit_contact.php">Contact US</a></li>
            <li><a href="Logout.php">Logout</a></li>
        </ul>

        <div class="Admin-profile">

            <span>Welcome Admin</span>
        </div>
    </div>

    <div class="content">
        <h2>Admin Details</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($rows)) {
                ?>
                    <tr>
                        <td> <?php echo $rows['id'] ?></td>
                        <td> <?php echo $rows['name'] ?></td>
                        <td> <?php echo $rows['email'] ?></td>
                        <td> <?php echo $rows['phonenumber'] ?></td>
                        <td><img src="<?php echo $rows['image']; ?>" width="100px" height="100px" alt="Admin Image"></td>
                        <td>
                            <button class='update-button' data-toggle='modal' data-id="<?= $rows['id'] ?>" data-name="<?= $rows['name'] ?>" data-email="<?= $rows['email'] ?>" data-phonenumber="<?= $rows['phonenumber'] ?>" data-image="<?= $rows['image'] ?>" data-target='#updateModal'>Update</button>
                        <td>


                            <button class='view-button' data-toggle='modal' data-id="<?= $rows['id'] ?>" data-name="<?= $rows['name'] ?>" data-email="<?= $rows['email'] ?>" data-phonenumber="<?= $rows['phonenumber'] ?>" data-image="<?= $rows['image'] ?>" data-target='#viewModal'>View
                            </button>
                        </td>
            </tbody>
        </table>
        </tr>
    <?php
                }
    ?>



    </div>

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
                    <button type="button" class="btn btn-primary" onclick="updateUser()">Update</button>
                </div>
            </div>
        </div>
    </div>


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

    <!-- jQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
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



                var phonenumber = $(this).data('phonenumber');
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
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {
                    console.log(response);
                    //alert(response);
                    alert('Admin updated sucessfully');
                    location.reload();
                }

            });

        }
    </script>
    </div>
</body>

</html>