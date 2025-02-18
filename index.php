<?php
require_once("db_connect.php");
db();
global $link;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>TODO LIST</h1>
            <nav>
                <a href="create.php" class="add-todo-btn">Add New Todo</a>
            </nav>
        </header>
        <main>
            <?php
            $query = "SELECT id, todoTitle, todoDescription, date FROM todo ORDER BY date DESC";
            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result) >= 1){
                echo '<div class="todo-list">';
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $title = htmlspecialchars($row['todoTitle']);
                    $date = date('M d, Y', strtotime($row['date']));
                    ?>
                    <div class="todo-item">
                        <div class="todo-content">
                            <a href="detail.php?id=<?php echo $id?>" class="todo-title"><?php echo $title ?></a>
                            <span class="todo-date"><?php echo $date; ?></span>
                        </div>
                        <div class="todo-actions">
                            <button type="button" class="delete-btn" onclick="confirmDelete(<?php echo $id?>)">Delete</button>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
            } else {
                echo '<p class="no-todos">No todos found. Create your first todo!</p>';
            }
            ?>
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
