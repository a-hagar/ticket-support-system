<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./img/img1.jpg");
  height: 100%;
  overflow: hidden;
  background-size: cover;
  position: relative;
}


#body {
    position: absolute;
    left: 25%;
    font-family: sans-serif;
    margin: 2.5em auto;
    max-width: 60%;
    min-height: 100%;
    font-size: 1.125em;
    color: rgb(235, 235, 235);
    padding: 0 .5em
}

header{
    padding-bottom: 40px;
    border-bottom: 1px solid gray;
}

#logo{
    float: left;
}
#logo p{
    font-weight: 700;
    margin-top: 0px;
}
#navlist {
    list-style-type: none;
    text-decoration: none;
    margin: 0;
    padding: 0;
    float: right;
} 
.nav-item {
    display: inline-block;
    padding-right: 20px;
    color: white;
    text-decoration: none;
}
.nav-item a{
    text-decoration: none;
}
#loginBtn{
    border: none;
    color: #f5deb3;
    background-color: rgb(250, 120, 120);
    border-radius: 15px;
    padding: 5px 20px;
    text-decoration: none;
}

main{
    margin: 40px 80px;
}

.form-link{
    padding-top: 30px;
    font-size: 14px;
}

.form {
    display: flex;
    flex-direction: column;
    margin: 2em 0 1em;
    border: none;
    padding: 20px 50px;
    border-radius: 10px;
    background-color: #364e46e3;
}

.input-group {
    display: flex;
    align-items: center;
    margin-bottom: 1em;
}

input{
    font-size: 16px;
    background-color: #364e46;
    color: wheat;
    border: none;
    height: 30px;
    width: 60%;
    border-bottom: 1px solid #f5deb3;
}

input::placeholder{
    color: rgb(44, 44, 44);
    color: wheat;
}

.submitBtn{
    margin-top: 20px;
    border: none;
    padding: 10px 20px;
    background-color: rgb(250, 120, 120);
    border-radius: 15px;
}

.submitBtn:hover{
    background-color: rgb(189, 72, 72);
    color: white;
}

table{
    border-collapse: collapse;
}
.table-space {
    padding: 0px 110px 15px 0px;
    text-align: left;
}

tr:nth-child(even){
    background-color: #53796c;
}

a, a:visited{
    color: rgb(150, 150, 241);
}

a:hover{
    color: rgb(218, 119, 119);
}

#profile{
    width: 100px;
}

#footer{
    position: fixed;
    bottom: 0;
    padding-left: 1px;
    font-size: 12px;
}

#footer p{
    font-size: 15px;

}

.image-credit{
    position: fixed;
    bottom: 0;
    right: 25%;
}
.image-credit a{
    color: rgb(235, 235, 235);
    text-decoration: none;
}



</style>
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
                    <form>
                        <div class="input-group">
                            <input type="text" placeholder="Username">
                        </div>
                        <div class="input-group">
                            <input type="password" placeholder="Password">
                        </div>
                        <button class="submitBtn" >Login</button>
                    </form>
                    <div>
                        <p class="form-link">If you do not have an account, <a href="register.php">register here</a>.</p>
                    </div>

                <a href="messages.php">Bypass [FOR TESTING!!DELETE BEFORE SUBMITTING!!]</a><br>

            </div>
        </main>
        <footer id="footer">
            <p>&copy; 2021, Tech Support by Ahmed</p>
            <div class="image-credit">
                <p>Credit: <a href="#">Test</a></p>
            </div>
        </footer>
        </div>
    </div>
</body>
</html>