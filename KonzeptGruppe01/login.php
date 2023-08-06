<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="form.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>
        Protected section
    </h1>
    <?php
    session_start();
    $login_status = '';
    if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
        $login_status = '<img class="login_status" style="width:70px; height: auto;" src="img/login.svg" alt="login checkmark">
        ';
    }
    if (isset($_SESSION["login"]) && $_SESSION["login"] == false) {
        $login_status = '<img class="login_status" style="width:70px; height: auto;" src="img/logout.png" alt="logged out checkmark">
        ';
    }
    echo $login_status;

    if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
        echo '<p>Logged in</p>';
        echo '<br>';
        echo '
        <form action="logout.php" method="POST">
            <button>Logout</button>
        </form>                
        ';
    } else {
        echo '<p>Access denied<p>';
        echo '
        <form action="login_form.php">
            <button>Login</button>
        </form>
        <br>        
        ';
        echo '
        <form action="user_form.php">
            <button>Create account</button>
        </form>            
        ';
    }
    ?>
</body>
</html>
