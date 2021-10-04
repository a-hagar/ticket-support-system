<?php
session_start();

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['password'];

    //load xml file
    $xml = simplexml_load_file('xml/users.xml');

    //xpath for username, password, admin access and converted to string
    $xmlUser = $xml->xpath("//*[username='$user']/username");
    $xmlPass = $xml->xpath("//*[username='$user']/password");
    $xmlIsAdmin = (string)$xml->xpath("//*[username='$user']/@isAdmin")[0];

    //convert xml object to string for validation
    $validUser = (string) $xmlUser[0];
    $validPass = (string) $xmlPass[0];


    /*testing xpath 
    $test = (string) $xml->xpath("//*[username='$user']/name")[0];

    print_r($validUser);
    */

    //validate user input by comparing to the registered users in xml
    if($user == $validUser  && $pass == $validPass){
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pass; 
        
        //verifying admin access
        if($xmlIsAdmin == "yes"){
            $_SESSION['cred_type'] = true;
        } else {
            $_SESSION['cred_type'] = false;
        }
        
        $_SESSION['id'] = (string) $xml->xpath("//*[username='$user']/userid")[0];
        $_SESSION['first_name'] = (string) $xml->xpath("//*[username='$user']/name/firstname")[0];
        $_SESSION['last_name'] = (string) $xml->xpath("//*[username='$user']/name/lastname")[0];
        
        header('Location: messages.php');

    } else if ($user == null || count($xmlUser) == 0 || $pass == null ){
        header('Location: login.php');
        echo "Invalid username or password. Please try again";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" >
    <title>Login</title>
</head>
<body>
    <div class="hero-image">
        <div id="body">
            <header>
                    <div id="logo">
                        <p>Tech Support</p>
                    </div>
                <nav id="navbar">
                    <ul id="navlist">
                        <li class="nav-item"><a id="loginBtn" href="login.php">Log in</a></li>
                    </ul>
                </nav>
            </header>
        <main>
            <div class="form">
                <h1>Login</h1>
                    <form method="POST">
                        <div class="input-group">
                            <input type="text" name="user" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button class="submitBtn" name="login" >Login</button>
                    </form>
                    <div>
                        <p class="form-link">If you do not have an account, <a href="register.php">register here</a>.</p>
                    </div>
                <br>
                <br>

            </div>
        </main>
        <footer id="footer">
            <p>&copy; 2021, Tech Support by Ahmed</p>
            <div class="image-credit">
                <p>Image:<a href="https://commons.wikimedia.org/wiki/File:Financial_District_Toronto_May_2012_(1).jpg"> Financial District, Toronto</a></p>
            </div>
        </footer>
        </div>
    </div>
</body>
</html>