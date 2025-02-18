<?php
/**
 * Todo creation page
 */

require_once 'db_connect.php';//bring the database connection file in
$message = '';
$messageType = '';

if(isset($_POST['submit'])) {
    $title = trim($_POST['todoTitle']);
    $description = trim($_POST['todoDescription']);
    
    $error = false;
    
    // Validate inputs
    if(empty($title)){
        $error = true;
        $message = "Title cannot be empty";
        $messageType = 'error';
    } elseif(empty($description)){
        $error = true;
        $message = "Description cannot be empty";
        $messageType = 'error';
    }
    
    if(!$error) {
        db();
        global $link;
        
        // Use prepared statement for security
        $query = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES (?, ?, now())";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "ss", $title, $description);
        
        if(mysqli_stmt_execute($stmt)){
            $message = "Todo added successfully!";
            $messageType = 'success';
            // Clear form data after successful submission
            $title = $description = '';
        } else {
            $message = "Error: " . mysqli_error($link);
            $messageType = 'error';
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Todo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Create New Todo</h1>
            <nav>
                <a href="index.php" class="back-btn">Back to List</a>
            </nav>
        </header>
        
        <main>
            <?php if($message): ?>
                <div class="message <?php echo $messageType; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="create.php" class="create-form">
                <div class="form-group">
                    <label for="todoTitle">Todo Title</label>
                    <input 
                        type="text" 
                        id="todoTitle" 
                        name="todoTitle" 
                        value="<?php echo isset($title) ? htmlspecialchars($title) : ''; ?>"
                        placeholder="Enter todo title"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="todoDescription">Todo Description</label>
                    <textarea 
                        id="todoDescription" 
                        name="todoDescription" 
                        placeholder="Enter todo description"
                        required
                        rows="4"
                    ><?php echo isset($description) ? htmlspecialchars($description) : ''; ?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" name="submit" class="submit-btn">Create Todo</button>
                    <a href="index.php" class="cancel-btn">Cancel</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>

