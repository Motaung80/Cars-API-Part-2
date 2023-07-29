<?php

    include 'config.php';
    //session_start();

    $name = "";
    $surname = "";
    $email = "";
    $id = 0;
    $errors = array();
    $_SESSION['success'] = "";

    if (isset($_POST['reg_user'])) {

        $name = mysqli_real_escape_string($db, $_POST['name']);
        $surname = mysqli_real_escape_string($db, $_POST['surname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        if (empty($name)) {
            array_push($errors, "Username is required");
        }
        if (empty($surname)) {
            array_push($errors, "Usersurname is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1) || strlen($password_1) < 8) {
            array_push($errors, "Password is required and must be at least 8 characters long");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        // Validate email using PHP's built-in filter_var function
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        }

        // Check if the user already exists in the database
        $email_check_query = "SELECT * FROM user_info WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $email_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            array_push($errors, "Email already exists");
        }

        if (count($errors) == 0) {

            //$salt = bin2hex(random_bytes(16)); // Generate a random salt
            //$hashed_password = hash('sha256', $password_1 . $salt); // Concatenate the salt to the password, then hash the result
            $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);

            // Generate a random string of 10 characters
            $random_string = bin2hex(random_bytes(5));

            // Concatenate the email address and the random string
            $unique_string = $email . $random_string;

            // Hash the unique string using SHA-256
            $api_key = hash('sha256', $unique_string);

            $query = "INSERT INTO user_info (name, surname, email, password, apikey)
                    VALUES('$name', '$surname', '$email', '$hashed_password', '$api_key')";

            mysqli_query($db, $query);

            $_SESSION['username'] = $email; // Set the username to the email address
            $_SESSION['apikey'] = $api_key; // Set the apikey

            $_SESSION['success'] = "You have registered successfully";

            header('location: index.php');
            exit();
        }
        /*if (count($errors) == 0) {

            //$salt = bin2hex(random_bytes(16)); // Generate a random salt
            //$hashed_password = hash('sha256', $password_1 . $salt); // Concatenate the salt to the password, then hash the result
            $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);
        
            // Generate a random string of 10 characters
            $random_string = bin2hex(random_bytes(5));
        
            // Concatenate the email address and the random string
            $unique_string = $email . $random_string;
        
            // Hash the unique string using SHA-256
            $apikey = hash('sha256', $unique_string);
        
            $query = "INSERT INTO user_info (name, surname, email, password, apikey)
                    VALUES('$name', '$surname', '$email', '$hashed_password', '$apikey')";
        
            mysqli_query($db, $query);
        
            $_SESSION['username'] = $email; // Set the username to the email address
            $_SESSION['apikey'] = $apikey; // Set the apikey
        
            $_SESSION['success'] = "You have registered successfully";
        
            header('location: index.php');
            exit();
        }*/
        
    }
    // Notify client side of any errors using JavaScript alert
    if (count($errors) > 0) {
        $message = "Error(s):\n";
        foreach ($errors as $error) {
            $message .= "- " . $error . "\n";
        }
        echo "<script>alert('$message');</script>";
    }

    mysqli_close($db);
?>