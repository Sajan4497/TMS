


<style>
    .conteiner {
    padding-left: 214px;
    margin-top: 24px;
}
    </style>

<?php

include('config.php');
include('extra.php');
$sql = "SELECT * FROM form";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {
?>

<div class="conteiner">
 <?php
    echo "<table border='1'>";
    echo "<tr><th>ID
    </th><th>Name</th>
    <th>Email</th><th>Phone Number</th><th>Address</th><th>Reason</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Phonenumber'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Reason'] . "</td>";
        echo "</tr>";
       // echo "<td><a href='update_contact.php?id=" . $row['id'] . "'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
    </div>
    <?php
} else {
    echo "No contacts found.";
}



?>
