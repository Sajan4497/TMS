<?php
include ("config.php");

if (isset($_GET['id'])) {
    echo $user_id = $_GET['id'];
    echo $sql = "SELECT `notes` FROM `queries` WHERE `user_id` = '$user_id'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $adminNoteCount = 0;
        while ($row = $result->fetch_assoc()) {
            $notes = json_decode($row['notes'], true);
            $lastNoteType = null;
            foreach ($notes as $note) {
                if (isset($note['notes'])) {
                    $lastNoteType = $note['notes'];
                }
            }
            if ($lastNoteType === 'Admin') {
                $adminNoteCount++;
            }
        }
        echo $adminNoteCount;
    } else {
        echo "0";
    }
} else {
    echo "0";
}
