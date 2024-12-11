<?php session_start();
include 'database.php';
include 'user.php';

// Validate that the required POST fields are set and not empty
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Debugging: Print POST data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (!empty($_POST['matric']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['accessLevel'])) {
        // Sanitize user input
        $matric = htmlspecialchars($_POST['matric']);
        $name = htmlspecialchars($_POST['name']);
        $password = htmlspecialchars($_POST['password']);
        $accessLevel = htmlspecialchars($_POST['accessLevel']);

        try {
            // Create an instance of the Database class and get the connection
            $database = new Database();
            $db = $database->getConnection();

            // Create an instance of the User class
            $user = new User($db);

            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Register the user
            if ($user->createUser($matric, $name, $hashedPassword, $accessLevel)) {
                echo "User successfully registered.";
            } else {
                echo "Error: Unable to register user.";
            }

            // Close the database connection
            $db->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: All fields (Matric, Name, Password, and Access Level) are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
