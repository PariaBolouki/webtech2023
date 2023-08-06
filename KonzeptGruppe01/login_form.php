<html>
<link rel="stylesheet" href="form.css">
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $userdata = file_get_contents('userdata.txt');
    $lines = count(file("userdata.txt"));
    $userdata_csv = str_getcsv($userdata, ',');
    
    if ($lines < 1 ) {
        echo '<p>Invalid username or password.</p>';
        echo '
                <a href="login_form.php">
                    <button>
                    Try Again
                    </button>
                </a>
        ';
        
        echo '
                <a href="user_form.php">
                    <button>
                    Create Account
                    </button>
                </a>
        ';
    } else {
          
            $stored_password = "";
            
            for ($i = 0; $i < $lines; $i++) {
                
                

                if (trim($userdata_csv[$i*3])  == $username) {
                    
                    
                    $stored_password = $userdata_csv[$i*3+2];
                    

                }
            }
       


        if (password_verify($password, $stored_password)) {
            $_SESSION["login"] = true;
            header('Location: login.php');
        } else {
            echo '<p>Invalid username or password.</p>';
           
            
            echo '
            <a href="login_form.php">
                <button>
                Try Again
                </button>
            </a>
    ';
            echo '
            <a href="user_form.php">
                <button>
                Create Account
                </button>
            </a>            
            ';
        }
    }
} else {
    echo '
    <form class="user_input_form" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" required><br>       
        <button type="submit">Login</button>
    </form>
    <a href="user_form.php">
        <button>
        Create Account
        </button>
        </a> 
    ';
}
?>
</html>
