<?php
// Increase the maximum execution time to 300 seconds (5 minutes)
set_time_limit(300);

// Function to URL-encode file names
function encodeFileName($fileName) {
    return str_replace('%2F', '/', rawurlencode($fileName));
}

// Get the video ID from the query string
$video_id = isset($_GET['v_id']) ? htmlspecialchars($_GET['v_id']) : '';

if ($video_id) {
    // Construct the API URL to fetch file details
    $api_url = "https://archive.org/metadata/" . $video_id;

    // Initialize a cURL session to fetch metadata
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Parse the JSON response
    $metadata = json_decode($response, true);

    if ($metadata && isset($metadata['files']) && !empty($metadata['files'])) {
        // Find the first .mp4 video file
        $file_name = '';
        foreach ($metadata['files'] as $file) {
            $file_name = $file['name'];
            $extension = substr($file_name, -4);
            if ($extension === ".mp4") {
                break;
            }
        }

        if ($file_name) {
            // Construct the video URL
            $encoded_file_name = encodeFileName($file_name);
            $video_url = "https://archive.org/download/" . $video_id . "/" . $encoded_file_name;

            // Use readfile to stream the video content directly
            header('Content-Type: video/mp4');
            header('Content-Disposition: inline; filename="' . basename($encoded_file_name) . '"');
            header('Accept-Ranges: bytes');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');

            // Open the file handle for streaming
            $handle = fopen($video_url, 'rb');
            if ($handle) {
                while (!feof($handle)) {
                    echo fread($handle, 8192);
                    flush();
                }
                fclose($handle);
            } else {
                header("HTTP/1.1 404 Not Found");
                echo "Video not found.";
            }
        } else {
            header("HTTP/1.1 404 Not Found");
            echo "No video file found.";
        }
    } else {
        header("HTTP/1.1 404 Not Found");
        echo "No metadata found for identifier.";
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "No video ID provided.";
}
?>
