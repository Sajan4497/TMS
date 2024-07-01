<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

//print_r($_SESSION);

// Include the database configuration file
include('config.php');

// Redirect users to login page if they are not logged in
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Fetch data from the database
$sql = "SELECT * FROM `crud`";
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
                            <a href="Fetch-Chat-history.php?packageid=<?= $row['id'] ?>&user_id=<?= $_SESSION['id'] ?>"><button class="btn btn-primary enquiryBtn" data-toggle="modal" data-target="#exampleModal" data-userid="<?= $_SESSION['id'] ?>" data-packageid="<?= $row['id'] ?>" data-nationalparkname="<?= $row['nationalparkname'] ?>" data-nationalparklocation="<?= $row['nationalparklocation'] ?>" data-nationalparkdetails="<?= $row['nationalparkdetails'] ?>" data-nationalparktype="<?= $row['nationalparktype'] ?>" data-nationalparkfeatures="<?= $row['nationalparkfeatures'] ?>" data-priceinusd="<?= $row['priceinusd'] ?>" data-toggle="modal" data-target="#exampleModal">
                                    Enquiry
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

    <!-- Enquiry Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquiry Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="enquiryForm">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="userId" name="userId">
                        <input type="hidden" id="packageId" name="packageId">
                        <div class="form-group">
                            <label for="note">Add Note</label>
                            <input type="text" class="form-control" id="note" name="note">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendEnquiryBtn">Send Enquiry</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Modal -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chat History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="chat-container">
                        <!-- Chat messages will be dynamically inserted here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            $('.enquiryBtn').click(function() {
                var userId = $(this).data('userid');
                var packageId = $(this).data('packageid');


                $('#userId').val(userId);
                $('#packageId').val(packageId);

                // Show the enquiry modal
                $('#exampleModal').modal('show');
            });

           
            $('#sendEnquiryBtn').click(function() {
                var formData = {
                    userId: $('#userId').val(),
                    packageId: $('#packageId').val(),
                    note: $('#note').val()
                };

                $.ajax({
                    url: 'Submit-Enquiry.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        $('#exampleModal').modal('hide');
                        var enquiryId = response.enquiry_id;
                        fetchChatHistory(formData.packageId, formData.userId);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Function to fetch chat history
            function fetchChatHistory(packageId, userId) {
                $.ajax({
                    url: 'Fetch-Chat-history.php',
                    type: 'GET',
                    data: {
                        package_id: packageId,
                        user_id: userId
                    },
                    dataType: 'json',
                    success: function(chatData) {
                        var chatContainer = $('#chatModal .chat-container');
                        chatContainer.empty();

                        if (chatData.length > 0) {
                            chatData.forEach(function(message) {
                                var className = (message.sender === 'Admin') ? 'admin' : 'customer';
                                var messageHtml = '<div class="message ' + className + '"><p>' + message.note + '</p></div>';
                                chatContainer.append(messageHtml);
                            });
                        } else {
                            chatContainer.html('<p>No chat history found.</p>');
                        }

                        $('#chatModal').modal('show'); // Show the chat modal with updated content
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        $('#chatModal .chat-container').html('<p>Error fetching chat history.</p>');
                        $('#chatModal').modal('show'); // 
                    }
                });
            }
        });
    </script>
</body>

</html>