<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
 
// Include the template files needed for the page
require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'highlightedPostsTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');
require_once(FS_INCLUDES . 'post.php');

	class postTemplate
	{
		function drawContent($post)
		{
			echo "<h1>{$post['title']}</h1>";
			
			echo "<div class=\"card h-100\"><a href=\"#\"><img class=\"card-img-top\" src={$post['image']} alt=\"\"></a>";
			
			
			echo $post['content'];
		}
	}
?>
