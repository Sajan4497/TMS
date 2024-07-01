<?php

include('config.php');




$content = "<center><h2>Privacy Policy</h2></center>
            <p>Thank you for visiting our website. Your privacy is important to us. This Privacy Policy outlines the types of information we collect, how we use it, and the measures we take to keep it secure.</p>
            <center><h3>1. Information Collection</h3></center>
            <p>We may collect various types of information from users, including personal information such as name, email address, phone number, payment details, etc.</p>
            <center><h3>2. Purpose of Collection</h3></center>
            <p>We collect information for purposes such as processing bookings, improving user experience, and sending promotional offers.</p>
            <center><h3>3. Data Usage</h3></center>
            <p>We use the collected information transparently within our tour management system for the stated purposes.</p>
            <center><h3>4. Data Security</h3></center>
            <p>We assure users that their data is securely stored and protected from unauthorized access or misuse through encryption protocols and access controls.</p>
            <center><h3>5. Third-Party Sharing</h3></center>
            <p>If we share user data with third parties (e.g., payment processors, tour operators), we disclose this information and clarify the circumstances under which data is shared.</p>
            <center><h3>6. User Rights</h3></center>
            <p>Users have rights regarding their personal data, such as the right to access, correct, or delete their information.</p>
            <center><h3>7. Cookies and Tracking Technologies</h3></center>
            <p>If our website or application uses cookies or other tracking technologies, we explain their purpose and how users can manage their preferences.</p>
            <center><h3>8. Legal Compliance</h3></center>
            <p>We ensure that our privacy policy complies with applicable laws and regulations, such as the GDPR in Europe or the CCPA in the United States.</p>
            <center><h3>9. Policy Updates</h3></center>
            <p>We reserve the right to update our privacy policy and notify users of any changes. We encourage users to regularly review the policy for updates.</p>
            <center><h3>10. Contact Information</h3></center>
            <p>If you have any questions or concerns regarding your privacy or data handling practices, please contact us at [contact information].</p>";


$content = mysqli_real_escape_string($conn, $content);


$sql = "INSERT INTO policy (content) VALUES ('$content')";


if (mysqli_query($conn, $sql)) {
    echo "Content inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
