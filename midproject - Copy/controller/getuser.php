<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
a{
  color:white;
  text-decoration: none;
}
a:hover{
  color:yellow;
}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','ecommerce');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM employee WHERE name like '$q%' or id like '$q%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Date of birth</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['dob'] . "</td>";
  ?>
	<td><a href="../viewer/editEmployee.php?id=<?php echo $row['id'] ?>">Edit</a>&nbsp<a href="../controller/deleteEmployee.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
  <?php
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>