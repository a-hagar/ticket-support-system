<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header('Location: login.php');
}

if($_SESSION['cred_type'] == false){
    $id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/logged-in.css" />
    <title>Messages | <?php echo $_SESSION['username'] ?></title>
</head>
<body>
<header>
        <div id="logo">
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
        <h1>Your Inbox</h1>
        <div id="messages-box">
            <table>
                <thead>
                    <?php
                    if($_SESSION['cred_type'] == true){
                        print '<th class="table-space";">Username</th>';
                    }
                    ?>
                    <th class="table-space">Subject</th>
                    <th class="table-space">Issue Status</th>
                </thead>
                <tbody>
                <?php

                $xml = simplexml_load_file("xml/support.xml");

                
                if(($_SESSION['cred_type'] == false)){
                    $userTk = $xml->xpath("//*[userId='$id']");
                    //print_r($userTk);

                    foreach ($userTk as $u) {
                        print "<tr><td><a href=ticket-details.php?id={".
                        $u->ticketId
                        ."}>".
                        $u->subject
                        ."</td><td>".
                        $u->status
                        ."</td><tr>";
                    }
                } else {
                    foreach ($xml->children() as $tk) {
                        $xmlUser = simplexml_load_file("xml/users.xml");

  

                        print "<tr><td>".
                        (string)$xmlUser->xpath('//*[userid='.$tk->userId.']/username')[0]
                        .'</td>';
                        print "<td><a href=ticket-details.php?id={".
                            $tk->userId
                            ."}>".
                            $tk->subject
                            ."</td><td>".
                            $tk->status
                            ."</td><tr>";

                    }
                };
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer id="footer">
        <p>&copy; 2021, Tech Support by Ahmed</p>
    </footer>
</body>
</html>
