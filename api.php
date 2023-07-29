<?php

  // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(array('message' => 'Method Not Allowed'));
        exit;
    }

    include_once 'config.php';
    include_once 'post.php';

    // Read request body
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body);

    // Check if API key is provided in the request
    if (!isset($data->apikey)) {
        http_response_code(400);
        echo json_encode(array('message' => 'API key not provided'));
        exit;
    }

    // Get API key from request
    $apikey = $data->apikey;

    // Query to check if API key is valid
    $query = "SELECT * FROM user_info WHERE apikey = '$apikey'";

    // Execute query
    $result = mysqli_query($db, $query);

    // Check if API key is valid
    if (mysqli_num_rows($result) == 0) {
        http_response_code(401);
        echo json_encode(array('message' => 'Invalid API key'));
        exit;
    }
    
    $post = Post::getInstance($db);

    // Get requested fields from the request body
    $return_fields = isset($data->return) ? $data->return : '*';

    // Search criteria
    $search = isset($data->search) ? (array)$data->search : array();

    // Blog post query with search criteria 
    $result = $post->read($search, $return_fields);


    // Get row count
    $num = mysqli_num_rows($result);

    // Check if any posts
    if ($num > 0) {
        // Post array
        $posts_arr = array();
        $posts_arr['status'] = array(
            'code' => 200,
            'message' => 'Success',
            'timestamp' => date('Y-m-d H:i:s')
        );
        $posts_arr['data'] = array();

        while ($row = mysqli_fetch_assoc($result)) {
            extract($row);

            // Concatenate brand and model to form image URL
            $image_url = 'https://wheatley.cs.up.ac.za/api/getimage?brand=' . urlencode($make) . '&model=' . urlencode($model);

            $post_item = array(
                'id_trim' => $id_trim,
                'make' => $make,
                'model' => $model,
                'max_speed_km_per_h' => $max_speed_km_per_h,
                'body_type' => $body_type,
                'engine_type' => $engine_type,
                'transmission' => $transmission,
                'drive_wheels' => $drive_wheels,
                'number_of_cylinders' => $number_of_cylinders,
                'year_from' => $year_from,
                'image' => $image_url
            );

            // Add image URL to post item
            if ($return_fields == '*' || in_array('image', $return_fields)) {
                $post_item['image_url'] = $image_url;
            }

            // Filter out unwanted fields
            if ($return_fields != '*') {
                $post_item = array_intersect_key($post_item, array_flip($return_fields));
            }

            // Push to "data"
            array_push($posts_arr['data'], $post_item);
        }

        // Turn to JSON & output
        echo json_encode($posts_arr);
        } else {
            // No Posts
            echo json_encode(array('status' => array(
                'code' => 404,
                'message' => 'No Posts Found',
                'timestamp' => date('Y-m-d H:i:s')
            )));
        }
?>

