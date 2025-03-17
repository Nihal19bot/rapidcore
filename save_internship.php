<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $college = $_POST['college'];
    $year = $_POST['year'];
    $domain = $_POST['domain'];

    // Handling File Upload
    $cv = $_FILES['cv']['name'];
    $cv_tmp = $_FILES['cv']['tmp_name'];
    $cv_folder = "uploads/" . basename($cv);

    if (move_uploaded_file($cv_tmp, $cv_folder)) {
        $sql = "INSERT INTO internship_applications (name, mobile, email, college, passing_year, domain, cv)
                VALUES ('$name', '$mobile', '$email', '$college', '$year', '$domain', '$cv_folder')";

        if ($conn->query($sql) === TRUE) {
            header("Location: success.html"); // Redirect to success page
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>alert('Failed to upload CV'); window.location.href='internship.html';</script>";
    }
}

$conn->close();
?>
