<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
	    <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		<h1>Login</h1>

		<?php if (!empty($error)) {
			echo '<p>' . $error . '</p>';
		}
		echo validation_errors();
		?>

		<form method="post">
			<label>Username:</label> <input type="text" name="username" required><br>
			<label>Password:</label> <input type="password" name="password" required><br>

			<button type="submit">Login</button>
		</form>
	</body>
</html>