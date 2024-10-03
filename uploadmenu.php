<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Menu</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .title {
            margin-bottom: 20px;
        }

        .upload-menu-form {
            max-width: 500px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #5cb85c;
            outline: none;
        }

        button {
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .vuser h1 {
            color: #008080;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="adm">
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="cspdashboard.php">
                    <img src="images/booking.png" alt="">
                    <span>View Bookings</span>
                </a>
            </li>
            <li>
                <a href="uploadmenu.php" class="active">
                    <img src="images/food-service.png" alt="">
                    <span>Upload Menu</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/user.png" alt="">
                    <span>Manage Profile</span>
                </a>
            </li>
            <li>
                <a href="feedback.html">
                    <img src="images/feedback.png" alt="">
                    <span>Add Feedback</span>
                </a>
            </li>
            <li class="logout">
                <a href="">
                    <img src="images/logout.png" alt="">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="maincontent">
        <div class="wrapper">
            <div class="title">
                <h1>CSP Dashboard</h1>
            </div>
        </div>
        <section class="vuser">
      <h2>Add New Menu</h2>
      <form action="" method="post" enctype="multipart/form-data" class="menu-form">
        <label for="Menu-name">Menu Name:</label>
        <input type="text" id="property-name" name="property_name" required>
        <label for="description">description:</label>
        <textarea name="description" id="description"></textarea>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>
        <input type="file" id="menu-image" name="menu_image" accept="image/*">
        <button type="submit" name="submit">Upload Menu</button>
      </form>
    </section>
    </div>
    <?php
session_start();
$dbconnect = mysqli_connect("localhost", "root", "", "caterease");
if (isset($_SESSION['cspid'])) {
  $csp_id = $_SESSION['cspid']; // Assuming 'user' is where you store user_id in session
} 
else {
  header("Location: uploadmenu.php");
  exit();
}

if (isset($_POST['submit'])) {
  $menu_name = $_POST['menu_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $property_image = $_FILES['property_image']['name'];

  // Check if the property number already exists
//   $check_property_query = "SELECT * FROM `property` WHERE `property_number` = '$property_number'";
//   $result = mysqli_query($dbconnect, $check_property_query);

//   if (mysqli_num_rows($result) > 0) {
//     echo "<script>alert('A property with this number already exists! Please use a unique property number.');</script>";
//   } else {
//     // Upload the image to the server
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["menu_image"]["name"]);

    // if (move_uploaded_file($_FILES["menu_image"]["tmp_name"], $target_file)) {
      // Insert the property into the database
      $insert_query = "INSERT INTO `menu` (`csp_id`, `menu_name`, `description`, `price`, `image`) 
                           VALUES ('$csp_id', '$menu_name', '$description', '$price', '$target_file')";

      if (mysqli_query($dbconnect, $insert_query)) {
        echo "<script>alert('Menu listed successfully!');</script>";
      } else {
        echo "<script>alert('Error while listing the Menu.');</script>";
      }
    } 
    // else {
    //   echo "<script>alert('Failed to upload the image.');</script>";
    // }
// }
?>
</body>
</html>
