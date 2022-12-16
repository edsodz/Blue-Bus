<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Search for Bus </title>
</head>
<body bgcolor= "#CCFFFF" text = "#660099">
<h1> Search for Buses </h1>
<?php
$self = $_SERVER['PHP_SELF'];
?>
<form action="" method="GET">
Enter Source : <input type="text" name ="source" />
<!-- <input type="hidden" name="source" />  -->
Enter Destination : <input type="text" name ="destination" />
 <!-- <input type="hidden" name="destination" /> -->
<input type="submit" value = "Search" name="search"/>
</form>
<?php
if(isset($_GET['search'])) {
$dbh = mysqli_connect("localhost", "root", "","user_db");
$nme=$_GET["source"];
$dst=$_GET["destination"];
echo "<p>Searching for $nme $dst...</p>";
$query=mysqli_query($dbh,"SELECT * FROM businfo WHERE source='$nme' and destination='$dst'");
if(mysqli_num_rows($query) > 0) {
?>
<table border="1" style="border-collapse:collapse; color:#404040">
<tr>
<th>Bus Number</th>
<th>Bus Name </th>
<th>Source</th>
<th>Destination</th>
<th>Departure Time</th>
<th>Date</th>
<th>Bus Type</th>
<th>Ticket Price</th>
</tr>
<?php
while ($row=mysqli_fetch_array($query))
{
echo "<tr> <td>$row[0]</td> <td>$row[1]</td>";
echo "<td>$row[2]</td> <td>$row[3]</td>";
echo "<td>$row[4]</td> <td>$row[5]</td>";
echo "<td>$row[6]</td> <td>$row[7]</td></tr>";
}
} else
echo "<p><b> No matches found... </b></p>";
mysqli_close($dbh);
}
?>
</table>
<div class="ticketBooking"><a href="ticketbooking.html"><input type="button" value="BookTicket"></a></div>

</body>
</html>