<?php  
require_once '../controller/employeeInfo.php';

$employee = fetchEmployee($_GET['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Date of birth</th>
		<th>Hiredate</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="showStudent.php?id=<?php echo $employee['ID'] ?>"><?php echo $employee['name'] ?></a></td>
		<td><?php echo $employee['email'] ?></td>
		<td><?php echo $employee['dob'] ?></td>
		<td><?php echo $employee['hiredate'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $employee['image'] ?>" alt="<?php echo $employee['name'] ?>"></td>
	</tr>

</table>


</body>
</html>