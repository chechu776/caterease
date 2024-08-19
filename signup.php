
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
                <a href="homeintex.html">CaterEase</a>
            </div>
        </section>
    </header>
    <section class="login">
        <div class="login">
            <div class="head">
                <a href="login.php"><img src="images/back.png" alt=""></a>
                <h1>Sign Up</h1>
                <p></p>
            </div>
            <hr>
            <form action="signup.php" method="post">
                <div>
                    <input type="text" name="Name" placeholder="Name" required>
                    <hr>
                    <input type="text" name="phno" placeholder="Phone no" required>
                    <hr>
                    <input type="email" name="mail" placeholder="Email" required>
                    <hr>
                    <select name="typ" class="typ" id="" required>
                        <option value="" disabled selected>Select User Type</option>
                        <option value="User">User</option>
                        <option value="CSP">Catering service provider</option>   
                    </select>
                    <input type="password" name="pswd" class="p" placeholder="Password" required>
                    <hr>
                    <input type="password" name="pswd1" placeholder="Confirm password" required>
                    <hr>
                    <br>
                    <input class="btn2" type="submit" name="submit" value="Sign In">
                    <p>Already have an account ?<a href="login.php">Log In</a></p>
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
            $paswrd1=$_POST['pswd1'];
            $type=$_POST['typ'];
            if($paswrd===$paswrd1)
            {
            $sql="INSERT INTO user(`name`, `phno`, `email`, `password` ,usertype) VALUES('$name','$phno','$email','$paswrd','$type')";
            $sql2="INSERT INTO `login`(`email`, `password`, `user_type`) VALUES ('$email','$paswrd','$type')";
            $data=mysqli_query($dbcon,$sql);
            $data2=mysqli_query($dbcon,$sql2);
            if($data)
            {
                echo"<Script>alert('Data Inserted')</script>";
            }
        }
        else
        {
            echo"<Script>alert('Password does not match')</script>";
        }
        }
    ?>
</body>
</html>