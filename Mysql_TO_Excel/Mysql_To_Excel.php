<html>
<html>
</html>
	<body>
		<form action=""  method="POST">
			<div class="searchFormList">
				<select name="Year" required autofocus>
					<option value="">Select an Option:</option>
					<option value="SE(Civil)">SE (Civil)</option>
					<option value="TE(Civil)">TE (Civil)</option>
					<option value="BE(Civil)">BE (Civil)</option>
				</select>
			   <input type="submit" name="button2" value=">>List">
			</div>
		</form>
	</body>
</html>
<?php
$con=mysqli_connect('localhost','root','','ibrarymanagementsystem');
$output = '';
	if(isset($_POST['button4']))
	{
		$Year=$_POST['Year'];
		
		$sql="select * from members where Year='$Year' Order by id ASC";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$output .='
					<table class="table" bordered="1">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Mobile Number</th>
							<th>Year</th>
						</tr>
					';
					while($row=mysqli_fetch_array($result))
					{
						$output .='
							<tr>
								<td>'.$row["Id"].'</td>
								<td>'.$row["FirstName"].'</td>
								<td>'.$row["LastName"].'</td>
								<td>'.$row["Mobile"].'</td>
								<td>'.$row["Year"].'</td>
							</tr>
						';
					}
					$output .='</table>';
					header("Content-Type: application/xls");
					header("Content-Disposition: attachment; filename=download.xls");
					echo $output;
		}
	}
	echo "<script> location.replace('../home.php?activity=memberlist'); </script>";
?>