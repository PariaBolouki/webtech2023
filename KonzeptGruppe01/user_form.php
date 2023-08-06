<html>
<link rel="stylesheet" href="form.css">
<form class="user_input_form" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br>
        <button type="submit">Submit</button>
    </form>
    <a href="login_form.php">
        <button>
        Sign in
        </button>
        </a> 
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $data_file = fopen('userdata.txt', 'a');
    $user_data = $username . ',' . $email . ',' . $password . ',' . "\n";

    if (fwrite($data_file, $user_data)) {
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["login"] = true;
        header("location: http://localhost/webpro/login.php");
        exit();
    }
}

?>
</html>
