<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    error_reporting(0);
    
    // Check if 'id' parameter exists in the URL
    if (isset($_GET['id'])) {
        $cspid = $_GET['id'];
        $_SESSION["cspid"] = $cspid; // Set it in the session
    }
    
    // Use the cspid from the session for further database queries
    if (isset($_SESSION['cspid'])) {
        $csp_id = $_SESSION['cspid']; // Now you can use $csp_id
        // Database connection
        $dbcon = mysqli_connect("localhost", "root", "", "caterease");
        $sql3 = "SELECT * FROM csp_table WHERE userid = '$csp_id'";
        $data3 = mysqli_query($dbcon, $sql3);
        
        // Further processing...
    } else {
        header("Location: login.php"); // Redirect to login if cspid is not set
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="adm">
        <div class="sidebar">
            <div class="logo">
            </div>
            <ul class="menu">
            <li>
                <a href="viewbooking.html">
                    <img src="images/booking.png" alt="">
                    <span>View Bookings</span>
                </a>
            </li>
            <li>
                <a href="uploadmenu.php">
                    <img src="images/food-service.png" alt="">
                    <span>Upload Menu</span>
                </a>
            </li>
            <li>
                <a href="manageprofile.php">
                    <img src="images/user.png" alt="">
                    <span>Manage Profile</span>
                </a>
            </li>
            <li>
                <a href="feedback.html">
                    <img src="images/feedback.png" alt="">
                    <span>Add Feedback</span>
            </li>
                <li class="logout">
                    <a href="">
                        <img src="images/logout.png" alt="">
                        <span>logout</span>
                    </a>
                </li>
            </ul>
        </div>
    <div class="maincontent">
        <div class="wrapper">
            <div class="title">
                <h1>CSP Dashboard</h1>
            </div>
            <div class="info">
                <!-- <div class="searchbox">
                    <img src="images/search-interface-symbol.png" alt="">
                    <input type="text" placeholder="Search" />
                </div> -->
                <img src="images/guest-user-250x250.jpg" alt="">
            </div>
        </div>
        <div class="vuser">
            <div class="head">
                <h1>Bookings</h1>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Booked CSP</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                <tr class="hover">
                    <td>1</td>
                    <td>Shamsu</td>
                    <td>Rahmania</td>
                    <td>01/03/2025</td>
                    <td>Sample venue</td>
                    <td>50000</td>
                    <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                </tr>
                <tr class="hover">
                    <td>2</td>
                    <td>Althaf</td>
                    <td>B 4 Biriyani</td>
                    <td>10/10/2024</td>
                    <td>Sample venue</td>
                    <td>20000</td>
                    <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
                    <tr class="hover">
                        <td>2</td>
                        <td>Althaf</td>
                        <td>B 4 Biriyani</td>
                        <td>10/10/2024</td>
                        <td>Sample venue</td>
                        <td>20000</td>
                        <td><p class="con">Confirmed</p> <p class="pend">Pending</p> <p class="rej">Rejected</p></td>
                    </tr>
            </table>
        </div>
    </div>
</body>
</html>