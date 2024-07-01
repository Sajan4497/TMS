<?php
error_reporting(E_ALL ^ E_WARNING);
include('config.php');
$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nationalparkname = $_POST['nationalparkname'];
    $nationalparklocation = $_POST['nationalparklocation'];
    $nationalparkdetails = $_POST['nationalparkdetails'];
    $nationalparktype = $_POST['nationalparktype'];
    $priceinusd = $_POST['priceinusd'];  
    $nationalparkfeatures = $_POST['nationalparkfeatures'];

    if ($nationalparkname == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter the park name";
    } elseif ($nationalparklocation == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please select the location";
    } elseif ($nationalparkdetails == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter park details";
    } elseif ($nationalparktype == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter the park type";
    
    }elseif ($nationalparkfeatures == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter the park features";
    } elseif (!isset($_FILES['image']) || empty($_FILES['image']['name'])) {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Image is required";
    } else {
        $filename = $_FILES['image']['name'];
        $fileloc = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];
        $destination = "upload/" . $filename;

        if (move_uploaded_file($fileloc, $destination)) {
            
       // } else {
            $blank_array['status'] = "error";
            $blank_array['msg'] = "Failed to upload image";
       // }
   // }

   //if (!isset($blank_array['status'])) {
        $query = "INSERT INTO crud (nationalparkname, nationalparklocation, nationalparkdetails, nationalparktype, priceinusd, nationalparkfeatures, nationalparkimage) 
                  VALUES ('$nationalparkname', '$nationalparklocation', '$nationalparkdetails', '$nationalparktype', '$priceinusd', '$nationalparkfeatures', '$destination')";

        if (mysqli_query($conn, $query)) {
            $blank_array['status'] = "success";
            $blank_array['msg'] = "Form created successfully";
        } else {
            $blank_array['status'] = "error";
            $blank_array['msg'] = "Error Found";
        }
    }
}
}
//}
echo json_encode($blank_array);
?>
