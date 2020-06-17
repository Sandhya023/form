<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: purple;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Gender</th>
<th>Department</th>
<th>Job Title</th>
<th>Phone</th>
<th>Address</th>
<th>Postal Code</th>

</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, firstName, lastName, email, gender, department, jobTitle, phone, address,code FROM record";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td>
	<td>" . $row["firstName"] . "</td>
	<td>"
. $row["lastName"]. "</td>
<td>" . $row["email"] . "</td>
<td>" . $row["gender"] . "</td>
<td>" . $row["department"] . "</td>
<td>" . $row["jobTitle"] . "</td>
<td>" . $row["phone"] . "</td>
<td>" . $row["address"] . "</td>
<td>" . $row["code"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>