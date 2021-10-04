<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/logged-in.css" />
    <title>User Profile| <?php echo $_SESSION['username'] ?></title>
</head>
<body>
<header>
        <div id="logo" >
            <p>Tech Support</p>
        </div>
        <nav id="navbar">
            <ul id="navlist">
                <li class="nav-item"><a href="messages.php">Inbox</a></li>
                <li class="nav-item"><a href="user.php">User Info</a></li>
                <li class="nav-item"><a id="loginBtn" href="logout.php">Log Out</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        echo "<h1>".$_SESSION['first_name'] ." ". $_SESSION['last_name'].'</h1>';



        if($_SESSION['cred_type'] == true){
            print '<img src="img/admin-profile.png"  alt="default admin profile image" width="200">';
            echo "<p>Hello " .$_SESSION['first_name']. ", you have admin acccess and can see all user support messages.</p>";
        } else {
            print '<img src="img/default-profile.png"  alt="default profile image" width="200">';
            echo "<p>Hello " .$_SESSION['first_name']. ", you can see all the tickets and messages you have sent to our support team.</p>";
        }

        ?>

        <a href="login.php">Log Out</a>
    </main>
    <footer id="footer">
        <p>&copy; 2021, Tech Support by Ahmed</p>
    </footer>
</body>
</html>