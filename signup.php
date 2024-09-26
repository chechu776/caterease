<?php
$dbcon = mysqli_connect("localhost", "root", "", "caterease");
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $phno = $_POST['phno'];
    $email = $_POST['mail'];
    $paswrd = $_POST['pswd'];
    $paswrd1 = $_POST['pswd1'];
    $type = $_POST['typ'];

    if ($type == 'User') {
        $usertype = 0;
        $status = "active";
    } else {
        $usertype = 1;
        $status = "active";
    }
    if ($type == 'CSP') {
        $csp_name = $_POST['csp_name'];
        $address = $_POST['address'];
    }

    if ($paswrd == $paswrd1) {
        $sql = "INSERT INTO user(`name`, `phno`, `email`, `password`, `usertype`,`status`) 
                VALUES ('$name', '$phno', '$email', '$paswrd', '$type','$status')";
        $sql2 = "INSERT INTO `login`(`email`, `password`, `user_type`) 
                 VALUES ('$email', '$paswrd', '$usertype')";
        if ($type == 'CSP') {
            $sql3 = "INSERT INTO `csp_table`(`csp_name`, `address`,) 
                     VALUES ('$csp_name', '$address')";
            mysqli_query($dbcon, $sql3);
        }
        
        $data = mysqli_query($dbcon, $sql);
        mysqli_query($dbcon, $sql2);

        if ($data) {
            echo "<script>alert('Data Inserted');</script>";
            header('Location: login.php');
            exit(); 
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Service Management System</title>
    <link rel="stylesheet" href="./style/style.css" type="text/css">
    <style>
        .btn2 {
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
        .btn2:hover {
            background-color: white;
            color: #009879;
            border: 2px solid #009879 !important;
            transition: all 0.2s linear;
            font-weight: 700;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .csp-fields {
            display: none; /* Hidden by default */
        }
    </style>
    <script>
        function validateForm() {
            let name = document.forms["signupForm"]["Name"].value;
            let phno = document.forms["signupForm"]["phno"].value;
            let email = document.forms["signupForm"]["mail"].value;
            let password = document.forms["signupForm"]["pswd"].value;
            let confirmPassword = document.forms["signupForm"]["pswd1"].value;
            let userType = document.forms["signupForm"]["typ"].value;

            const nameRegex = /^[A-Za-z\s]+$/;
            if (!nameRegex.test(name)) {
                alert("Name can only contain letters and spaces.");
                return false;
            }

            const phnoRegex = /^[6-9]\d{9}$/;
            if (!phnoRegex.test(phno)) {
                alert("Please enter a valid 10-digit phone number.");
                return false;
            }

            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            if (userType === "") {
                alert("Please select a user type.");
                return false;
            }

            return true;
        }

        function toggleCspFields() {
            const userType = document.forms["signupForm"]["typ"].value;
            const cspFields = document.getElementById("cspFields");
            if (userType === "CSP") {
                cspFields.style.display = "block"; // Show CSP fields
            } else {
                cspFields.style.display = "none"; // Hide CSP fields
            }
        }
    </script>
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
            <form name="signupForm" action="signup.php" method="post" onsubmit="return validateForm()">
                <div>
                    <input type="text" name="Name" placeholder="Name" required>
                    <hr>
                    <input type="text" name="phno" placeholder="Phone no" required>
                    <hr>
                    <input type="email" name="mail" placeholder="Email" required>
                    <hr>
                    <select name="typ" class="typ" required onchange="toggleCspFields()">
                        <option value="" disabled selected>Select User Type</option>
                        <option value="User">User</option>
                        <option value="CSP">Catering service provider</option>
                    </select>
                    <div id="cspFields" class="csp-fields">
                        <input type="text" name="csp_name" placeholder="CSP Name" required>
                        <hr>
                        <input type="text" name="address" placeholder="Address" required>
                        <hr>
                    </div>
                    <input type="password" name="pswd" class="p" placeholder="Password" required>
                    <hr>
                    <input type="password" name="pswd1" placeholder="Confirm password" required>
                    <hr>
                    <br>
                    <input class="btn2" type="submit" name="submit" value="Sign Up">
                    <p>Already have an account? <a href="login.php">Log In</a></p>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>
