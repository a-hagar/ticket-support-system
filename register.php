<?php

if(isset($_POST['register'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];

    //open users xml and create users path to insert new user info
    $xml = simplexml_load_file("xml/users.xml");
    $log = $xml->xpath("//*");

    //calcuating last message id to auto-increment
    $last_id = $xml->xpath("//*/user[last()]/userid")[0];
    $auto_inc_id = (string)$last_id[0]+1;

    //testing
    //print_r($log);

    //creating new user with attributes and auto-incrementing userid
    $new_user = $log[0]->addChild("user");
    $new_user->addAttribute('userType', 'client');
    $new_user->addAttribute('isAdmin', 'no');
    $new_id = $new_user[0]->addChild("userid", $auto_inc_id);

    //adding full name including child node
    $new_name = $new_user[0]->addChild("name");
    $new_firstname = $new_name->addChild("firstname", $firstname);
    $new_lastname = $new_name->addChild("lastname", $lastname);

    //adding new usernames and passwords
    $new_username = $new_user[0]->addChild("username", $user);
    $new_pass = $new_user[0]->addChild("password", $pass);


    //testing
    //print_r($new_pass);

    //if statement to make sure null values to not pass through
    if (!$user == null && !$pass == null ){
        $xml->asXML('xml/users.xml');

        header('Location: login.php');
    } else {
        echo "Please enter valid name, username, and password to register!";
    }

} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Register</title>
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
            <h1>Register</h1>
            <form method="POST" action="">
            <div class="input-group">
                    <input type="text" name="first" placeholder="First Name">
                </div>
                <div class="input-group">
                    <input type="text" name="last" placeholder="Last Name">
                </div>
                <div class="input-group">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button class="submitBtn" name="register">Register</button>
            </form>
            <div>
                <p class="form-link">If you have an account, <a href="login.php">login here</a>.</p>
            </div>
            
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