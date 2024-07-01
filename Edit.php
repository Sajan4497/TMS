<?php
include('config.php');
include('admin-header.php');

// Fetch the existing content from the database
$sql = "SELECT content FROM about WHERE id = 1";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $content = htmlspecialchars($row['content']);
} else {
    $content = "Error fetching content";
}

// Include header file

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit About Us - [Your Company Name]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0; /* Light gray background */
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #ffffff; /* White background for content */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333333; /* Dark gray headings */
            text-align: center; /* Center-align headings */
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            resize: vertical; /* Allow vertical resizing */
        }
        .submit-button {
            display: block;
            width: 100%;
            background-color: #4CAF50; /* Green submit button */
            color: #ffffff; /* White text on the button */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .submit-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <?php include('admin-header.php'); ?>
        </header>
        
        <form action="update-content.php" method="POST">
            <center><h2>Edit About Us</h2></center>
            <textarea name="content" rows="10" cols="50"><?php echo $content; ?></textarea><br>
            <input type="submit" class="submit-button" value="Update">
        </form>
    </div>
</body>
</html>
