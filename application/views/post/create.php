<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
		<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		<h1>Create new post</h1>

		<?php if (!empty($error)) {
			echo '<p>' . $error . '</p>';
		}
		echo validation_errors();
		?>

		<form method="post">
			<label>Content:</label><br>
			<textarea id="content" name="content" rows="5" style="width:50%;"></textarea><br>
			<a href="<?php echo site_url('admin/post'); ?>">Cancel</a>
			<button id="submit" type="submit">Save</button>
		</form>

		<p>
			<a href="<?php echo site_url('admin/auth/logout'); ?>">Logout</a>
		</p>
	</body>
</html>

<script>
	$(document).ready(function(){
		$('form').submit(function(event){
			if($('#content').val().trim().length == 0) {
				event.preventDefault();
				alert("Content required.");
			}
		});
	});
</script>