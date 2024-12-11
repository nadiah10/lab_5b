<?php session_start();
include 'Database.php';
include 'User.php';

// Check if the "matric" parameter exists in the GET request
if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];

    // Create a database connection
    $database = new Database();
    $db = $database->getConnection();

    // Fetch user details
    $user = new User($db);
    $userDetails = $user->getUser($matric);

    // Close the database connection
    $db->close();

    if ($userDetails) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update User</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    margin-top: 50px;
                }

                form {
                    display: inline-block;
                    text-align: left;
                    border: 1px solid #ccc;
                    padding: 20px;
                    border-radius: 5px;
                    background-color: #f9f9f9;
                }

                input[type="text"], select {
                    width: 90%;
                    padding: 10px;
                    margin: 10px 0;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                input[type="submit"] {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    padding: 10px;
                    width: 100%;
                    border-radius: 5px;
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #45a049;
                }

                .cancel-link {
                    text-align: center;
                    margin-top: 10px;
                }

                .cancel-link a {
                    color: blue;
                    text-decoration: none;
                }

                .cancel-link a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>

        <body>
            <h2>Update User</h2>
            <form action="update.php" method="post">
                <label for="matric">Matric:</label>
                <input type="text" id="matric" name="matric" value="<?php echo htmlspecialchars($userDetails['matric']); ?>" readonly>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['name']); ?>" required>
                <label for="role">Access Level:</label>
                <select name="role" id="role" required>
                    <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
                    <option value="student" <?php if ($userDetails['role'] == 'student') echo "selected"; ?>>Student</option>
                </select>
                <input type="submit" value="Update">
                <div class="cancel-link">
                    <a href="read.php">Cancel</a>
                </div>
            </form>
        </body>

        </html>
        <?php
    } else {
        echo "Error: User not found.";
    }
} else {
    echo "Error: No matric value provided in the request.";
}
?>
