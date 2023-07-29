<?php
    /*include_once 'config.php';

    session_start();

    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $engine = mysqli_real_escape_string($db, $_POST['engine']);
    $body = mysqli_real_escape_string($db, $_POST['body']);
    $wheel = mysqli_real_escape_string($db, $_POST['wheel']);
    $transmission = mysqli_real_escape_string($db, $_POST['transmission']);

    // update the user's preferences in the database
    $stmt = $db->prepare('UPDATE user_info SET engine = ?, body = ?, wheel = ?, transmission = ? WHERE id = ?');
    $stmt->bind_param('ssssi', $engine, $body, $wheel, $transmission, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // return a success response
        echo json_encode(array('success' => true));
    } else {
        // return an error response
        http_response_code(500);
        echo json_encode(array('success' => false));
    }*/
    include_once 'config.php';

    session_start();

    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $engine = mysqli_real_escape_string($db, $_POST['engine']);
    $body = mysqli_real_escape_string($db, $_POST['body']);
    $wheel = mysqli_real_escape_string($db, $_POST['wheel']);
    $transmission = mysqli_real_escape_string($db, $_POST['transmission']);

    // update the user's preferences in the database
    $stmt = $db->prepare('UPDATE user_info SET engine = ?, body = ?, wheel = ?, transmission = ? WHERE id = ?');
    $stmt->bind_param('ssssi', $engine, $body, $wheel, $transmission, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // retrieve the user's preferences from the database
        $stmt = $db->prepare('SELECT engine, body, wheel, transmission FROM user_info WHERE id = ?');
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $preferences = $result->fetch_assoc();

        // return a success response with the user's preferences
        echo json_encode(array('success' => true, 'preferences' => $preferences));
    } else {
        // return an error response
        http_response_code(500);
        echo json_encode(array('success' => false));
    }

?>
