<html>
    <body>
        <?php
        $name = $_GET["name"];
        $age = $_GET["age"];
        $email = $_GET["email"];
        $gender = $_GET["gender"];
        $source= $_GET["source"];
        $destination = $_GET["destination"];
        $date = $_GET["dateFrom"];
        $noOfTickets = $_GET["numberOfTicket"];
        $conn = mysqli_connect("localhost", "root", "", "user_db");
        if(isset($_GET['search'])) {
        if(mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }
        $query=mysqli_query($conn,"SELECT * FROM businfo WHERE source='$source' and destination='$destination'");
       
        if(mysqli_num_rows($query) > 0) {
        $sql = "INSERT INTO TicketConfirmed(name,age,email, gender, source,destination,date,numberOfTicket) VALUES ('$name','$age', '$email', '$gender', '$source','$destination','$date','$noOfTickets')";
        }
         $query2 = mysqli_query($conn,"SELECT * FROM TicketConfirmed WHERE source='$source' and destination='$destination'") ;
        if($conn -> query($sql) === TRUE) {
            if(mysqli_num_rows($query2) > 0) {
                ?>
                <table border="1" style="border-collapse:collapse; color:#404040">
                <tr>
                <th>Bus Number</th>
                <th>Name </th>
                <th>age</th>
                <th>email</th>
                <th>gender</th>
                <th>source</th>
                <th>Destination</th>
                <th>Date</th>
                <th>noOfTickets</th>
                </tr>
                <?php
                while ($row=mysqli_fetch_array($query2))
                {
                echo "<tr> <td>$row[0]</td> <td>$row[1]</td>";
                echo "<td>$row[2]</td> <td>$row[3]</td>";
                echo "<td>$row[4]</td> <td>$row[5]</td>";
                echo "<td>$row[6]</td> <td>$row[7]</td> <td>$row[8]</td></tr>";
                }
                } else
                echo "<p><b> No matches found... </b></p>";
                mysqli_close($conn);
                }
         else {
            echo "Error: ".$sql. "<br>". $conn ->error;
        }
        }
        ?>
        <div style = "color : red;">
       <h1>THANK YOU FOR BOOKING...</h1> 
        </div>
        
    </body>
</html>