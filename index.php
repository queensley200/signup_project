<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<?php
// Display error message if signup failed
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'signupfailed') {
        echo "<p style='color:red;'>Signup failed. Please try again.</p>";
    } elseif ($_GET['error'] == 'emptyfields') {
        echo "<p style='color:red;'>Please fill in all fields.</p>";
    }
}
?>

<form action="includes/signup.inc.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <input type="submit" value="Sign Up">
</form>

</body>
</html>
