# PHP To-Do List

A simple and functional to-do list web application built with PHP, MySQL, and styled with CSS.

## Description

This project is a basic to-do list application that allows users to:

*   Create new tasks.
*   View task details.
*   Delete existing tasks.

It's a great project for learning fundamental web development concepts, including:

*   PHP for server-side logic.
*   MySQL for database interaction.
*   HTML for structuring the user interface.
*   CSS for styling and presentation.

## Features

*   **Create Tasks:** Users can add new tasks to the list.
*   **View Task Details:** Users can view more detailed information about each task.
*   **Delete Tasks:** Users can remove tasks from the list.
*   **Simple and Clean UI:**  Styled with CSS for a user-friendly experience.
*   **Database Persistence:** Tasks are stored in a MySQL database for persistence.

## Technologies Used

*   **PHP:** Server-side scripting language for handling logic and database interaction.
*   **MySQL:** Database management system for storing tasks.
*   **HTML:** Markup language for structuring the web page.
*   **CSS:** Styling language for visual presentation.

## Setup Instructions

1.  **Clone the repository:**

    ```
    git clone [repository URL]
    cd [repository directory]
    ```

2.  **Create a MySQL database:**

    *   Log in to your MySQL server.
    *   Create a new database named `todolist` (or whatever you prefer):

        ```
        CREATE DATABASE todolist;
        USE todolist;
        ```

    *   Create the `tasks` table:

        ```
        CREATE TABLE tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            task_name VARCHAR(255) NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        ```

3.  **Configure the database connection:**

    *   Edit the `config.php` file (or create one if it doesn't exist) with your database credentials:

        ```
        <?php
        $host = "localhost";
        $username = "root";
        $password = ""; // Replace with your MySQL password
        $database = "todolist";

        $link = mysqli_connect($host, $username, $password, $database);

        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        ?>
        ```

4.  **Place files in your web server directory:**

    *   Copy all the files to your web server's document root directory (e.g., `/var/www/html/` for Apache on Linux, or `htdocs` for XAMPP).

5.  **Access the application:**

    *   Open your web browser and navigate to the URL where you placed the files (e.g., `http://localhost/todolist/`).

## File Structure

## Functions

*   **`create.php`:** Handles the creation of new tasks, adding them to the database.
*   **`detail.php`:** Displays the details of a specific task, retrieved from the database.
*   **`delete.php`:**  Handles the deletion of tasks from the database.
*   **`db_connect()` (example):** (This may be in `config.php` or a separate file)  Handles the connection to the MySQL database (though this is usually done directly).

## Styling

The `style.css` file provides the visual styling for the application. You can customize this file to change the look and feel of the to-do list.

## Contributing

Contributions are welcome!  Feel free to fork the repository, make your changes, and submit a pull request.

## License

[Specify the license you are using, e.g., MIT License]

---

**Example License (MIT License):**

Copyright (c) [2025] [UMYT]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
