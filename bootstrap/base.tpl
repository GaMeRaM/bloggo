<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{block "title"}Home{/block}</title>
	<!-- Compiled and minified CSS -->
	{block "includes"}
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->
	<link rel="stylesheet" href="https://bootswatch.com/4-alpha/united/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
	{/block}
</head>

<body>
	<nav class="navbar navbar-toggleable-md navbar-light navbar-inverse bg-primary">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="index.php">{block "page-title"}Home{/block}</a>

		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			<ul class="nav navbar-nav ">
				{if ($logged == false)}
				<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
				{else}
				<li class="nav-item"><a href="#" class="nav-link">Hello, {$user}!</a></li>
				<li class="nav-item"><a href="edit.php" class="nav-link">Add post</a></li>
				<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
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