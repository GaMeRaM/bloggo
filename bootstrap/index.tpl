{extends "base.tpl"}
{block "title"}Bloggo{/block}
{block "page-title"}Bloggo{/block}
{block "content"}
	{foreach $posts post}
			<div class="z-depth-3 posts" style="">
			<h3>{$post.header}</h1>
			Posted by <a href="index.php?user={$post.user}">{$post.user}</a> at {$post.time}.
			{if ((($logged == true)&&($post.user==$user))||$user=="admin")}
			<div class="controls">
				<form id="edit" method='POST' action='./edit.php' class="forms">
					<button type="submit" style="color: #E95420;">Edit</button>
					<input type='hidden' name='id' value="{$post.id}" />
				</form>
				|
				<form id="delete" method='POST' action='./logic.php' class="forms">
					<button type="submit" style="color: #E95420;">Delete</button>
					<input type='hidden' name='id' value="{$post.id}" />
					<input type="hidden" name="delete" value="set"/>
				</form>
				</div>

			{/if}
			<br>
			{$post.text}</div>
			
		{/foreach}
{/block}
