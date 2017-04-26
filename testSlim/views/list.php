<style>
body{ font-family:Arial }
table, table tr td{ border:1px solid #efefef; }
</style>
<form method='post'>
	<input type='text' value="<?php //echo $email_find; ?>" name='email' placeholder='Escriba y presione enter'>
    <input type="submit" name="btn">
	</form>
	<table width='100%'>
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Position</th>
			<th>Salary</th>
			<th>Opciones</th>
		</thead>
	
<?php	if(!empty($str)){
		foreach($str as $reg => $item){
			if($item->email== $email_find || $email_find==''){ ?>
				<tr>
				<td><?php echo $item->name ?></td>
				<td><?php echo $item->email ?></td>
				<td><?php echo $item->position ?></td>
				<td><?php echo $item->salary ?></td>
				<td><a href='employees/<?php echo $item->id ?>'>ver detalle</a></td>
				</tr>
<?php				//if(!empty($email_find)) break;
			}
		}
	} ?>
	<table>