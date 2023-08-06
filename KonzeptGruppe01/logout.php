<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="form.css"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION["login"] == true) {
        if (isset($_SESSION["login"])) {
        $_SESSION["login"] = false;

        }
    }
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
    ?>
    
    <h1>Logged out</h1>
    <br>
        <form action="login_form.php">
            <button>Login</button>
        </form>
    <br>        
</body>
</html>
