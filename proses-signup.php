<?php

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO tb_login (email, username, password_hash) 
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sss",
    $_POST["email"],
    $_POST["username"],
    $password_hash
);

if ($stmt->execute()) {
    header("Location: login-regist.php");
    exit;
} else {
    if ($mysqli->error === 1062) {
        die("email sudah terdaftar");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
