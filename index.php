<?php
session_start();
require_once('db.php');

// Fetch and display threads
$query = "SELECT * FROM threads";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Forum Threads</h1>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='thread'>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p>" . $row['content'] . "</p>";
                echo "<p>Created by: User #" . $row['user_id'] . "</p>";
                echo "</div>";
            }
        }

        if (isset($_SESSION['user_id'])) {
            echo "<a href='create_thread.php' class='btn'>Create a Thread</a>";
            echo "<a href='logout.php' class='btn'>Logout</a>";
        } else {
            echo "<a href='login.php' class='btn'>Login</a>";
            echo "<a href='register.php' class='btn'>Register</a>";
        }
        ?>
    </div>
</body>
</html>
<?php
mysqli_close($conn);
?>
