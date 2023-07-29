<?php
    include_once 'config.php';

    session_start();
    
    if (!isset($_SESSION['user_id'])) {
        http_response_code(401);
        exit();
    }
    $user_id = $_SESSION['user_id'];
    $theme = mysqli_real_escape_string($db, $_POST['theme']);

    // update the user's theme preference in the database
    $stmt = $db->prepare('UPDATE user_info SET theme = ? WHERE id = ?');
    $stmt->bind_param('si', $theme, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // return a success response
        echo json_encode(array('success' => true));
    } else {
        // return an error response
        http_response_code(500);
        echo json_encode(array('success' => false));
    }
?>
