<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id") or die($conn->error);
    $student = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $conn->query("UPDATE students SET 
                  firstname='$firstname', middlename='$middlename', lastname='$lastname',
                  age='$age', address='$address', course_section='$course_section' 
                  WHERE id=$id") or die($conn->error);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            <label>First Name:</label>
            <input type="text" name="firstname" value="<?= $student['firstname'] ?>" required>
            <label>Middle Name:</label>
            <input type="text" name="middlename" value="<?= $student['middlename'] ?>" required>
            <label>Last Name:</label>
            <input type="text" name="lastname" value="<?= $student['lastname'] ?>" required>
            <label>Age:</label>
            <input type="number" name="age" value="<?= $student['age'] ?>" required>
            <label>Address:</label>
            <input type="text" name="address" value="<?= $student['address'] ?>" required>
            <label>Course & Section:</label>
            <input type="text" name="course_section" value="<?= $student['course_section'] ?>" required>
            <button type="submit" class="btn btn-submit">Update</button>
        </form>
    </div>
</body>
</html>
