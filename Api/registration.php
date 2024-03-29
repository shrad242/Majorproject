// registration.php
<?php
// Database connection code here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = $_POST['student_name'];
    $roll_number = $_POST['roll_number'];
    $email = $_POST['email'];

    // Insert student information into the database
    $sql = "INSERT INTO students (student_name, roll_number, email) VALUES ('$student_name', '$roll_number', '$email')";
    // Execute the SQL query

    // Redirect to fee payment page or display a success message
}
?>
<!-- HTML form for student registration -->
<form method="post" action="registration.php">
    <input type="text" name="student_name" placeholder="Student Name" required>
    <input type="text" name="roll_number" placeholder="Roll Number" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Register</button>
</form>
