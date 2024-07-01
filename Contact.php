<?php
include('Admin-Header.php');
include('Admin-sidebar.php');
include('config.php');

$sql = 'SELECT * FROM `form`';
$result = mysqli_query($conn, $query);

//if(mysqli_num_rows($result) == 1){
    $userData = mysqli_fetch_assoc($result);

    echo "<pre>";
    print_r($userData );
    echo "</pre>";
    die();
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us Form</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    margin-bottom: 20px;
}

form input,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
</head>
<body>

<!--div class="container">
    <button onclick="showContactForm()">Contact Us</button>
    <div id="contactForm" style="display:;">
      
        <form action="Insert.php" method="POST">
            <input type="text" name="Name" placeholder="Your Name" required><br>
            <input type="email" name="Email" placeholder="Your Email" required><br>
            <input type="tel" name="Phonenumber" placeholder="Your Phonenumber" required><br>
            <textarea name="Reason" placeholder="Your Message" required></textarea><br>
            <input type="submit" value="Submit">
            
        </form>
        
    </div>
</div--->


<div class="container">
<table class="table-fill">
		<thead>
			<tr>
				<th class="text-left">Contat</th>
				<th class="text-left">Details</th>
</tr>
		</thead>
		<tbody class="table-hover">
			<tr>
				<td class="text-left"></td>
				<td class="text-left"></td>

			</tr>
			<tr>
				<td class="text-left">FEBRUARY</td>
				<td class="text-left">$10,000.00</td>

				
			</tr>
			<tr>
				<td class="text-left">MARCH</td>
				<td class="text-left">$85,000.00</td>
			</tr>
			<tr>
				<td class="text-left">APRIL</td>
				<td class="text-left">$65,000.00</td>
			</tr>
			<tr>
					<td class="text-left">MAY</td>
				<td class="text-left">$98,000.00</td>
				
			</tr>
			<tr>
					<td class="text-left">JUNE</td>
				<td class="text-left">108,000.00</td>
				
				
			</tr>
		</tbody>
				
	</table>
</div>

<script>
function showContactForm() {
    document.getElementById('contactForm').style.display = 'block';
}
</script>

</body>
</html>
