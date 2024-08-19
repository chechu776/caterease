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
                    <a href="viewbooking.html">
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
                    <a href="adduser.html" class="button">Add Users</a>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone no</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <tr class="hover">
                        <td>12</td>
                        <td>sfgsd</td>
                        <td>21425351</td>
                        <td>svasd@gmail.com</td>
                        <td><a href=""><div class="action"><img src="images/block-user.png" alt="">Block<img src="images/unlock.png" alt="">Unblock</div></a></td>
                    </tr>
                    <?php
                        $dbcon=mysqli_connect("localhost","root","","caterease");
                        if (!$dbcon) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql="SELECT * FROM user";
                        $data=mysqli_query($dbcon,$sql);
                        if($data)
                        {
                            $rowcount=mysqli_num_rows($data);
                            while($rowcount>0)
                            {
                                $row=mysqli_fetch_array($data);
                                echo"<tr>";
                                echo"<td>".$row['userid']."</td>";
                                echo"<td>".$row['name']."</td>";
                                echo"<td>".$row['phno']."</td>";
                                echo"<td>".$row['email']."</td>";
                                $rowcount--;
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
    </html>