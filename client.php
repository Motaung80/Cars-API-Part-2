<?php
    // Set API endpoint URL
    $url = "http://localhost/PA3/api.php";

    // Set API key
    $apikey = "31eb643ac03bc631b32d916ee46792222a902a63cdb459e4ff7ed7e5d63cde84";

    // Initialize cURL
    $ch = curl_init();

    // Set request headers
    $headers = array(
        'Content-Type: application/json',
        'apikey: ' . $apikey
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if(curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Print response
    echo $response;
?>
