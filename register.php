<html>
    <body>
        <?php
        $name = $_GET["name"];
        $email = $_GET["email"];
        $username = $_GET["username"];
        $password = $_GET["password"];

        $conn = mysqli_connect("localhost", "root", "", "user_db");
        if(mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }
        $sql = "INSERT INTO users(name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
        if($conn -> query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: ".$sql. "<br>". $conn ->error;
        }
        ?>
    </body>
</html>