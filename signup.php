
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering service management system</title>
    <link rel="stylesheet" href="./style/style.css" type="text/css">
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
                <a href="home.html">CaterEase</a>
            </div>
        </section>
    </header>
    <section class="login">
        <div class="login">
            <div class="head">
                <a href="login.html"><img src="images/back.png" alt=""></a>
                <h1>Sign Up</h1>
                <p></p>
            </div>
            <hr>
            <form action="signup.php" method="post">
                <div>
                    <input type="text" name="Name" placeholder="Name">
                    <hr>
                    <input type="text" name="phno" placeholder="Phone no">
                    <hr>
                    <input type="email" name="mail" placeholder="Email">
                    <hr>
                    <input type="password" name="pswd" placeholder="Password">
                    <hr>
                    <input type="password" placeholder="Confirm password">
                    <hr>
                    <br>
                    <input class="btn2" type="submit" name="submit" value="Sign In">
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
            $name=$_POST['Name'];
            $phno=$_POST['phno'];
            $email=$_POST['mail'];
            $paswrd=$_POST['pswd'];
            $sql="INSERT INTO user(`name`, `phno`, `email`, `password`) VALUES('$name','$phno','$email','$paswrd')";
            $data=mysqli_query($dbcon,$sql);
            if($data)
            {
                echo "Data Inserted";
            }
        }
    ?>
</body>
</html>