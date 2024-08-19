<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering service management system</title>
    <link rel="stylesheet" href="style/style.css" type="text/css">
    <style>
        .btn2{
            border: 1px solid #008080;
            border-radius: 20px;
            padding: 8px 20px;
            justify-content: center;
            display: flex;
            color: white;
            text-decoration: none;
            margin-top: 10px !important;
            margin-bottom: 30px;
            background-color: #008080;
        }
        .btn2:hover{
            background-color: white;
            color: #009879;
            border: 2px solid #009879 !important;
            transition: all 0.2s linear;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <header>
        <section class="wrapper">
            <div class="left">
                <a href="homeintex.html">CaterEase</a>
            </div>
        </section>
    </header>
    <section class="login">
        <div class="login">
            <div class="head">
                <p></p>
                <h1>Login</h1>
                <p></p>
            </div>
            <hr>
            <form action="login.php" method="POST">
                <div>
                    <input type="email" name="mail" placeholder="Email" required>
                    <hr>
                    <input type="password" name="pswd" placeholder="Password" required>
                    <hr>
                    <br>
                    <input class="btn2" type="submit" name="submit" value="Log In">
                    <p>Not a Member ?<a href="signup.php">Sign Up</a></p>
                </div>
            </form>
        </div>
    </section>
    <?php
        $dbcon=mysqli_connect("localhost","root","","caterease");
        if (!$dbcon) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(isset($_POST['submit']))
        {
            $email=$_POST['mail'];
            $paswrd=$_POST['pswd'];
            $sql="SELECT * FROM `login` WHERE email='$email' and password ='$paswrd'";
            $data=mysqli_query($dbcon,$sql);
            if($data)
            {   
                $row=mysqli_num_rows($data);
                if($row > 0){
                    header('Location: home.html');
                    exit();
                }
                else
                echo"<Script>alert('User not found')</script>";
            }
            else{
                echo"<Script>alert('Incorrect email or password')</script>";
            }
        }
    ?>
</body>
</html>