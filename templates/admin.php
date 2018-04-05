<?php 
if( isset($_REQUEST['modify'] ))
{
	$u = new post($db);
	$id = $_POST['element_1'];
	$title = $_POST['element_2'];
	$content = $_POST['element_3'];
	$image = $_POST['element_4'];
	
	$data = array (
		"id"  => $id,
		"title" => $title,
		"content" => $content,
		"image" => $image
	);
	$u->delete($id);
	$u->create($data);
}
?>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
 
// Include the template files needed for the page
require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'highlightedPostsTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');
require_once(FS_INCLUDES . 'post.php');
require_once(FS_TEMPLATES . 'postTemplate.php');
require_once(FS_TEMPLATES . 'admin.php');
	
	$header = new mainHeaderTemplate();
	$content = $header->addHeader();
	$header->setContent($content);
    echo $header->renderStatic();
	
	class admin 
	{
		public $id = -1;
		public $title = 'N/A';
		public $content = 'N/A';
		public $picture = 'N/A';
		
		function draw($stories, $db)
		{
			$u = new post($db);
			if(!empty($stories) > 0)
			{
				foreach($stories as $story){
					echo "ID: " . $story['id'] . " TITLE: " . $story['title'] . " " . "<a href=\"?admin?edit?{$story['id']}\">edit</a>" . " " . "<a href=\"?admin?delete?{$story['id']}\">delete</a>" . "<br>";	
				}
			}
			foreach($_GET as $key => $value){
				echo substr($key, 13, 1);
				if (substr($key, 6, 4) == "edit"){
					$this->id = (int) substr($key, 11, 1);
					$this->title = $stories[$this->id - 1]['title'];
					$this->content = $stories[$this->id - 1]['content'];
					$this->picture = $stories[$this->id - 1]['image'];
				}
				if(substr($key, 6, 6) == "delete"){
					$u->delete((int) substr($key, 13, 1));
					header("Refresh:0; url=?admin");
				}
				
			}
			
			echo <<<HTML
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>Edit</title>
			<link rel="stylesheet" type="text/css" href="view.css" media="all">
			<script type="text/javascript" src="view.js"></script>

			</head>
			<br><br><br>
			<body id="main_body" >
				<div id="form_container">
					<form id="form_2678" class="appnitro" method="post" action="">
								<div class="form_description">
						<p>Modify or add a entry</p>
					</div>						
						<ul >
						
								<li id="li_1" >
					<label class="description" for="element_1">ID </label>
					<div>
						<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value="{$this->id}"/> 
					</div> 
					</li>		<li id="li_2" >
					<label class="description" for="element_2">TITLE </label>
					<div>
						<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value="{$this->title}"/> 
					</div> 
					</li>		<li id="li_3" >
					<label class="description" for="element_3">CONTENT </label>
					<div>
						<textarea id="element_3" name="element_3" class="element textarea large">{$this->content}</textarea> 
					</div> 
					</li>		<li id="li_4" >
					<label class="description" for="element_4">PICTURE </label>
					<div>
						<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="{$this->picture}"/> 
					</div> 
					</li>
					<input type="submit" name="modify" value="Modify/Add" />	
					</li>
						</ul>
					</form>	
				</div>
				</body>
			</html>
HTML;
		}	
	}
?>

