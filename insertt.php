<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// Include the database configuration file
include('config.php');

// Redirect users to login page if they are not logged in
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Fetch data from the database
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Fetch all rows into an associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Display an error message if no data is found
    echo "Failed to fetch user data.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Parks</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>National Parks</h2>
        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>National Park Name</th>
                    <th>Location</th>
                    <th>Details</th>
                    <th>Type</th>
                    <th>Price(USD)</th>
                    <th>Features</th>
                    <th>Image</th>
                    <th>Action</th>
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
                    <button class="btn btn-primary insertBtn" data-toggle="modal" data-target="#exampleModal"
    data-id="<?= $row['id'] ?>"
    data-userid="<?= $_SESSION['id'] ?>"
    data-packageid="<?= $row['id'] ?>" 
    data-nationalparkname="<?= $row['nationalparkname'] ?>"
    data-nationalparklocation="<?= $row['nationalparklocation'] ?>"
    data-nationalparkdetails="<?= $row['nationalparkdetails'] ?>"
    data-nationalparktype="<?= $row['nationalparktype'] ?>"
    data-nationalparkfeatures="<?= $row['nationalparkfeatures'] ?>"
    data-priceinusd="<?= $row['priceinusd'] ?>"
    data-nationalparkimage="<?= $row['nationalparkimage'] ?>">
    Insert
</button>

                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Logout and View Cart buttons -->
        <button class="btn btn-danger"><a href="Logout.php" style="color: white;">Logout</a></button>
        <button class="btn btn-success"><a href="cart-products.php" style="color: white;">View Cart</a></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Query</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="insertForm">
    <div class="form-group">
        <label for="modalNationalParkName">National Park Name:</label>
        <input type="text" class="form-control" id="modalNationalParkName" name="nationalparkname" readonly>
    </div>
    <div class="form-group">
        <label for="modalNationalParkLocation">Location:</label>
        <input type="text" class="form-control" id="modalNationalParkLocation" name="nationalparklocation" readonly>
    </div>
    <div class="form-group">
        <label for="modalNationalParkDetails">Details:</label>
        <textarea class="form-control" id="modalNationalParkDetails" name="nationalparkdetails" rows="3" readonly></textarea>
    </div>
    <div class="form-group">
        <label for="modalNationalParkType">Type:</label>
        <input type="text" class="form-control" id="modalNationalParkType" name="nationalparktype" readonly>
    </div>
    <div class="form-group">
        <label for="modalNationalParkFeatures">Features:</label>
        <input type="text" class="form-control" id="modalNationalParkFeatures" name="nationalparkfeatures" readonly>
    </div>
    <div class="form-group">
        <label for="modalPriceInUSD">Price (USD):</label>
        <input type="text" class="form-control" id="modalPriceInUSD" name="priceinusd" readonly>
    </div>
    <input type="hidden" id="modalUserId" name="user_id">
    <input type="hidden" id="modalPackageId" name="package_id">
    <input type="hidden" id="modalNationalParkImage" name="nationalparkimage">
</form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitModalBtn">Insert Query</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            $('.insertBtn').click(function() {
    var id = $(this).data('id');
    var userId = $(this).data('userid');
    var packageId = $(this).data('packageid');
    var nationalParkName = $(this).data('nationalparkname');
    var nationalParkLocation = $(this).data('nationalparklocation');
    var nationalParkDetails = $(this).data('nationalparkdetails');
    var nationalParkType = $(this).data('nationalparktype');
    var nationalParkFeatures = $(this).data('nationalparkfeatures');
    var priceInUSD = $(this).data('priceinusd');
    var nationalParkImage = $(this).data('nationalparkimage');

    // Populate modal fields
    $('#modalNationalParkName').val(nationalParkName);
    $('#modalNationalParkLocation').val(nationalParkLocation);
    $('#modalNationalParkDetails').val(nationalParkDetails);
    $('#modalNationalParkType').val(nationalParkType);
    $('#modalNationalParkFeatures').val(nationalParkFeatures);
    $('#modalPriceInUSD').val(priceInUSD);
    $('#modalUserId').val(userId);
    $('#modalPackageId').val(packageId);
    $('#modalNationalParkImage').val(nationalParkImage);
});

$('#submitModalBtn').click(function() {
    var formData = $('#insertForm').serialize();

    $.ajax({
        type: 'POST',
        url: 'insert_query.php',
        data: formData,
        success: function(response) {
            alert('Data inserted successfully');
        },
        error: function(xhr, status, error) {
            console.error('Error inserting data');
            console.error(error);
        }
    });
});

});
                
        
        
    </script>
</body>
</html>
