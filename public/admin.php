<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
 
// Include the template files needed for the page
require_once(FS_TEMPLATES . 'mainHeaderTemplate.php');
require_once(FS_TEMPLATES . 'highlightedPostsTemplate.php');
require_once(FS_TEMPLATES . 'mainFooterTemplate.php');
require_once(FS_INCLUDES . 'post.php');
require_once(FS_INCLUDES . 'user.php');
require_once(FS_TEMPLATES . 'postTemplate.php');
require_once(FS_TEMPLATES . 'adminPageTemplate.php');
require_once(FS_TEMPLATES . 'loginTemplate.php');
	
$u = new User($db);
$p = new Post($db);
$username = "";
$password = "";
		
$adminTemplate = new adminPageTemplate();

$header = new mainHeaderTemplate();
$content = $header->addHeader();
$header->setContent($content);
echo $header->renderStatic();
			

if(!empty($_SESSION['name']) > 0)
{		
	$id = -1;
	$title = 'N/A';
	$content = 'N/A';
	$picture = 'N/A';

	foreach($_GET as $key => $value){
		$id = (int) substr($key, 11, 2);
		if(substr($key, 6, 6) == "delete"){
			$p->delete((int) substr($key, 13, 2));
			header("Location: http://csc206dev.com/admin.php");
			$id = -1;
		}	
	}
	$stories = $p->update()->fetchAll();

	if(!empty($stories) > 0)
	{
		echo "<center><h2> Stories </h2>";
		
		echo "<br><table border=3><tr><th>ID</th><th>Title</th><th>Edit</th><th>Delete</th></tr>";
		foreach($stories as $story)
		{
			echo "<tr>
					<td>{$story['id']}</td>
					<td>{$story['title']}</td>
					<td> &nbsp<a href=\"?admin?edit?{$story['id']}\">edit</a></td>
					<td> &nbsp<a href=\"?admin?delete?{$story['id']}\">delete</a></td>
				</tr>";	
		}
		echo "</table></center>";
	}
	if( isset($_REQUEST['modify']))
	{
		$p = new post($db);
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
		$p->delete($id);
		$p->create($data);
		header("Refresh:0; url=");
	}
	
	$index = -1;
	for($i = 0; $i < count($stories); $i ++)
	{
		if($stories[$i]['id'] == $id)
		{
			$index = $i;
			break;
		}else{
			$index = -1;
		}
	}
	if($index != -1)
	{	
		$data = [ 
			$id, 
			$stories[$index]['title'], 
			$stories[$index]['content'], 
			$stories[$index]['image']
		];	
		echo $adminTemplate->render($data);
	}else{
		$data = [ 
			-1, 
			'N/A', 
			'N/A', 
			'N/A'
		];
		echo $adminTemplate->render($data);
	}	
}
else
{
	$login = new loginTemplate();
	echo $login->createLogin();
	if(isset($_POST['use_button']))
	{
		if (!empty($_POST['username'])){
			$username = $_POST['username'];
		}
		if (!empty($_POST['password'])){
			$password = $_POST['password'];
		}
		
		$user = $u->getUsers()->fetchAll();
		if(!empty($user)){
			$_SESSION['name'] = $user[0]['email'];
			header("Refresh:0; url=");
		}

	}
}
?>
