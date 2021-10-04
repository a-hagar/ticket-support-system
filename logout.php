<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['cred_type']);

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/logged-in.css" />
    <title>User — ###</title>
</head>
<body>
<header>
        <div id="logo">
            <p>Tech Support</p>
        </div>
        <nav id="navbar">
            <ul id="navlist">

            </ul>
        </nav>
    </header>
    <main>
        <h1>You have successfully logged out!</h1>
        <?php
            header( "refresh:2;url=login.php" );
        ?>
    </main>
    <footer id="footer">
        <p>&copy; 2021, Tech Support by Ahmed</p>
    </footer>
</body>
</html>