
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>User_id</th>
			<th>User_name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedUsers as $i => $user): ?>
			<tr>
				<td><a href="../viewer/showEmployee.php?id=<?php echo $user['id'] ?>"><?php echo $user['id'] ?></a></td>
				<td><?php echo $user['name'] ?></td>
				<td><a href="../viewer/editEmployee.php?id=<?php echo $user['id'] ?>">Edit</a>&nbsp<a href="../controller/deleteEmployee.php?id=<?php echo $employee['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>