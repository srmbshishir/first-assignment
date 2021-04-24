<?php  
require_once '../controller/employeeInfo.php';

$employees = fetchAllEmployee();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/showall.css">
</head>
<body>
<?php include 'admin.php';?>
<div class="add">

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>User Id</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Designation</th>
			<th>DateofBirth</th>
			<th>HireDate</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($employees as $i => $employee): ?>
			<tr>
				<td><a href="showEmployee.php?id=<?php echo $employee['id'] ?>"><?php echo $employee['name'] ?></a></td>
				<td><?php echo $employee['id'] ?></td>
				<td><?php echo $employee['email'] ?></td>
				<td><?php echo $employee['gender'] ?></td>
				<td><?php echo $employee['designation'] ?></td>
				<td><?php echo $employee['dob'] ?></td>
				<td><?php echo $employee['hiredate'] ?></td>

				<td><img src="../controller/uploads/<?php echo $employee['image'] ?>" alt="<?php echo $employee['name'] ?>"></td>
				<td><a href="editEmployee.php?id=<?php echo $employee['id'] ?>">Edit</a>&nbsp<a href="../controller/deleteEmployee.php?id=<?php echo $employee['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</div>         
 

</body>
</html>