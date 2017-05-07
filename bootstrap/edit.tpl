{extends "base.tpl"}
{block "title"}Post{/block}
{block "page-title"}Add or edit post{/block}
{block "includes"}
{$dwoo.parent}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
{/block}
{block "content"}
<form id="textform" method="POST" action="logic.php" >
    	{if isset($id)}<input type='hidden' name='id' value="{$id}" />
    	{/if}
        <input required class="form-control" name="header" type="text" placeholder="Header" value='{if isset($header)}{$header}{/if}'/><br>
        <textarea name="text" id="MyID" cols="80" rows="40" placeholder="Text"></textarea><br>
        {if isset($id)}
        	<input type="hidden" name="edit" value="set"/>
        {/if}
        <!--<input type="submit" value="Send"/>-->
        <a href="#" class="btn-large" id="submit">Submit</a>
    </form>
    <script>
		var simplemde = new SimpleMDE({ 
			element: document.getElementById("MyID"),
			spellChecker: false
		});
		{if isset($id)}
			simplemde.value({$text});
		{/if}
    	$( "#submit" ).click(function() {
			$("#textform").submit();
		});
	</script>
{/block}