<?php
include('config.php');
include('Admin-Header.php');
include('Admin-sidebar.php');

$sql = "SELECT * FROM `transaction`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    
  
    echo "<tr>
    <th>Package ID</th>
    <th>Customer ID</th>
    <th>Package Name</th>
    <th>Status</th>
    <th>Action</th>
    </tr>";
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row["packageid"] . "</td>";
        echo "<td>" . $row["customerid"] . "</td>";
        echo "<td>" . $row["packagename"] . "</td>";
        echo "<td id='statustxt'>" . $row["status"] . "</td>";
        if($row["status"] == "confirmed"){
            echo "<td><button class='confirm-form' id='confremedbutton' disable >confirmed</button></td>";
        }else{
            echo "<td><button class='confirm-form' id='confremedbutton' data-packageid='". $row["packageid"] ."'>Confirm</button></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No approved packages found.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmed Packages</title>
    <body>
    <style>
      
        table {
            border-collapse: collapse;
            width: 90%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: right;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
   
    <script>



$('.confirm-form').on('click', function(e){
    e.preventDefault(); 
    var packageid = $(this).data('packageid');

     $.ajax({
        url:"confirm-booking.php",
        type:"post",
        data:{
            packageid:packageid 
        },
        success:function(res){
              let obj = JSON.parse(res);
            
               if(obj.status == 'success'){
                alert('Data updated sucessfully...');
                 $('#confremedbutton').text('Confirmed');
                 window.location.href=window.location.href;
               }
        }
     })

});

    </script>
</head>

</body>
</html>
