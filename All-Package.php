<?php

error_reporting(E_ERROR | E_PARSE);

session_start();

include('config.php');
//include('Header.php');
include('Admin-sidebar.php');
//include('extra.php');
// Redirect to login page if user is not logged in
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Get user ID from session
$id = $_SESSION['id'];


// Fetch data from database
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch all rows as associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Failed to fetch user data.";
    exit();
}

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

    .add-Package-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }

    .Logout-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }

    .content {
        margin-left: 180px;

        padding: 20px;
    }

    .content {
        max-width: 100%;
        overflow-x: auto;
        padding: 20px;
        /* Adjust padding as needed */
    }

    .table-responsive {
        overflow-y: auto;
        max-height: 600px;
        /* Set a max height as needed */
    }

    /* Optional: Adjust table styles */
    table.content {
        width: 100%;
        border-collapse: collapse;
    }

    table.content th,
    table.content td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
</style>

<body>
    <div class="content">
        <div class="table-responsive">
            <table>
                <tr align="center">
                    <th>
                        <h2>National Park</h2>
                    </th>
                </tr>
            </table>
            <table id="myTable" class='content'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>parkname</th>
                        <th>parklocation</th>
                        <th>parkdetails</th>
                        <th>parktype</th>
                        <th>priceinusd</th>
                        <th>parkfeatures</th>
                        <th>parkimage</th>
                        <Th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr id="row_<?= $row['id'] ?>">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nationalparkname'] ?></td>
                            <td><?= $row['nationalparklocation'] ?></td>
                            <td><?= $row['nationalparkdetails'] ?></td>
                            <td><?= $row['nationalparktype'] ?></td>
                            <td><?= $row['priceinusd'] ?></td>
                            <td><?= $row['nationalparkfeatures'] ?></td>
                            <td><img src="<?= $row['nationalparkimage'] ?>" width="100px" height="100px" alt="Image"></td>
                            <td>
                                <button class='update-button' data-toggle='modal' data-id="<?= $row['id'] ?>" data-nationalparkname="<?= $row['nationalparkname'] ?>" data-nationalparklocation="<?= $row['nationalparklocation'] ?>" data-nationalparkdetails="<?= $row['nationalparkdetails'] ?>" data-nationalparktype="<?= $row['nationalparktype'] ?>" data-priceinusd="<?= $row['priceinusd'] ?>" data-nationalparkfeatures="<?= $row['nationalparkfeatures'] ?>" data-image="<?= $row['image'] ?>" data-target='#updateModal'>Update
                                </button>
                                <button class='delete-button' data-id="<?= $row['id'] ?>">Delete</button>
                                <button class='view-button' data-toggle='modal' data-id="<?= $row['id'] ?>" data-nationalparkname="<?= $row['nationalparkname'] ?>" data-nationalparklocation="<?= $row['nationalparklocation'] ?>" data-nationalparkdetails="<?= $row['nationalparkdetails'] ?>" data-nationalparktype="<?= $row['nationalparktype'] ?>" data-priceinusd="<?= $row['priceinusd'] ?>" data-nationalparkfeatures="<?= $row['nationalparkfeatures'] ?>" data-image="<?= $row['nationalparkimage'] ?>" data-target='#viewModal'>View
                                </button>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="content">
        <button class='add-Package-button' data-toggle='modal' data-target='#addModal'>Add Package</button>
        <button><a href="Logout.php">LOGOUT</a></button>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalTitle">Add Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm" enctype="multipart/form-data">
                        <label for="addnationalparkname">NationalParkName:</label>
                        <input type="text" id="addnationalparkname" name="nationalparkname" class="form-control" required><br>

                        <label for="addnationalparklocation">NationalParkLocation:</label>
                        <input type="text" id="addnationalparklocation" name="nationalparklocation" class="form-control" required><br>

                        <label for="addnationalparkdetails">NationalParkDetails:</label>
                        <input type="text" id="addnationalparkdetails" name="nationalparkdetails" class="form-control" required><br>

                        <label for="addnationalparktype">NationalParkType:</label>
                        <input type="text" id="addnationalparktype" name="nationalparktype" class="form-control" required><br>

                        <label for="addpriceinusd">PriceInUsd:</label>
                        <input type="text" id="addpriceinusd" name="priceinusd" class="form-control" required><br>


                        <label for="addnationalparkfeatures">NationalParkFeatures:</label>
                        <input type="text" id="addnationalparkfeatures" name="nationalparkfeatures" class="form-control" required><br>

                        <label for="addimage">Upload Image:</label>
                        <input type="file" id="addimage" name="image" class="form-control"><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addPackage()">Add Package</button>
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

                        <label for="updatenationalparkname"> NationalParkName:</label>
                        <input type="text" id="updatenationalparkname" name="updatenationalparkname" class="form-control"><br>

                        <label for="updatenationalparklocation">NationalParkLocation:</label>
                        <input type="text" id="updatenationalparklocation" name="updatenationalparklocation" class="form-control"><br>


                        <label for="updatenationalparkdetails">NationalParkDetails:</label>
                        <input type="text" id="updatenationalparkdetails" name="updatenationalparkdetails" class="form-control"><br>

                        <label for="updatenationalparktype">NationalParkType:</label>
                        <input type="text" id="updatenationalparktype" name="updatenationalparktype" class="form-control"><br>

                        <label for="updatepriceinusd">Priceinusd:</label>
                        <input type="text" id="updatepriceinusd" name="updatepriceinusd" class="form-control"><br>

                        <label for="updatenationalparkfeatures">NationalParkfeatures:</label>
                        <input type="text" id="updatenationalparkfeatures" name="updatenationalparkfeatures" class="form-control"><br>

                        <label for="image">Upload image:</label>
                        <input type="file" id="image" name="image" class="form-control">
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
                var nationalparkname = $(this).data('nationalparkname');
                var nationalparklocation = $(this).data('nationalparklocation');
                var nationalparkdetails = $(this).data('nationalparkdetails');
                var nationalparktype = $(this).data('nationalparktype');
                var priceinusd = $(this).data('priceinusd');
                var nationalparkfeatures = $(this).data('nationalparkfeatures');
                var image = $(this).data('image');

                $('#updateid').val(id);
                $('#updatenationalparkname').val(nationalparkname);
                $('#updatenationalparklocation').val(nationalparklocation);
                $('#updatenationalparkdetails').val(nationalparkdetails);
                $('#updatenationalparktype').val(nationalparktype);
                $('#updatepriceinusd').val(priceinusd);
                $('#updatenationalparkfeatures').val(nationalparkfeatures);
                $('#updatenationalparkimage').val(image);
                $('#updateModal').modal('show');
            });

            // Event listener for view button click
            $(document).on('click', '.view-button', function() {
                var id = $(this).data('id');

                var nationalparkname = $(this).data('nationalparkname');

                var nationalparklocation = $(this).data('nationalparklocation');

                var nationalparkdetails = $(this).data('nationalparkdetails');

                var nationalparktype = $(this).data('nationalparktype');

                var priceinusd = $(this).data('priceinusd');

                var nationalparkfeatures = $(this).data('nationalparkfeatures');

                var image = $(this).data('image');



                var detailsHtml = `
            <tr><td>ID</td><td>${id}</td></tr>
            <tr><td>NationalParkName </td><td>${nationalparkname }</td></tr>
        
            <tr><td>NationalParkLocation</td><td>${nationalparklocation}</td></tr>
            <tr><td>NationalParkDetails</td><td>${nationalparkdetails}</td></tr>
            <tr><td>NationalParkType</td><td>${nationalparktype}</td></tr>
            <tr><td>priceinusd</td><td>${priceinusd}</td></tr>
             <tr><td>NationalParkFeatures</td><td>${nationalparkfeatures}</td></tr>
            <tr><td>NationalParkImage</td><td><img src="${image}" width="100px" height="100px" alt="Image"></td></tr>
        `;
                $('#DetailView').html(detailsHtml);

                $('#viewModal').modal('show');
            });


        });

        $(document).on('click', '.add-customer-button', function() {
            $('#addForm')[0].reset();
            $('#addModal').modal('show');
        });


        // Update user function
        function updateUser() {
            //var formData = new FormData();
            var id = $('#updateid').val();

            var nationalparkname = $('#updatenationalparkname ').val();

            var nationalparklocation = $('#updatenationalparklocation').val();

            var nationalparkdetails = $('#updatenationalparkdetails').val();

            var nationalparktype = $('#updatenationalparktype').val();

            var priceinusd = $('#updatepriceinusd').val();

            var nationalparkfeatures = $('#updatenationalparkfeatures').val();


            var file = $('#image')[0].files[0];

            var formData = new FormData();
            formData.append('id', id);
            formData.append('nationalparkname', nationalparkname);
            formData.append('nationalparklocation', nationalparklocation);
            formData.append('nationalparkdetails', nationalparkdetails);
            formData.append('nationalparktype', nationalparktype);
            formData.append('priceinusd', priceinusd);
            formData.append('nationalparkfeatures', nationalparkfeatures);
            formData.append('image', file);

            $.ajax({
                url: 'Package-Updation.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Package updated successfully');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error occurred while updating customer');
                    console.error(xhr.responseText);
                }
            });
        }

        function addPackage() {
            var formData = new FormData($('#addForm')[0]);



            $.ajax({
                url: 'Add-Package.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    alert(result.msg);
                    if (result.status) {
                        //  $('#addModal').modal('hide');
                        //location.reload();
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
                url: 'Delete- Package.php',
                data: {
                    id: id
                },
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