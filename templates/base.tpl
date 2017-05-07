<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{block "title"}Home{/block}</title>
	<!-- Compiled and minified CSS -->
	{block "includes"}
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
	<link rel="stylesheet" href="style.css">
	{/block}
</head>
<body>
	<nav>
		<div class="nav-wrapper">
			<a href="index.php" class="brand-space brand-logo">{block "page-title"} Home{/block}</a>
			<ul class="right">
				{if ($logged == false)}
					<li><a href="login.php">Login</a></li>
				{else}
					<li><a href="edit.php">Add post</a></li>
	        		<li><a href="logout.php">Logout</a></li>
				{/if}
			</ul>
		</div>
	</nav>
	<div class="container">
	{block "content"}
		Text
	{/block}
	</div>
</body>
</html>