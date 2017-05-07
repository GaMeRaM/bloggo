{extends "base.tpl"}
{block "title"}Login{/block}
{block "page-title"}Login{/block}
{block "content"}
<form action="validate.php" method="POST">
		<input type="text" name="login" placeholder="Username"/>
		<input type="password" name="password" placeholder="Password"/>
		<input type="submit" name="submit" value="Submit"/>
</form>
{/block}