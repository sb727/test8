<!DOCTYPE html>
<html>
<head>
	<title>First Template</title>
</head>
<body>
	<?php 
		echo form_open('LoginController/login');
		echo 'UserID: ';
		echo form_input('userid');
		echo '<br>';
		echo 'Password: ';
		echo form_password('password');
		echo form_submit('mysubmit','Log in');
		echo form_close();
	?>
</body>
</html>