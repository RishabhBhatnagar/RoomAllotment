<html>
<head>
    <link rel="stylesheet" media="screen" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
    session_start();
    echo "
        function set_guest(){
            ".$_SESSION["guest"] = true."
            return true;
        }
    "
?>
<div id="particles-js">
    <div id="toplayer">
        <div id="container">
            <h1>ROOM  ALLOTMENT</h1>
        </div>
        <hr color="white">
        <div class="right">
            <form action="../php/registration_page.php" method="post">
                <font>
                    SIGN IN:
                </font>
                <br>
                <br>
                <div class="input-group">
                    <i class="fa fa-user icon"></i>
                    <input id="username" name=username type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <br>
                <div class="input-group">
                    <i class="fa fa-key icon"></i>
                    <input id="password" type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>

                <!-->
                    Submitting the form will send a post request to registration page which
                    will validate user from dataBase by checking username and hashed password
                    if the user is not validated, control comes back to this page.
                <!-->
                <button type="submit" class="btn-primary">Submit</button>
                <br>
                <font>
                    <br>
                    <!--guest is sent with a get request directly to homepage.-->
                    Guest login, <a href="user_homepage/user_homepage.php" onclick="function set_guest()"><font><u>Click here.</u></font></a>
                </font>
            </form>
        </div>
        <h2>Welcome</h2>
        <br>
        <br>
        <p>
            Committees can check the availability of various rooms such as the classrooms, labs, halls, etc that they can use strictly for conducting workshops or organizing events or seminars. Along with that, committee members can also view the list of rooms booked by them for various events along with the list of bookings that have been approved by the person incharge.
        </p>
        © 2018 GitHub, Inc.

    </div>
    <div id="btmlayer" >
        <script src="../particles.js"></script>
        <script>
            particlesJS.load('particles-js', '../particles.json', function(){
                console.log('particles.json loaded...');
            });
        </script>
    </div>
</div>
</body>
</html>