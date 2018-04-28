<?php
	
class createUserTemplate
{
	public function create()
	{
		$form = <<<HTML
	<head>

  <meta charset="UTF-8">

  <title>Login </title>

  <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>
<br>
<center>
  <div class="col-md-4 col-md-offset-5">
		<div class="avatar">
		</div>
		<form action='' method='post' border=1>
		<input type="text" name="email" id="email" placeholder="email" required>
		<br><br>
		<input type="password" name="password" id="password" placeholder="password" required>
		<br><br>
		<input type='submit' name='use_button' value='Create' />
		</form>
	</div>

  <script src="js/index.js"></script>
</center>
</body>

HTML;

	return $form;
	}
	
}
?>