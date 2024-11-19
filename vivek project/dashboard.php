<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM progress WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>
<h2>Welcome to your Dashboard</h2>
<ul>
    <?php while($row = $result->fetch_assoc()): ?>
        <li>Lesson <?php echo $row['lesson_id']; ?> - Progress: <?php echo $row['completion_percentage']; ?>%</li>
    <?php endwhile; ?>
</ul>
