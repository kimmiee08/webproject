<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);
    $gender = $_POST['gender'];

    if (empty($name) || empty($email) || empty($course) || empty($gender)) {
        echo "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
    } else {
        mysqli_query($conn,
            "UPDATE students SET
            name='$name',
            email='$email',
            course='$course',
            gender='$gender'
            WHERE id=$id"
        );

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="name" value="<?php echo $student['name']; ?>">
    <input type="email" name="email" value="<?php echo $student['email']; ?>">
    <input type="text" name="course" value="<?php echo $student['course']; ?>">

    <select name="gender">
        <option <?php if ($student['gender']=="Male") echo "selected"; ?>>Male</option>
        <option <?php if ($student['gender']=="Female") echo "selected"; ?>>Female</option>
    </select>

    <button type="submit" name="update">Update Student</button>
</form>

</div>
</body>
</html>
