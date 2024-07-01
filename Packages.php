<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
include('config.php');
//include('extra.php');

// Redirect to login page if user is not logged in
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}


// Fetch data from the database
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
<body>
    <div class="content">
        <table id="myTable" class="content" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>National Park Name</th>
                    <th>National Park Location</th>
                    <th>National Park Details</th>
                    <th>National Park Type</th>
                    <th>Price (USD)</th>
                    <th>National Park Features</th>
                    <th>National Park Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>

                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nationalparkname'] ?></td>
                        <td><?= $row['nationalparklocation'] ?></td>
                        <td><?= $row['nationalparkdetails'] ?></td>
                        <td><?= $row['nationalparktype'] ?></td>
                        <td><?= $row['priceinusd'] ?></td>
                        <td><?= $row['nationalparkfeatures'] ?></td>
                        <td><img src="<?= $row['nationalparkimage'] ?>" width="100px" height="100px" alt="Image"></td>
                        <td>
                            <button class="book-button"
                                    data-id="<?= $row['id'] ?>"
                                    data-price="<?= $row['priceinusd'] ?>"
                                    data-nationalparkname="<?= $row['nationalparkname'] ?>"
                                    data-status="pending"
                                    data-packagename="<?= $row['nationalparkname'] ?>"
                                    data-packageid="<?= $row['id'] ?>"
                                    data-packageprice="<?= $row['priceinusd'] ?>"
                                    data-customerid="<?= $_SESSION['id'] ?>" 
                                    data-image="<?= $row['nationalparkimage'] ?>"
                                    data-target="#BookModal">
                                Book Package
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button><a href="Logout.php">Logout</a></button>
    </div>

    <!-- Bootstrap and DataTables JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

            const stripe = Stripe('pk_test_51PLeLNRqM69andAANgXcXOQLKFLsSKOmMmfViVPs7VD0Vnh5TKGR8L3lzxncosoZ6eWcyb848HG9MLLhB4ucsogd00jByUByVO'); 

            $('.book-button').click(function () {
                const id = $(this).data('id');
                const price = $(this).data('price');
              
                
                const status = $(this).data('status');
                const packagename = $(this).data('packagename');
                const packageid = $(this).data('packageid');
                const packageprice = $(this).data('packageprice');
                const customerid = $(this).data('customerid');

                const formData = {
                    id: id,
                    priceinusd: price,
                   
                    status: status,
                    packagename: packagename,
                    packageid: packageid,
                    packageprice: packageprice,
                    customerid: customerid,
                };

                fetch('createNew-checkout.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(session => {
                    if (session.error) {
                        alert(session.error);
                    } else {
                        stripe.redirectToCheckout({ sessionId: session.id });
                    }
                })
                //.catch(error => {
                    //console.error('Error:', error);
                    //alert('An error occurred while processing your request.');
                });
            });
       // });
    </script>
</body>
</html>
