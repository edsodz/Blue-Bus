<html>
    <body>
        <?php
        $name = $_GET["name"];
        $email = $_GET["email"];
        $username = $_GET["username"];
        $password = $_GET["password"];
        if(empty($name) || empty($email) || empty($username) || empty([$password]))
        {
            echo "please enter all the fields in the form";

        }
    else{
    $conn = mysqli_connect("localhost", "root", "", "user_db");
    if(mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }
    $sql = "INSERT INTO users(name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
    if($conn -> query($sql) === TRUE) {
        echo "New record created successfully. Please login yourself to continue!! m";
        // header("Location : searchBus.php");
        // exit();
    } else {
        echo "Error: ".$sql. "<br>". $conn ->error;
    }
    }
       
        ?>
    </body>
</html>