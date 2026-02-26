<?php
include "db.php";
$message = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);
    $gender = $_POST['gender'];

    if (empty($name) || empty($email) || empty($course) || empty($gender)) {
        $message = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format!";
    } else {
        $sql = "INSERT INTO students (name, email, course, gender)
                VALUES ('$name', '$email', '$course', '$gender')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            $message = "Error adding student";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Add Student</h2>

<p style="color:red;"><?php echo $message; ?></p>

<form method="POST">
    <input type="text" name="name" placeholder="Student Name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="course" placeholder="Course">

    <select name="gender">
        <option value="">Select Gender</option>
        <option>Male</option>
        <option>Female</option>
    </select>

    <button type="submit" name="submit">Save Student</button>
</form>

</div>
</body>
</html>
