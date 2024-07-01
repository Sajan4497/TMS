<?php
error_reporting(E_ERROR | E_PARSE);
include('config.php');

$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $id = $_POST['id'];
        $nationalparkname = $_POST['nationalparkname'];
        $nationalparklocation = $_POST['nationalparklocation'];
        $nationalparkdetails = $_POST['nationalparkdetails'];
        $nationalparktype = $_POST['nationalparktype'];
        $priceinusd = $_POST['priceinusd'];  
        $nationalparkfeatures = $_POST['nationalparkfeatures'];
      // Check if image is provided
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $filename = $_FILES['image']['name'];
        $fileloc = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];
        $destination = "upload/".$filename;

        if (move_uploaded_file($fileloc, $destination)) {
            $mysql = "UPDATE crud SET nationalparkname = '$nationalparkname',
                                      nationalparklocation = '$nationalparklocation',
                                      nationalparkdetails = '$nationalparkdetails',
                                      nationalparktype = '$nationalparktype',
                                      priceinusd = '$priceinusd',
                                      nationalparkfeatures = '$nationalparkfeatures',
                                      nationalparkimage = '$destination'
                      WHERE id = $id";
        } else {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Error uploading image";
        }
    } else {
        $mysql = "UPDATE crud SET nationalparkname = '$nationalparkname',
                                  nationalparklocation = '$nationalparklocation',
                                  nationalparkdetails = '$nationalparkdetails',
                                  nationalparktype = '$nationalparktype',
                                  priceinusd = '$priceinusd',
                                  nationalparkfeatures = '$nationalparkfeatures'
                  WHERE id = $id";
    }

    if (isset($mysql)) {
        if (mysqli_query($conn, $mysql)) {
            if (mysqli_affected_rows($conn) > 0) {
                $blank_array['status'] = true;
                $blank_array['msg'] = "Package Record updated Successfully";
            } else {
                $blank_array['status'] = false;
                $blank_array['msg'] = "Package Record does not exist";
            }
        } else {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Error updating packaging record: " . mysqli_error($conn);
        }
    }
}

echo json_encode($blank_array);
?>
