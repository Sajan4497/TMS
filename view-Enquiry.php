<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
include('admin-header.php');
include('config.php');

if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

$sql = "SELECT * FROM queries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $enquiries = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $enquiries = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Response</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <h1>Enquiries</h1>
    <table id="enquiriesTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>user_id</th>
                <th>package_id</th>
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
            <?php foreach ($enquiries as $enquiry) : ?>
                <tr>
                    <td><?= $enquiry['id'] ?></td>
                    <td><?= $enquiry['user_id'] ?></td>
                    <td><?= $enquiry['package_id'] ?></td>

                    <td><?= $enquiry['nationalparkname'] ?></td>
                    <td><?= $enquiry['nationalparklocation'] ?></td>
                    <td><?= $enquiry['nationalparkdetails'] ?></td>
                    <td><?= $enquiry['nationalparktype'] ?></td>
                    <td><?= $enquiry['priceinusd'] ?></td>
                    <td><?= $enquiry['nationalparkfeatures'] ?></td>
                    <td><img src="<?= $enquiry['nationalparkimage'] ?>" width="100px" height="100px" alt="Image"></td>

                    <td>
                        <a href="Chatbot.php?id=<?= $enquiry['id'] ?>&userid=<?= $enquiry['user_id'] ?>&packageid=<?= $enquiry['package_id'] ?>">
                            <button class="btn btn-primary enquiryBtn">Response</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#enquiriesTable').DataTable();
        });
    </script>
</body>

</html> 