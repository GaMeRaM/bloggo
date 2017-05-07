{extends "base.tpl"}
{block "title"}Login{/block}
{block "page-title"}Login{/block}
{block "content"}
<form action="validate.php" method="POST">
	<div class="form-group">
		<label for="login">Login</label>
		<input class="form-control" type="text" name="login" id="login" placeholder="Username"/>
		<label for="login">Password</label>
		<input class="form-control" type="password" name="password" id="password" placeholder="Password"/><br>
		<input class="btn btn-success" type="submit" name="submit" value="Submit"/>
	</div>
</form>
{/block}