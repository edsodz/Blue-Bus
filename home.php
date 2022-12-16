<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>blueBus - A Heaven For Travellers!</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <h1>Hello, <?php echo $_SESSION['username'];?></h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>