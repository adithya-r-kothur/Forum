<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $user_id = $_SESSION['user_id'];

        $query = "INSERT INTO threads (title, content, user_id) VALUES ('$title', '$content', '$user_id')";

        if (mysqli_query($conn, $query)) {
            echo "Thread created successfully. <a href='index.php' class='btn'>Back to Forum</a>";
        } else {
            echo "Thread creation failed. Please try again.";
        }
    } else {
        echo "You must be logged in to create a thread. <a href='login.php' class='btn'>Login</a>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Thread</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Create a Thread</h1>
        <?php
        if (isset($_SESSION['user_id'])) {
            ?>
            <form method="post">
                <div class="form-group">
                    <label for="title">Thread Title:</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Thread Content:</label>
                    <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Create Thread</button>
            </form>
            <?php
        } else {
            echo "You must be logged in to create a thread. <a href='login.php' class='btn'>Login</a>";
        }
        ?>
    </div>
</body>
</html>
