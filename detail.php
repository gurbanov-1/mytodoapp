<?php
require_once "db_connect.php";
$title = $description = $date = '';
$error = false;

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    db();
    global $link;
    
    $query = "SELECT todoTitle, todoDescription, date FROM todo WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = htmlspecialchars($row['todoTitle']);
        $description = htmlspecialchars($row['todoDescription']); 
        $date = date('M d, Y', strtotime($row['date']));
    } else {
        $error = true;
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Detail - <?php echo $title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Todo Detail</h1>
            <nav>
                <a href="index.php" class="back-btn">Back to List</a>
            </nav>
        </header>
        
        <main>
            <?php if($error): ?>
                <div class="message error">
                    Todo not found
                </div>
            <?php else: ?>
                <div class="detail-container">
                    <h2 class="detail-title"><?php echo $title; ?></h2>
                    <div class="detail-date">Created on <?php echo $date; ?></div>
                    <div class="detail-description">
                        <h3>Description</h3>
                        <p><?php echo nl2br($description); ?></p>
                    </div>
                    <div class="detail-actions">
                        <button type="button" class="delete-btn" onclick="confirmDelete(<?php echo $id?>)">Delete Todo</button>
                    </div>
                </div>
            <?php endif; ?>
        </main>
    </div>
    
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this todo?')) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</body>
</html>