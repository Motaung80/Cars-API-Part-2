<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include_once 'config.php';
    session_start();

    $errors = array();
    $email = "";
    $_SESSION['success'] = "";

    // User login
    if (isset($_POST['login_user'])) {
        // Data sanitization to prevent SQL injection
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // Error message if the input field is left blank
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        // Checking for the errors
        if (count($errors) == 0) {
            /*Back Me Up*/
            // Password matching
            $stmt = mysqli_prepare($db, "SELECT * FROM user_info WHERE email = ?");
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);

            // $results = 1 means that one user with the email exists
            if (mysqli_num_rows($results) == 1) {
                $row = mysqli_fetch_assoc($results);
                if (password_verify($password, $row['password'])) {
                    // Set session variables
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['apikey'] = $row['apikey'];
                    $_SESSION['theme'] = $row['theme'];

                    // Get the user's preferences from the database
                    $stmt = $db->prepare('SELECT engine, body, wheel, transmission FROM user_info WHERE id = ?');
                    $stmt->bind_param('i', $_SESSION['user_id']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    // Set session variables for preferences
                    $_SESSION['engine'] = $row['engine'];
                    $_SESSION['body'] = $row['body'];
                    $_SESSION['wheel'] = $row['wheel'];
                    $_SESSION['transmission'] = $row['transmission'];

                    // Redirect to the home page
                    header('location: index.php');
                }
                else {
                    array_push($errors, "Wrong email or password combination");
                }
            } else {
                array_push($errors, "Wrong email or password combination");
            }
        }
    }
?>
