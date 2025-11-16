<?php
// Initialize error array
$error = [];

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Collect and sanitize form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $profession = trim($_POST['profession']);

    // Validate required fields
    if (empty($name)) {
        $error[] = 'Name is required';
    }
    
    if (empty($email)) {
        $error[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address';
    }
    
    if (empty($profession)) {
        $error[] = 'Profession is required';
    }

    // If no errors, save to CSV
    if (empty($error)) {
        // Prepare data array
        $data = [
            'name' => $name,
            'email' => $email,
            'profession' => $profession,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        // Open CSV file for appending
        $file = fopen('../waitlist.csv', 'a');

        // Add header row if file is empty
        if (filesize('../waitlist.csv') == 0) {
            fputcsv($file, ['Name', 'Email', 'Profession', 'Timestamp']);
        }

        // Write data to CSV
        fputcsv($file, $data);
        fclose($file);

        // Success message
        $success = "Data saved successfully!";
        // Clear form fields
        $name = $email = $profession = '';
    }
}
?>
