<?php
// Include the database connection file
require_once 'includes/connect.php';

// Check if $connect is available
if (!isset($connect) || !$connect) {
    die("Error: Database connection failed. Please check includes/connect.php.");
}

// Check if form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $msg = trim($_POST['message'] ?? '');

    $errors = [];

    // Validation
    if (empty($name)) {
        $errors['name'] = 'Name can\'t be empty';
    }

    if (empty($msg)) {
        $errors['message'] = 'Message field can\'t be empty';
    }

    if (empty($email)) {
        $errors['email'] = 'You must provide an email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'You must provide a valid email';
    }

    // Process if no errors
    if (empty($errors)) {
        // Prepare SQL statement to prevent SQL injection
        $query = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query);

        if ($stmt) {
            // Bind parameters and execute
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $msg);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                // Send email notification
                $to = 'polchai.napas@gmail.com';
                $subject = 'New Message from Your Portfolio Site!';
                $message = "You have received a new contact form submission:\n\n";
                $message .= "Name: " . $name . "\n";
                $message .= "Email: " . $email . "\n";
                $message .= "Message: " . $msg . "\n";

                $headers = "From: no-reply@yourportfolio.com\r\n";
                $headers .= "Reply-To: " . $email . "\r\n";

                // Send the email
                if (mail($to, $subject, $message, $headers)) {
                    // Redirect to index.php on success
                    header('Location: index.php');
                    exit();
                } else {
                    echo "Failed to send email.";
                }
            } else {
                echo "Database insertion failed: " . mysqli_error($connect);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Query preparation failed: " . mysqli_error($connect);
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
} else {
    echo "Invalid request method. Please submit the form.";
}

// Close the database connection
mysqli_close($connect);
?>