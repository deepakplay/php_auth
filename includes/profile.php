<?php
		include 'includes/connect.php';
		$query = "SELECT id, fname, email, gender, phone, dob, country FROM users
INNER JOIN user_table WHERE users.id=user_table.user_id and id=?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('s', $id);
		$id=$_SESSION['id'];
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id, $fname, $email, $gender, $phone, $dob, $country);
		$stmt->fetch();
		$stmt->close();

		if(!isset($id)){
			$query = "SELECT fname, email FROM users WHERE id=?";
			$stmt = $connection->prepare($query);
			$stmt->bind_param('s', $id);
			$id=$_SESSION['id'];
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($fname, $email);
			$stmt->fetch();
			$stmt->close();

			$gender = $phone = $dob = $country = $state = 'Unknown';
		}

		$country_array = array(	"u"=>"Unknown",
								"in"=> "India",
								"sl"=> "Srilanka",
								"pk"=> "Pakistan", 
								"ch"=> "China", 
								"us"=> "United State", 
								"au"=> "Australia");
?>


<div class="profile_view" >
	<h2>Profile </h2>
	<table>
		<tr>
			<td>Fullname</td>
			<td><span>:&nbsp;&nbsp;<?php echo($fname) ?></span></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><span>:&nbsp;&nbsp;<?php echo($email) ?></span></td>
		</tr>

		<tr>
			<td>Password</td>
			<td class="pasword_td">
				<span>:&nbsp;&nbsp;&nbsp;**********</span>
			</td>
		</tr>

		<tr>
			<td>Gender</td>
			<td>
				<span>:&nbsp;&nbsp;<?php echo(($gender=='m')?'Male':(($gender=='f')?'Female':'Unknown')) ?></span>
			</td>
		</tr>

		<tr>
			<td>Phone</td>
			
			<td><span>:&nbsp;&nbsp;<?php echo((isset($phone))?$phone:"Unknown") ?></span></td>
		</tr>

		<tr>
			<td>DOB</td>
			<td><span>:&nbsp;&nbsp;<?php echo($dob) ?></span></td>
		</tr>

		<tr>
			<td>Country</td>
			<td><span>:&nbsp;&nbsp;<?php echo((array_key_exists($country, $country_array))?($country_array[$country]):$country);
			 ?></span></td>
		</tr>
	</table>
	<button class="button_edit">Edit</button>
</div>

<form method="post" action="update.php" class="profile_edit" style="display: none">
	<h2>Profile Edit</h2>
	<table>
		<tr>
			<td>Fullname</td>
			<td>
				<span>:&nbsp;&nbsp;</span>
				<input maxlength="22" type="text" name="fname" value="<?php echo($fname) ?>">
			</td>
		</tr>

		<tr>
			<td>Email</td>
			<td>
				<span>:&nbsp;&nbsp;</span>
				<input maxlength="22" type="text" name="email" value="<?php echo($email) ?>">
			</td>
		</tr>

		<tr>
			<td>Password</td>
			<td class="pasword_td">
				<span>:&nbsp;&nbsp;&nbsp;&nbsp;**********</span>
				<button class="change_pass">Change</button>
			</td>
		</tr>

		<tr>
			<td>Gender</td>
			<td>
				<span>:&nbsp;&nbsp;</span>
				<select name="gender">
					<option value="u" <?php echo(($gender!='m' && $gender!='f')?'selected':'') ?> >Unknown</option>
					<option value="m" <?php echo(($gender=='m')?'selected':'')?> >Male</option>
					<option value="f" <?php echo(($gender=='f')?'selected':'')?> >Female</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Phone</td>
			<td>
				<span>:&nbsp;&nbsp;</span>
				<input maxlength="13" type="text" name="phone" value="<?php echo($phone) ?>">
			</td>
		</tr>

		<tr>
			<td>DOB</td>
			<td>
				<span>:&nbsp;&nbsp;</span>
				<input maxlength="13" type="date" name="dob" value="<?php echo($dob) ?>">
			</td>
		</tr>

		<tr>
			<td>Country</td>
			<td>
				<span>:&nbsp;&nbsp;</span>
				<select name="country">					
					<?php 
						foreach ($country_array as $key => $value) {
							echo("<option value=\"{$key}\" ".(($country==$key)?'selected':'').">{$value}</option>\n\t\t\t\t\t");
						}
					?></select>
			</td>
		</tr>
	</table>
	<div class="button_group">
		<button class="cancel_submit">Cancel</button>
		<input type="submit" name="submit" value="Submit" class="profile_submit">
	</div>
</form>

<?php $connection->close() ?>