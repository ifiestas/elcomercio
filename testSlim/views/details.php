<style>
body{ font-family:Arial }
table, table tr td, table thead th{ border:1px solid #efefef; }
</style>

<table width='100%' border=1>
		<thead>
		<th colspan='2'>DETAILS</th>
		</thead>
		
		<tbody>
		
		<tr>
		<td>Name</td>
		<td><?php echo $results->name; ?></td>
		</tr>
		
		<tr>
		<td>Email</td>
		<td><?php echo $results->email; ?></td>
		</tr>
		
		<tr>
		<td>Phone</td>
		<td><?php echo $results->phone; ?></td>
		</tr>
		
		<tr>
		<td>Address</td>
		<td><?php echo $results->address; ?></td>
		</tr>
		
		<tr>
		<td>Position</td>
		<td><?php echo $results->position; ?></td>
		</tr>
		
		<tr>
		<td>Salary</td>
		<td><?php echo $results->salary; ?></td>
		</tr>
		
		<tr>
		<td>Skills</td>
		<td>
		<?php
		if(!empty($results->skills)){
			foreach($results->skills as $reg){
				echo $reg->skill."<br>";
			}
		}
		?>
		</td>
		</tr>
		
		</tbody>
		
	
		</table>