<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
		<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		<h1>Edit post</h1>

		<?php if (!empty($error)) {
			echo '<p>' . $error . '</p>';
		}
		echo validation_errors();
		?>

		<form method="post">
			<label>ID: <?php echo $post['id']; ?></label><br>
			<label>Date created: <?php echo date('d/m/Y H:i:s', strtotime($post['date_created'])); ?></label><br>
			<label>Content:</label><br>
			<textarea id="content" name="content" rows="5" style="width:50%;"><?php echo $post['content']; ?></textarea><br>
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