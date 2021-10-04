<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header('Location: login.php');

}

//current timestamps
$curr_time = date("h:i:s");
$curr_day = date("d");
$curr_month = date("m");
$curr_year = date("Y");

if(isset($_POST['send'])){
    $text = $_POST['text'];
    $option =$_POST['status'];

    //load and access the message logs of the selected ticket and insert new messaeg
    $xml = simplexml_load_file("xml/support.xml");
    $id = trim($_GET["id"], '{}');
    $log = $xml->xpath("//*[userId='$id']/log");

    //calcuating last message id to auto-increment
    $last_msg = $xml->xpath("//*[userId='$id']/log/message[last()][@id]")[0];
    $auto_inc_id =(string)$last_msg->attributes()[0]+1;

    //adding new message info to xml
    $new_msg = $log[0]->addChild("message");
    $new_msg ->addAttribute('id', $auto_inc_id);
    $new_user = $new_msg[0]->addChild("userId", $_SESSION['id']);

    //new timestamp set to current time
    $new_timestamp = $new_msg[0]->addChild("timestamp");
    $new_time = $new_timestamp->addChild('sendtime', $curr_time);
    $new_day = $new_timestamp->addChild('sendday', $curr_day);
    $new_month = $new_timestamp->addChild('sendmonth', $curr_month);
    $new_year = $new_timestamp->addChild('sendyear', $curr_year);

    $new_text = $new_msg[0]->addChild("text", $text);


    if($_SESSION['cred_type'] == true){
        $new_status = $xml->xpath("//*[userId='$id']/status");
        foreach($new_status as $s){
            $s[0] = $option;
        }
    }

    $xml->asXML('xml/support.xml');
    header("Refresh:0");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/logged-in.css" />
    <title> Message Details </title>
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
        <h1>Message Log</h1>
        <div id="messages-box">
            <table>
                <tbody>
                <?php

                $xml = simplexml_load_file("xml/support.xml");
                
                $id = trim($_GET["id"], '{}');
                $status = (string) $xml->xpath("//*[userId='$id']/status")[0];
                print "<strong> Current stats: </strong>". $status .'</br>';

                $messages = $xml->xpath("//*[userId='$id']/log/message");

                foreach($messages as $m){
                    $xmlUser = simplexml_load_file("xml/users.xml");

                    print'<tr><td>'.
                    $m->text." <br>".
                    (string)$xmlUser->xpath('//*[userid='.$m->userId.']/name/firstname')[0]. " ".
                    (string)$xmlUser->xpath('//*[userid='.$m->userId.']/name/lastname')[0]."<br>".
                    
                    $m->timestamp->sendmonth."/".
                    $m->timestamp->sendday."/".
                    $m->timestamp->sendyear." ".
                    $m->timestamp->sendtime
                    .'</td></tr>';

                }
                 ?>
                </tbody>
            </table>
        </div>
        <div id="chat">
            <form  method="POST">
                <label>Type your message below</label>
                <?php
                if($_SESSION['cred_type'] == true){
                    print'<select name="status">
                        <option value="ongoing">ongoing</option>
                        <option value="resolved">resolved</option>
                    </select>';
                }
                ?>
                <div id="chatbox">
                    <textarea id="chatbox" name="text"></textarea>
                </div>
                <button class="submitBtn" name="send" >Send</button>
            </form>
        </div>
    </main>
    <footer id="footer">
        <p>&copy; 2021, Tech Support by Ahmed</p>
    </footer>
</body>
</html>