<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Navigation</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <a href="home.php"><img src="assets/public/logo2.png" alt="Logo"></a>
            <div class="menu">
                <ul>
                    <li><a href="farming.php">Farming</a></li>
                    <li><a href="construction.php">Construction</a></li>
                    <li><a href="healthcare.php">Healthcare</a></li>
                    <li><a href="food.php">Food</a></li>
                </ul>
            </div>
        </div>

        <div class="right-links">
            <?php
            session_start();
            include ("php/config.php");
            if (isset($_SESSION['valid'])) {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_id = $result['Id'];
                }
                echo "<a href='edit.php?Id=$res_id' class='edit-btn'>Edit Profile</a>";
                echo "<a href='php/logout.php' class='logout-btn'>Log Out</a>";
            }
            ?>
        </div>
    </div>
</body>

</html>