<?php
// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to user
ini_set('log_errors', 1);

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Collect and sanitize form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $profession = trim($_POST['profession']);

    // Validate required fields
    if (empty($name)) {
        $response['errors'][] = 'Name is required';
    }
    
    if (empty($email)) {
        $response['errors'][] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors'][] = 'Please enter a valid email address';
    }
    
    if (empty($profession)) {
        $response['errors'][] = 'Profession is required';
    }

    // If no errors, save to CSV
    if (empty($response['errors'])) {
        // Define the CSV file path
        $csvFile = '../waitlist.csv';
        
        // Check if directory exists and is writable
        $directory = dirname($csvFile);
        if (!is_dir($directory)) {
            $response['errors'][] = 'Directory does not exist';
        } elseif (!is_writable($directory)) {
            $response['errors'][] = 'Directory is not writable';
        } else {
            try {
                // Check if file exists and is empty
                $fileExists = file_exists($csvFile);
                $isEmpty = !$fileExists || filesize($csvFile) == 0;

                // Open CSV file for appending
                $file = fopen($csvFile, 'a');
                
                if ($file === false) {
                    $response['errors'][] = 'Could not open CSV file for writing';
                } else {
                    // Add header row if file is new or empty
                    if ($isEmpty) {
                        fputcsv($file, ['Name', 'Email', 'Profession', 'Timestamp']);
                    }

                    // Prepare data array
                    $data = [
                        $name,
                        $email,
                        $profession,
                        date('Y-m-d H:i:s')
                    ];

                    // Write data to CSV
                    if (fputcsv($file, $data) === false) {
                        $response['errors'][] = 'Failed to write data to CSV';
                    } else {
                        $response['success'] = true;
                        $response['message'] = 'Data saved successfully!';
                    }
                    
                    fclose($file);
                }
            } catch (Exception $e) {
                $response['errors'][] = 'Error: ' . $e->getMessage();
            }
        }
    }
} else {
    $response['errors'][] = 'Invalid request';
}

// Output JSON response
echo json_encode($response);
?>
