<?php
    include('./connection/connection.php');
	$con = $connection;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Load Data To Dropdown Menu</title>
	</head>
	
	<body>
		<br><br>
		<center>
			<h2>Load Data To Dropdown Menu</h2>
			<br><br>
			
				<?php 
					$result = mysqli_query($con,"SELECT * FROM cases order by id");
					if(mysqli_num_rows($result) == 0)
					{
						$row['number'] = $row['name'] = 'No Results';
						echo "<option value='" . $row['number'] . "'>" . $row['name'] . "</option>";
						
						echo "<br><br>";
						
						echo "
							 <div>
								Number of Cases: <input type='text' id='number_of_cases' placeholder='Get number of cases from option select' disabled=''><br>
							</div> 
							";
					}
					else
					{
				?>
						Select State: <select class="form-control" name="cases_by_state" id="cases_by_state"  onchange="run()">
						<option value="" selected="selected" disabled="">---Selected---</option>
						<?php 

							while($row = mysqli_fetch_array($result)) 
								echo "<option value='" . $row['number'] . "'>" . $row['name'] . "</option>";
						?>
						</select>
				
						<br><br>
				
						<!-- data from response will be display here -->
						<div>
							Number of Cases: <input type="text" id="number_of_cases" placeholder="Get number of cases from option select" disabled=""><br>
						</div> 
				<?php
					}
				?>
			
		</center>
	</body>
	
	<script src="./js/index.js"></script>	
</html>