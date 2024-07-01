<!DOCTYPE html>
<html>
<head>
    <title> Confirmation</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .confirm-form {
            display: inline-block;
        }
    </style>
</head>
<body>

<?php
error_reporting(E_ERROR | E_PARSE);
include('config.php');

if(isset($_POST['confirm'])) {
    $packageid = $_POST['packageid'];
    
    
    $sql_update = "UPDATE transaction SET status = 'confirmed' WHERE packageid = '$packageid'";
    if ($conn->query($sql_update) === TRUE) {
        echo "Transaction confirmed successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

//$sql = "SELECT * FROM transaction WHERE status ='approved'";
//$result = $conn->query($sql);

//if ($result->num_rows > 0) {
    //echo "<table>";
    //echo "<tr>
    //<th>Package ID</th>
   // <th>Customer ID</th>
   /// <th>Package Name</th>
   // <th>Status</th>
   // <th>Action</th>
    //</tr>";
   // while($row = $result->fetch_assoc()) {
       // echo "<tr>";
      //
      /  //echo "<td>" . $row["packageid"] . "</td>";
        //echo "<td>" . $row["customerid"] . "</td>";
       // echo "<td>" . $row["packagename"] . "</td>";
       // echo "<td>" . $row["status"] . "</td>";
        echo "<td class='confirm-form'><form method='post'>
        <input type='hidden' name='packageid' value='" . $row["packageid"] . "'>
        <input type='submit' name='confirm' value='Confirm'></form></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No approved packages found.";
}
?>

</body>
</html>
