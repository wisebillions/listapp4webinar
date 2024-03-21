<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Listing App</title>
</head>
<body>
    <h1>Task Listing App</h1>

    <form action="index.php" method="POST">
        <input type="text" name="task" placeholder="Enter task">
        <button type="submit" name="submit">Add Task</button>
    </form>

    <?php
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Get the task from the form
        $task = $_POST['task'];

        // Validate the task (optional)
        if (!empty($task)) {
            // Open or create tasks.txt file
            $file = fopen('tasks.txt', 'a');

            // Append the task to the file
            fwrite($file, $task . PHP_EOL);

            // Close the file
            fclose($file);

            // Display success message
            echo '<p>Task added successfully!</p>';
        } else {
            // Display error message if task is empty
            echo '<p>Please enter a task!</p>';
        }
    }

    // Display existing tasks
    if (file_exists('tasks.txt')) {
        // Open tasks.txt file
        $file = fopen('tasks.txt', 'r');

        // Display tasks line by line
        echo '<h2>Tasks</h2>';
        echo '<ul>';
        while (!feof($file)) {
            $task = fgets($file);
            if (!empty($task)) {
                echo "<li>$task</li>";
            }
        }
        echo '</ul>';

        // Close the file
        fclose($file);
    } else {
        // Display message if no tasks found
        echo '<p>No tasks found.</p>';
    }
    ?>
</body>
</html>
