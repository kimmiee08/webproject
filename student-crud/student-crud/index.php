<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Student Records</h2>

<a href="add.php" class="button">Add Student</a>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Gender</th>
    <th>Actions</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['course']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>" class="button">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']; ?>" 
           class="button delete"
           onclick="return confirm('Are you sure?');">Delete</a>
    </td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
