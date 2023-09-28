<?php

session_start();

$users = [
    [
        'id' => 1,
        'name' => 'John',
        'lastname' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'password123'
    ],
    [
        'id' => 2,
        'name' => 'Jane',
        'lastname' => 'Smith',
        'email' => 'jane@example.com',
        'password' => 'securepassword'
    ]
];

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];


$error_fields = [];

if ($name === '') {
    $error_fields[] = 'name';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if ($lastname === '') {
    $error_fields[] = 'lastname';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'email';
}

if ($password_confirm === '') {
    $error_fields[] = 'password_confirm';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "check fields",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

$found = false;
foreach ($users as $user) {
    if ($user['email'] === $email) {
        $found = true; // Set the flag to true if the email is found
        break; // Exit the loop since we found the email
    }
}


if ($found) {
    $logMessage = "A user with this email: $email address already exists". PHP_EOL;
    file_put_contents('register_log.txt', $logMessage, FILE_APPEND);
    $response = [
        "status" => false,
        "message" => $logMessage,
    ];
    echo json_encode($response);
    die();
}

if ($password === $password_confirm) {
    $password = md5($password);
    $id = count($users) + 1;
    $users[] = [
        'id' => $id,
        'name' => $name,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password
    ];

    $_SESSION['users'] = $users;

    $logMessage = "registration was successful with email: $email".PHP_EOL;
    file_put_contents('register_log.txt', $logMessage, FILE_APPEND);
    $response = [
        "status" => true,
        "message" => $logMessage,
    ];
    echo json_encode($response);

} else {
    $logMessage = "Passwords do not match. Please check and try again.". PHP_EOL;
    file_put_contents('register_log.txt', $logMessage, FILE_APPEND);
    $response = [
        "status" => false,
        "message" => $logMessage,
    ];
    echo json_encode($response);
}
