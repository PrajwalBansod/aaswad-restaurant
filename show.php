<!DOCTYPE html>
<html>
<head>
	<title>show table</title>
	<style>
		body {
			background-color: #808080;	
		}
		table {
			background-color: #E0FFFF;
		}
		h1 {
			text-align: center;
		}
		th {
			background-color: #FFCCCC;
		}
		.update, .delete {
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			height: 22px;
			width: 85px;
			font-weight: bold;
			cursor: pointer;
		}
		.delete {
			background-color: #FF3333;
		}
		h1 {

              color: #D3DA79; /* Change the text color to red */
              text-shadow: 0 0 10px rgb(101, 28, 28);
              letter-spacing: 2px; /* Add 4px of letter spacing */
              word-spacing: 10px; /* Add 10px of word spacing */
}
	</style>

</head>
<body>
<?php
include ('connection.php');
$sql ="select * from reg3";
$data =mysqli_query($conn,$sql);
$total=mysqli_num_rows($data);
if ($total=mysqli_num_rows($data)) {
	?>
	<h1>update an Appointment</h1>
	<center>
	<table border="2" cellspacing="5" width="67%">
		<tr>
			<th width="2%">id</th>
			<th width="10%">name</th>
			<th width="10%">email</th>
			<th width="15%">date & time </th>
			<th width="5%">people</th>
			<th width="15%">request</th>
			<th width="15%">Operations</th>
		</tr>
		<?php
		while ($total = mysqli_fetch_array($data)) {
			echo "
				<tr>
					<td>".$total['id']."</td> 
					<td>".$total['name']."</td>
					<td>".$total['email']."</td>
					<td>".$total['date']."</td>
					<td>".$total['people']."</td>
					<td>".$total['request']."</td>
					<td>
						<a href='update.php?id=$total[id]'><button class='update'>Update</button></a>
						<a href='delete.php?id=$total[id]' onclick='return checkdelete()'><button class='delete'>Delete</button></a>
					</td>
				</tr>
			";
		}
	}
	else {
	 	echo "no record found";
	}
	?>
	</table>
	</center>

	<script>
		function checkdelete() {
			return confirm('Are you sure you want to delete this record?');
		}
	</script>

	</body>
</html>