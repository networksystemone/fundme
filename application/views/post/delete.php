<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
		<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
	</head>
	<body> 
		<h1>Delete post</h1>

		<?php if (!empty($error)) {
			echo '<p>' . $error . '</p>';
		} ?>

		<form method="post">
			<p>
				<label>ID: </label><?php echo $post['id']; ?><br>
				<label>Date created: </label><?php echo date('d/m/Y H:i:s', strtotime($post['date_created'])); ?><br>
				<label>Content: </label><br>
				<?php echo nl2br($post['content']); ?>
			</p>

			<a href="<?php echo site_url('admin/post'); ?>">Cancel</a>
			<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
			<button id="submit" type="submit">Delete</button>
		</form>

		<p>
			<a href="<?php echo site_url('admin/auth/logout'); ?>">Logout</a>
		</p>
	</body>
</html>