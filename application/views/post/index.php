<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
		<script type="text/javascript" src="<?php echo site_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
	</head>
	<body>
		<h1>Posts</h1>
		 
		<p>
			<a href="<?php echo site_url('admin/post/create'); ?>">Create new post</a>
		</p>

		<table style="width:100%;">
			<tr>
				<th>ID</th>
				<th>Content</th>
				<th>Date Created</th>
				<th></th>
			</tr>
			<?php foreach ($posts_list as $post) { ?>
			<tr>
				<td><?php echo $post['id']; ?></td>
				<td><?php echo substr($post['content'], 0, 50) ?></td>
				<td><?php echo date('d/m/Y H:i:s', strtotime($post['date_created'])); ?></td>
				<th>
					<a href="<?php echo site_url('admin/post/edit/' . $post['id']); ?>">Edit</a> - 
					<a href="<?php echo site_url('admin/post/delete/' . $post['id']); ?>">Delete</a>
				</th>
			</tr>
			<?php }; ?>
		</table>

		<p>
			<a href="<?php echo site_url('admin/auth/logout'); ?>">Logout</a>
		</p>
	</body>
</html>