<?php
session_start();
include "databaseConnection.php";

if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['password']);

if(empty($uname)) {
    header ("Location: index.php?erro=User name is required");
    exit();
} else if(empty($pass)) {
    header("Location: index.php?erro=Password is required");
    //exit();
}

$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['username'] == $uname && $row['password'] == $pass) {
        echo "Logged In!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
       // $_SESSION['id'] = $row['id'];
        header("Location: index.html");
        exit();
    } else {
        header("Location: index.php?error=Incorrect username or password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}