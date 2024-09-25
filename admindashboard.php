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
                <li class="active">
                    <a href="">
                        <img src="images/user.png" alt="">
                        <span>Manage User</span>
                    </a>
                </li>
                <li>
                    <a href="managecsp.php">
                        <img src="images/food-service.png" alt="">
                        <span>Manage CSP</span>
                    </a>
                </li>
                <li>
                    <a href="viewbooking.php">
                        <img src="images/booking.png" alt="">
                        <span>View Bookings</span>
                    </a>
                </li>
                <li>
                    <a href="viewfeedback.html">
                        <img src="images/feedback.png" alt="">
                        <span>View Feedback</span>
                    </a>
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
                    <h1>Admin Dashboard</h1>
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
                    <h1>Users</h1>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone no</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
$dbcon = mysqli_connect("localhost", "root", "", "caterease");
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `user` WHERE `usertype` = 'User'";
$data = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($data) > 0) {  // Corrected this line
    while ($row = mysqli_fetch_assoc($data)) {
        $id = $row["user_id"];
        echo "<tr class='hover'>";
        echo "<td>" . htmlspecialchars($row['userid']) . "</td>"; // Sanitize output
        echo "<td>" . htmlspecialchars($row['name']) . "</td>"; // Sanitize output
        echo "<td>" . htmlspecialchars($row['phno']) . "</td>"; // Sanitize output
        echo "<td>" . htmlspecialchars($row['email']) . "</td>"; // Sanitize output
        echo "<td>";
        
        if ($row['status'] == "active") {
            // User is active, show block option
            echo "<form method='post'><button name='blockuser' value='{$id}' type='submit' class='action'>Block</button></form>";
        } else {
            // User is blocked, show unblock option
            echo "<form method='post'><button name='unblockuser' value='{$id}' type='submit' class='action'>UnBlock</button></form>";
        }

        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No users found.</td></tr>"; // Provide feedback if no users
}

mysqli_close($dbcon); // Close the database connection
?>

                </table>
            </div>
        </div>
    </body>
    </html>