<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $conn->query("INSERT INTO students (firstname, middlename, lastname, age, address, course_section)
                  VALUES ('$firstname', '$middlename', '$lastname', '$age', '$address', '$course_section')")
        or die($conn->error);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>
        <form method="POST" action="">
            <label>First Name:</label>
            <input type="text" name="firstname" required>
            <label>Middle Name:</label>
            <input type="text" name="middlename" required>
            <label>Last Name:</label>
            <input type="text" name="lastname" required>
            <label>Age:</label>
            <input type="number" name="age" required>
            <label>Address:</label>
            <input type="text" name="address" required>
            <label>Course & Section:</label>
            <input type="text" name="course_section" required>
            <button type="submit" class="btn btn-submit">Add</button>
        </form>
    </div>
</body>
</html>
